<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';


class Pesanan extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('invoice_api_model', 'pesanan');
    }

    public function index_get() 
    {
        $id = $this->get('id_invoice');
        if ($id === null) {
            $pesanan = $this->pesanan->getPesanan();
        } else {
            $pesanan = $this->pesanan->getPesanan($id);
        }
            if($pesanan) {
                $this->response([
                    'status' => 200,
                    'message' => "data pemesanan",
                    'data' => $pesanan
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 404,
                    'message' => "pemesanaan tidak di temukan",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

}