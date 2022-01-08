<?php 

class Teransaksi extends CI_Controller
{
    public function index()
    {
        $data['teransaksi'] = $this->teransaksi_model->get();
        $data['teransaksi_proses'] = $this->teransaksi_model->get_proses();
        $data['teransaksi_kirim'] = $this->teransaksi_model->get_kirim();
        $data['teransaksi_berhasil'] = $this->teransaksi_model->get_berhasil();
        $this->load->view('templates/dashboard_header');
        $this->load->view('teransaksi/index', $data);
        $this->load->view('templates/dashboard_copyright');
    }

    public function teransaksi_berhasil($id_invoice)
    {
        $data = array(
            'id_invoice' => $id_invoice,
            'status_order' => '3'
        );
        $this->invoice_model->update_order($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Pesanana Berhasil Diterima !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('teransaksi');
    }

    public function detail($id)
    {
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id);
        $data['title'] = 'Detail pemesanaan';
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('teransaksi/detail_teransaksi',$data);
        $this->load->view('templates/dashboard_copyright');
    }
}

?>