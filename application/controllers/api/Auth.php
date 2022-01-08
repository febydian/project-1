<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';


class Auth extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_api_model');
    }

    public function index_post() 
    {
        $data = [
            'email' => trim($this->input->post('email', TRUE)),
            'password' => md5(trim($this->input->post('password'), TRUE))
        ];
        $cek = $this->db->get_where('user', array('email' => $this->input->post('email', TRUE)));
        $row = $this->db->get_where('user', $data)->row();

        if($cek->num_rows() >= 1) {
            if($row) {
                $data = [
                    'logged_in'    => true,
                    'nama'         => $row->nama,
                    'email'        => $row->email,
                    'password'     => $row->password,
                    'image'        => $row->image,
                    'no_telp'      => $row->no_telp,
                    'alamat'       => $row->alamat,
                    'role_id'      => $row->role_id,
                    'date_created' => $row->date_created,
                    'username'     => $row->username
                ];
                $this->response([
                    // 'error'  => false,
                    'status' => 200,
                    'message' => "Login Success",
                    'data' => $data
                ], REST_Controller::HTTP_OK);

            } else {
                $this->response([
                    // 'error'  => false,
                    'status' => 403,
                    'message' => "Login Gagal"
                ], REST_Controller::HTTP_FORBIDDEN);
            }
        } else {
            $this->response([
                // 'error'  => false,
                'status' => 404,
                'message' => "Email tidak terdaftar atau tidak ditemukan"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // public function index_post() {
    //     // Get the post data
    //     $email = $this->post('email');
    //     $password = $this->post('password');
        
    //     // Validate the post data
    //     if(!empty($email) && !empty($password)){
            
    //         // Check if any user exists with the given credentials
    //         $con['returnType'] = 'single';
    //         $con['conditions'] = array(
    //             'email' => $email,
    //             'password' => md5($password),
    //             'status' => 1
    //         );
    //         $user = $this->user->getRows($con);
            
    //         if($user){
    //             // Set the response and exit
    //             $this->response([
    //                 'status' => TRUE,
    //                 'message' => 'User login successful.',
    //                 'data' => $user
    //             ], REST_Controller::HTTP_OK);
    //         }else{
    //             // Set the response and exit
    //             //BAD_REQUEST (400) being the HTTP response code
    //             $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }else{
    //         // Set the response and exit
    //         $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

}