<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function index()
    {
        $data['ikan'] = $this->ikan_model->get_data('ikan')->result();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('templates/dashboard_footer');
        $this->load->view('templates/dashboard_copyright');
    }


    // FUNGSI DARI LIBRARY CART
    public function tambah_ke_keranjang($id)
    {
        $ikan = $this->ikan_model->find($id);

        $data = array(
            'id'     => $ikan->id_ikan,
            'qty'    => 1,
            'price'  => $ikan->harga,
            'name'   => $ikan->jenis_ikan,
            'options' => array(
                'type'  => $ikan->type_ikan, 
                'ukuran' => $ikan->ukuran
                )
        );
 
        $this->cart->insert($data);
        redirect('dashboard/#ikan');
    }

    public function detail_keranjang()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/keranjang');
        $this->load->view('templates/dashboard_copyright');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('dashboard/detail_keranjang');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard');
    }

    public function pembayaran()
    {
        // cek pelangan sudah login / belum, jika belum harus regist dan login terlebih dahulu.

        // Belum login
            // $this->session->userdata('email');
            $email = $this->session->userdata('email');
            $nama = $this->session->userdata('nama');
            $data = $this->user_model->sudah_login($email, $nama);

            if($data == FALSE){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Login Terlebih Dahulu !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            } else {
                // sudah login
                $this->session->set_userdata('id_user', $data->id_user);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('alamat', $data->alamat);
                $this->session->set_userdata('no_telp', $data->no_telp);
                $this->session->set_userdata('nama', $data->nama);
            }
            
            $this->load->view('templates/dashboard_header');
            $this->load->view('dashboard/pembayaran', $data);
            $this->load->view('templates/dashboard_copyright');
    }

    // public function proses_pesanan_aksi()
    // {
    //     $id_user    = $this->session->userdata('id_user');
    //     $nama       = $this->input->post('nama');
    //     $       = $this->input->post('email');
    //     $nama       = $this->input->post('nama');
    //     $nama       = $this->input->post('nama');
    // }
    public function proses_pesanan()
    {
        // $email = $this->session->userdata('email');
        // $nama = $this->session->userdata('nama');
        // $data = $this->user_model->sudah_login($email, $nama);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required|trim');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
        $this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
        $this->form_validation->set_rules('hp_penerima', 'No Penerima', 'required|trim');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header');
            $this->load->view('dashboard/pembayaran');
            $this->load->view('templates/dashboard_copyright');
        } else {

            $id_user        = $this->input->post('id_user');
            // $nama           = $this->input->post('nama');
            $provinsi       = $this->input->post('provinsi');
            $kota           = $this->input->post('kota');
            $expedisi       = $this->input->post('expedisi');
            $alamat_penerima = $this->input->post('alamat_penerima');
            $kode_pos       = $this->input->post('kode_pos');
            $penerima       = $this->input->post('penerima');
            $hp_penerima    = $this->input->post('hp_penerima');

            $data = array(
                'id_user'      => $id_user,
                // 'nama'         => $nama,
                'provinsi'     => $provinsi,
                'kota'         => $kota,
                'expedisi'     => $expedisi,
                'alamat_penerima'   => $alamat_penerima,
                'kode_pos'     => $kode_pos,
                'penerima'     => $penerima,
                'hp_penerima'  => $hp_penerima,
                'tgl_pesan'    => date('Y-m-d')
            );
            $proses = $this->invoice_model->insert_data($data, 'invoice1');
        }
        if($proses){
            $this->cart->destroy();
            redirect('https://wa.me/089633487327');
        } else {
            echo ' pesanan anda gagal di proses !';
        }
    }

    public function detail_ikan($id)
    {
        $data['detail'] = $this->ikan_model->detail_ikan($id);
        $data['title'] = 'Detail Ikan';
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/detail_ikan', $data);
        $this->load->view('templates/dashboard_copyright');
    }
}

?>