<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_ikan extends CI_Controller
{
    public function index()
    {
        $data['jenis_ikan'] = $this->ikan_model->get_data('jenis_ikan')->result();
        $data['title'] = 'Jenis Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('jenis_ikan/index',$data);
        $this->load->view('templates/admin_footer');
    }
    
    public function tambah_jenis_ikan()
    {
        $data['jenis_ikan'] = $this->ikan_model->get_data('jenis_ikan')->result();
        $data['title'] = 'Tambah Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('jenis_ikan/tambah_jenis_ikan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah_jenis_ikan_aksi()
    {
            $jenis_ikan  = $this->input->post('jenis_ikan');
            $data = array(
                'jenis_ikan' => $jenis_ikan,
                );
            $this->ikan_model->insert_data($data,'jenis_ikan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Ikan Berhasil Di Tambah
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');

            redirect('jenis_ikan');
    }

    public function edit_jenis_ikan($id)
    {
        $where = array('id_jenis_ikan' => $id);
        $data['jenis_ikan'] = $this->db->query("SELECT * FROM jenis_ikan WHERE id_jenis_ikan='$id'")->result();
        $data['title'] = 'Edit Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('jenis_ikan/edit_jenis_ikan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_jenis_ikan_aksi(){
            $id          = $this->input->post('id_jenis_ikan');
            $jenis_ikan  = $this->input->post('jenis_ikan');

        $data = array(
            'jenis_ikan' => $jenis_ikan
        );

        $where = array('id_jenis_ikan' => $id);

        $this->ikan_model->update_data('jenis_ikan', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Ikan Berhasil Diubah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('jenis_ikan');
        
    }
    
    public function hapus_jenis_ikan($id)
    {
        $where =  array('id_jenis_ikan' => $id);
        $this->ikan_model->delete_data($where, 'jenis_ikan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Ikan Berhasil Dihapus
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('jenis_ikan');
    }
}

?>