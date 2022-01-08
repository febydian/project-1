<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ikan extends CI_Controller
{

    public function index()
    {
        $data['ikan'] = $this->ikan_model->get_data('ikan')->result();
        $data['title'] = 'ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('ikan/index',$data);
        $this->load->view('templates/admin_footer');
    }
    
    public function tambah_ikan()
    {
        $data['ikan'] = $this->ikan_model->get_data('ikan')->result();
        $data['jenis_ikan'] = $this->ikan_model->get_data('jenis_ikan')->result();
        $data['type_ikan'] = $this->ikan_model->get_data('type_ikan')->result();
        $data['title'] = 'Tambah Benih Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('ikan/tambah_ikan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah_ikan_aksi()
    {
            $jenis_ikan       = $this->input->post('jenis_ikan');
            $type_ikan        = $this->input->post('type_ikan');
            $ukuran           = $this->input->post('ukuran');
            $umur             = $this->input->post('umur');
            $stok             = $this->input->post('stok');
            $harga            = $this->input->post('harga');
            $deskripsi        = $this->input->post('deskripsi');
            $gambar           = $_FILES['gambar']['name'];
            if($gambar=""){}else{
                $config ['upload_path'] = './assets/upload';
                $config ['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "gambar ikan berhasil diupload";
                }else {
                    $gambar=$this->upload->data('file_name');
                }
            }

            $data = array(
                'jenis_ikan'        => $jenis_ikan,
                'type_ikan'         => $type_ikan,
                'ukuran'            => $ukuran,
                'umur'              => $umur,
                'stok'              => $stok,
                'harga'             => $harga,
                'deskripsi'         => $deskripsi,
                'gambar'            => $gambar
            );

            $this->ikan_model->insert_data($data, 'ikan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Benih Ikan Berhasil Di Tambah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('ikan');
            // } 
    }
    

    public function edit_ikan($id)
    {
        $where = array('ikan' => $id);
        $data['ikan'] = $this->db->query("SELECT * FROM ikan ih WHERE id_ikan='$id'")->result();
        $data['jenis_ikan'] = $this->ikan_model->get_data('jenis_ikan')->result();
        $data['type_ikan'] = $this->ikan_model->get_data('type_ikan')->result();
        $data['title'] = 'Edit Data Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('ikan/edit_ikan',$data);
        $this->load->view('templates/admin_footer');
    }

    
    public function edit_ikan_aksi(){
            $id               = $this->input->post('id_ikan');
            $jenis_ikan       = $this->input->post('jenis_ikan');
            $type_ikan        = $this->input->post('type_ikan');
            $ukuran           = $this->input->post('ukuran');
            $umur             = $this->input->post('umur');
            $stok             = $this->input->post('stok');
            $harga            = $this->input->post('harga');
            $deskripsi        = $this->input->post('deskripsi');
            $gambar           = $_FILES['gambar']['name'];
            if($gambar=""){}else{
                $config ['upload_path'] = './assets/upload';
                $config ['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('gambar')){
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'jenis_ikan'        => $jenis_ikan,
                'type_ikan'         => $type_ikan,
                'ukuran'            => $ukuran,
                'umur'              => $umur,
                'stok'              => $stok,
                'harga'             => $harga,
                'deskripsi'         => $deskripsi,
                'gambar'            => $gambar
            );

        $where = array('id_ikan' => $id);

        $this->ikan_model->update_data('ikan', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Benih Ikan Berhasil Diubah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('ikan');
    }


    public function detail_ikan($id){
        $data['ikan'] = $this->ikan_model->ambil_id_ikan($id);
        $data['title'] = 'Detail Ikan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('ikan/detail_ikan',$data);
        $this->load->view('templates/admin_footer');

    }

    public function hapus_ikan($id)
    {
        $where =  array('id_ikan' => $id);
        $this->ikan_model->delete_data($where, 'ikan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Benih Ikan Berhasil Dihapus
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('ikan');
    }



    public function print()
    {
        $data['ikan'] = $this->ikan_model->get_data('ikan')->result();
        $this->load->view('ikan/print', $data);
    }
}

?>