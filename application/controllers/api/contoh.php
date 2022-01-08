<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');

        // Limit Request Per Hour
        $this->methods['login_post']['limit'] = 500;
        $this->methods['register_post']['limit'] = 500;
        $this->methods['phone_check_get']['limit'] = 500;
        $this->methods['avatar_post']['limit'] = 500;
        $this->methods['password_hash_post']['limit'] = 500;
        $this->methods['send_verify_code_post']['limit'] = 500;
        $this->methods['cek_verify_code_get']['limit'] = 500;
        $this->methods['update_password_post']['limit'] = 500;
    }

    // End Point Login With Nik,Email,Password And Telephone
    public function login_post()
    {
        $nik = $this->post('nik');
        $password = $this->post('password');
        $telephone = $this->post('telephone');

        // Login Using Nik,Email,Password
        if ($telephone === NULL) {
            $userNik = $this->db->get_where('user', ['nik' => $nik])->row_array();
            $userEmail = $this->db->get_where('user', ['email' => $nik])->row_array();

            if ($userNik != NULL) {
                if (password_verify($password, $userNik['password'])) {
                    $data = $this->db
                        ->select("nik, name, email, telephone, jabatan, institusi, avatar")
                        ->from('user')
                        ->where('nik', $nik)
                        ->get()
                        ->row_array();

                    $this->response([
                        'status' => 200,
                        'message' => "Login Success",
                        'data' => $data
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => 403,
                        'message' => "Password Salah",
                    ], REST_Controller::HTTP_FORBIDDEN);
                }
            } else  if ($userEmail != NULL) {
                if (password_verify($password, $userEmail['password'])) {
                    $data = $this->db
                        ->select("nik, name, email, telephone, jabatan, institusi, avatar")
                        ->from('user')
                        ->where('email', $nik)
                        ->get()
                        ->row_array();

                    $this->response([
                        'status' => 200,
                        'message' => "Login Success",
                        'data' => $data
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => 403,
                        'message' => "Password Salah",
                    ], REST_Controller::HTTP_FORBIDDEN);
                }
            } else {
                $this->response([
                    'status' => 404,
                    'message' => "Email atau NIK Tidak Ditemukan",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            // Login Using Telephone
            $cekPhone = $this->db
                ->select("nik, name, email, telephone, jabatan, institusi, avatar")
                ->from('user')
                ->where('telephone', $telephone)
                ->get()
                ->row_array();

            if ($cekPhone != NULL) {
                $this->response([
                    'status' => 200,
                    'message' => "Login Success",
                    'data' => $cekPhone
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 404,
                    'message' => "No Hp Tidak Ditemukan",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    // End Point Register
    public function register_post()
    {
        $data = [
            'nik' => $this->post('nik'),
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'telephone' => $this->post('telephone'),
            'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
            'jabatan' => $this->post('jabatan'),
            'institusi' => $this->post('institusi'),
            'avatar' => "",
        ];

        // Cek Email & Nik & No Hp Apakah Sudah Ada Di Database Atau Belum
        $email = $this->post('email');
        $nik = $this->post('nik');
        $telephone = $this->post('telephone');
        $cekEmail = $this->db
            ->get_where("user", ['email' => $email])
            ->row_array();

        $cekNik = $this->db
            ->get_where("user", ['nik' => $nik])
            ->row_array();

        $cekPhone = $this->db
            ->get_where("user", ['telephone' => $telephone])
            ->row_array();

        if ($cekNik >= 1) {
            $this->response([
                'status' => 401,
                'message' => "NIK Sudah Terdaftar",
            ], REST_Controller::HTTP_UNAUTHORIZED);
        } else if ($cekEmail >= 1) {
            $this->response([
                'status' => 402,
                'message' => "Email Sudah Terdaftar",
            ], REST_Controller::HTTP_PAYMENT_REQUIRED);
        } else if ($cekPhone >= 1) {
            $this->response([
                'status' => 403,
                'message' => "Nomor Hp Sudah Terdaftar",
            ], REST_Controller::HTTP_FORBIDDEN);
        } else {
            $this->db->insert("user", $data);
            $id = $this->db->insert_id();
            $getData = $this->db
                ->select("nik, name, email, telephone, jabatan, institusi")
                ->from('user')
                ->where('id', $id)
                ->get()
                ->row_array();

            $this->set_response([
                'status' => 201,
                'message' => "Register Success",
                'data' => $getData
            ], REST_Controller::HTTP_CREATED);
        }
    }

    // End Point Check Phone Number
    public function phone_check_get()
    {
        $telephone = $this->get('telephone');
        $cekPhone = $this->db
            ->get_where("user", ['telephone' => $telephone])
            ->row_array();

        if ($cekPhone >= 1) {
            $this->response([
                'status' => 200,
                'message' => "Nomor Hp Ditemukan",
                'data' => ['phone_registered' => true]
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 404,
                'message' => "Nomor Hp Tidak Ditemukan",
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // End Point Post Avatar
    public function avatar_post()
    {
        $nik = $this->post('nik');

        define('UPLOAD_DIR', './assets/avatar/');
        $config['upload_path']          = UPLOAD_DIR;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5120;
        $config['file_name']            = 'avatar-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        $cekNik = $this->db->get_where("user", ['nik' => $nik])->row_array();

        if ($cekNik != NULL) {
            if (!empty($_FILES['avatar']['name'])) {
                if ($this->upload->do_upload('avatar')) {
                    $uploadData = $this->upload->data();

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = UPLOAD_DIR . $uploadData['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['mantain_ratio']    = TRUE;
                    $config['quality']          = '100%';
                    $config['new_image']        = UPLOAD_DIR . $uploadData['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = [
                        'avatar' => base_url('/assets/avatar/') . $uploadData['file_name'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ];

                    $this->db->where('nik', $nik)->update('user', $data);
                    $getData = $this->db
                        ->select("nik, name, email, telephone, jabatan, institusi, avatar")
                        ->from('user')
                        ->where('nik', $nik)
                        ->get()
                        ->row_array();

                    $this->output->set_content_type('application/json')->set_output(json_encode([
                        'status' => 200,
                        'message' => "Sukses Menyimpan Avatar",
                        'data' => $getData
                    ], REST_Controller::HTTP_OK));
                } else {
                    $this->response([
                        'status' => 406,
                        'message' => "Ekstensi Tidak Diterima",
                    ], REST_Controller::HTTP_NOT_ACCEPTABLE);
                }
            } else {
                $this->response([
                    'status' => 403,
                    'message' => "Avatar Tidak Boleh Kosong",
                ], REST_Controller::HTTP_FORBIDDEN);
            }
        } else {
            $this->response([
                'status' => 404,
                'message' => "Nik Tidak Ditemukan",
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // End Point Post Password Hash
    public function password_hash_post()
    {
        $data = [
            'password' => password_hash($this->post('password'), PASSWORD_DEFAULT)
        ];

        $this->set_response([
            'status' => 201,
            'message' => "Password Berhasil Di Hash",
            'data' => $data
        ], REST_Controller::HTTP_CREATED);
    }

    // End Point Post Verification Code to Email
    public function send_verify_code_post()
    {
        $email = $this->post('email');
        $cekEmail = $this->db
            ->get_where("user", ['email' => $email])
            ->row_array();

        if ($cekEmail === NULL) {
            $this->response([
                'status' => 404,
                'message' => "Email Tidak Ditemukan",
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $config['mailtype']  = 'html';
            $config['protocol']  = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_user'] = '';
            $config['smtp_pass'] = '';
            $config['smtp_port'] = 465;
            $config['newline']   = "\r\n";

            $this->load->library('email', $config);

            $acakangka = '1234567890';
            $randomCode = '';
            for ($i = 0; $i < 4; $i++) {
                $randomCode .= $acakangka[rand(4, strlen($acakangka) - 1)];
            }

            $data = [
                'code' => $randomCode
            ];

            $config['protocol'] = 'sendmail';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);

            $message = $this->load->view('template/email', $data, true);

            $this->email->from('no-reply@aspeksindo.or.id', 'Aspeksindo');
            $this->email->to($email);
            $this->email->subject('Verifikasi Kode Lupa Password');
            $this->email->message($message);

            if ($this->email->send()) {
                $data = [
                    'user_id' => $cekEmail['id'],
                    'verification_code' => md5($randomCode),
                    'expired_date' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")) + (60 * 10))
                ];

                $cekForgetPass = $this->db
                    ->select("b.email, b.id")
                    ->from('forgot_password a')
                    ->join('user b', 'b.id = a.user_id')
                    ->get()->row_array();

                if ($cekForgetPass != null) {
                    $this->db->where('user_id', $cekForgetPass["id"])->update('forgot_password', $data);
                } else {
                    $this->db->insert("forgot_password", $data);
                }

                $this->response([
                    'status' => 200,
                    'message' => "Email Berhasil Dikirim",
                    'data' => $data
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 403,
                    'message' => "Gagal Mengirim Ke Email",
                ], REST_Controller::HTTP_FORBIDDEN);
            }
        }
    }

    // End Point Get Cek Verification Code
    public function cek_verify_code_get()
    {
        $user_id = $this->get('user_id');
        $verify_code = $this->get('verification_code');

        if ($verify_code === NULL) {
            $this->response([
                'status' => 404,
                'message' => "Kode Verifikasi Tidak Ditemukan",
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $cekCode = $this->db
                ->select("*")
                ->from('forgot_password')
                ->where('user_id', $user_id)
                ->where('verification_code', md5($verify_code))
                ->where('expired_date >=', date("Y-m-d H:i:s"))
                ->get()
                ->row_array();

            if ($cekCode >= 1) {
                $this->response([
                    'status' => 200,
                    'message' => "Verifikasi Kode Ditemukan",
                    'data' => ['verification_code' => true]
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 403,
                    'message' => "Kode Expired",
                ], REST_Controller::HTTP_FORBIDDEN);
            }
        }
    }

    // End Point Post Update Password
    public function update_password_post()
    {
        $email = $this->post('email');
        $cekEmail = $this->db
            ->get_where("user", ['email' => $email])
            ->row_array();

        if ($cekEmail === NULL) {
            $this->response([
                'status' => 404,
                'message' => "Email Tidak Ditemukan",
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->response([
                    'status' => 403,
                    'message' => "Password Gagal Di Update !",
                ], REST_Controller::HTTP_FORBIDDEN);
            } else {
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->db->set('password', $password);

                $this->db->where('email', $email);
                $this->db->update('user');

                $data = $this->db
                    ->select("nik, name, email, telephone, jabatan, institusi, avatar")
                    ->from('user')
                    ->where('email', $email)
                    ->get()
                    ->row_array();

                $this->response([
                    'status' => 200,
                    'message' => "Password Berhasil Di Update",
                    'data' => $data
                ], REST_Controller::HTTP_OK);
            }
        }
    }
}