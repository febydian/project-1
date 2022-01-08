<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates/admin_footer');
    }

    public function profile(){
        
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/index',$data);
        $this->load->view('templates/admin_footer');

    }
    public function edit(){
        
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar');
            $this->load->view('admin/edit',$data);
            $this->load->view('templates/admin_footer');
        } else {
            $nama   = $this->input->post('nama');
            $no_telp   = $this->input->post('no_telp');
            $alamat   = $this->input->post('alamat');
            $email   = $this->input->post('email');

            // cek gambar yang akan di upload
            $image = $_FILES['image']['name'];
            if($image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/profile';

                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg') {
                        unlink(FCPATH.'assets/profile'.$old_image);
                    }
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('image', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('alamat', $alamat);
            $this->db->set('image', $image);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Profil Berhasil Diupdate !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('admin/profile');
        }

    }

    // public function edit_aksi()
    // {
    //     $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    //     $data['title'] = 'Edit Profile';
    //         $id               = $this->input->post('id_ikan');
    //         $email            = $this->input->post('email');
    //         $nama             = $this->input->post('nama');
    //         $alamat           = $this->input->post('alamat');
    //         $no_telp          = $this->input->post('no_telp');
    //         $image           = $_FILES['image']['name'];
    //         if($image=""){}else{
    //             $config ['upload_path'] = './assets/upload';
    //             $config ['allowed_types'] = 'jpg|jpeg|png|tiff';

    //             $this->load->library('upload', $config);
                
    //             if($this->upload->do_upload('image')){
    //                 $image = $this->upload->data('file_name');
    //                 $this->db->set('image', $image);
    //             } else {
    //                 echo $this->upload->display_errors();
    //             }
    //         }

    //         $data = array(
    //             'email'        => $email,
    //             'nama'         => $nama,
    //             'alamat'       => $alamat,
    //             'no_telp'      => $no_telp,
    //             'image'        => $image
    //         );

    //     $where = array('id_user' => $id);
    //         // var_dump($data);
    //         // die();
    //     $this->ikan_model->update_data('user', $data, $where);
    //     $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    //             Data User Berhasil Diubah !
    //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                     <span aria-hidden="true">&times;</span>
    //                     </button>
    //                 </div>');
    //     redirect('admin/profile');
    // }
}

?>