<?php

class Invoice1 extends CI_Controller{

    public function index()
    {
        $data['invoice'] = $this->invoice_model->get();
        $data['invoice_proses'] = $this->invoice_model->get_proses();
        $data['invoice_kirim'] = $this->invoice_model->get_kirim();
        $data['teransaksi_berhasil'] = $this->invoice_model->get_berhasil();
        $data['title'] = 'Detail invoice';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice1/index',$data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_invoice($id)
    {
        $data['edit_invoice'] = $this->db->query("SELECT * FROM invoice1 iv WHERE id_invoice='$id'")->result();
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id);
        $data['title'] = 'Edit Data invoice';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice1/edit_invoice',$data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_invoice_aksi(){
            $id                    = $this->input->post('id_invoice');
            $penerima              = $this->input->post('penerima');
            $hp_penerima           = $this->input->post('hp_penerima');
            $kode_pos              = $this->input->post('kode_pos');
            $alamat_penerima       = $this->input->post('alamat_penerima');
            $tgl_pesan             = $this->input->post('tgl_pesan');
            $provinsi              = $this->input->post('provinsi');
            $kota                  = $this->input->post('kota');
            $expedisi              = $this->input->post('expedisi');
            $status_pembayaran     = '1';
            $bukti_pembayaran      = $_FILES['bukti_pembayaran']['name'];
            if($bukti_pembayaran=""){}else{
                $config ['upload_path'] = './assets/bukti_pembayaran';
                $config ['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('bukti_pembayaran')){
                    $bukti_pembayaran = $this->upload->data('file_name');
                    $this->db->set('bukti_pembayaran', $bukti_pembayaran);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'penerima'          => $penerima,
                'hp_penerima'       => $hp_penerima,
                'kode_pos'          => $kode_pos,
                'alamat_penerima'   => $alamat_penerima,
                'tgl_pesan'         => $tgl_pesan,
                'provinsi'          => $provinsi,
                'kota'              => $kota,
                'expedisi'          => $expedisi,
                'status_pembayaran' => $status_pembayaran,
                'bukti_pembayaran'  => $bukti_pembayaran
            );

        $where = array('id_invoice' => $id);

        $this->ikan_model->update_data('invoice1', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Invoice Berhasil Diubah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('invoice1');
    }

    public function detail($id)
    {
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id);
        $data['title'] = 'Detail pemesanaan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice1/detail_invoice', $data);
        $this->load->view('templates/admin_footer');
    }

    public function proses($id_invoice)
    {
        $data = array(
            'id_invoice'    => $id_invoice,
            'status_order'  => '1'
        );
        $this->invoice_model->update_order($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Pesanana Akan Di Proses !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('invoice1');
    }

    public function kirim($id_invoice)
    {
        $data = array(
            'id_invoice' => $id_invoice,
            'status_order' => '2'
        );
        $this->invoice_model->update_order($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Pesanana Berhasil Dikirim !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('invoice1');
    }

}