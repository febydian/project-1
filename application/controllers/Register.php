<?php

class Register extends CI_Controller {

    public function index()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->load->view('auth/regis');
        } else {
            $nama        = $this->input->post('nama');
            $username    = $this->input->post('username');
            $email       = $this->input->post('email');
            $password    = md5($this->input->post('password'));
            $no_telp     = $this->input->post('no_telp');
            $alamat      = $this->input->post('alamat');
            $role_id     = '2';
            $image       = 'default.jpg';
            $date_created = time();


            $data = array (
                'nama'     => $nama,
                'username' => $username,
                'email'    => $email,
                'password' => $password,
                'no_telp'  => $no_telp,
                'alamat'   => $alamat,
                'role_id'  => $role_id,
                'image'  => $image,
                'date_created'  => $date_created,
            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">berhasil register silahkan login</div>');
            redirect('auth/login');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'email sudah di registrasi',
            'valid_email' => 'email harus sesuai'
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat' ,'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]',[
            'matches' => 'password tidak cocok !',
            'min_length' => 'password terlalu pendek !'
        ]);
        $this->form_validation->set_rules('password2', 'Passwordrole_id', 'required|trim|matches[password2]');
    }
}


?>