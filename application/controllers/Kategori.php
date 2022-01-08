<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends  CI_Controller {

    public function indukan(){
        $data['indukan'] = $this->kategori_model->indukan()->result();
        $this->load->view('templates/customer_header', $data);
        $this->load->view('kategori/indukan', $data);
        $this->load->view('templates/customer_footer');
    }

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
        redirect('kategori');
    }
}