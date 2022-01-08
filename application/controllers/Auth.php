<?php 

class Auth extends CI_Controller{

    public function login()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $cek = $this->user_model->cek_login($email, $password);
            if($cek == FALSE){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email Salah !</div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);

                switch ($cek->role_id) {
                    case 1 : redirect('admin');
                            break;
                    case 2 : redirect('dashboard');
                            break;
                    default : break;
                }
            }
        } 
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'is_unique' => 'email sudah di registrasi',
            'valid_email' => 'email harus sesuai'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    public function ganti_password()
    {
        $this->load->view('auth/ganti_password');
    }

    public function ganti_password_aksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $kon_pass = $this->input->post('kon_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[kon_pass]');
        $this->form_validation->set_rules('kon_pass', 'Konfirmasi Password', 'required');

        if($this->form_validation->run() == FALSE)
            { 
                $this->load->view('auth/ganti_password');
            } else {
                $data = array('password' => md5($pass_baru));
                $id   = array('id_user'  => $this->session->userdata('id_user'));

                $this->user_model->update_password($id,$data, 'user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password Berhasil Diupdate, Silahkan Login kembali !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            }

    }
    
}
?>