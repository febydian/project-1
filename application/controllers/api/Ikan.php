<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';


class Ikan extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ikan_api_model', 'ikan');

        $this->methods['index_get']['limit'] = 500;
    }


    public function index_get(){

        $id = $this->get('id_ikan');
        if($id == null) {
            $ikan = $this->ikan->getIkan();
        } else {
            $ikan = $this->ikan->getIkan($id);
        }

        if($ikan) {
            $this->response([
                'status' => 200,
                'message' => 'Data Ikan',
                'data' => $ikan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 404,
                'message' => 'Data Ikan Tidak Ditemukan',
            ], REST_Controller::HTTP_NOT_FOUND);
            
        }
    }

    // public function index_delete()
    // {
    //     $id = $this->get('id_ikan');
    // }
}

?>