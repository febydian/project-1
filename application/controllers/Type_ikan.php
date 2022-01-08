<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_ikan extends CI_Controller
{
    public function index()
    {
        $data['type_ikan'] = $this->ikan_model->get_data('type_ikan')->result();
        $data['title'] = 'Type Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('type_ikan/index',$data);
        $this->load->view('templates/admin_footer');
    }
    
    public function tambah_type_ikan()
    {
        $data['type_ikan'] = $this->ikan_model->get_data('type_ikan')->result();
        $data['title'] = 'Tambah Type Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('type_ikan/tambah_type_ikan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah_type_ikan_aksi()
    {
        $type_ikan  = $this->input->post('type_ikan');
        
        $data = array('type_ikan' => $type_ikan);

        $this->ikan_model->insert_data($data, 'type_ikan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Type Ikan Berhasil Ditambahkan !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('type_ikan');
    }

    public function edit_type_ikan($id)
    {
        $where = array('id_type_ikan' => $id);
        $data['type_ikan'] = $this->db->query("SELECT * FROM type_ikan WHERE id_type_ikan='$id'")->result();
        $data['title'] = 'Edit Type Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('type_ikan/edit_type_ikan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_type_ikan_aksi(){
        
        $id          = $this->input->post('id_type_ikan');
        $type_ikan  = $this->input->post('type_ikan');

        $data = array(
            'type_ikan' => $type_ikan
        );

        $where = array('id_type_ikan' => $id);

        $this->ikan_model->update_data('type_ikan', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Type Ikan Berhasil Diubah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('type_ikan');
        
    }

    public function _rules()
    {
        $this->form_validation->set_rules('type_ikan','Type Ikan','required');
    }

    public function hapus_type_ikan($id)
    {
        $where =  array('id_type_ikan' => $id);
        $this->ikan_model->delete_data($where, 'type_ikan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Type Ikan Berhasil Dihapus
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('type_ikan');
    }
}

?>