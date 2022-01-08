<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';


class Invoice extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('invoice_api_model', 'invoice');
    }

    public function index_get() 
    {
        $id = $this->get('id_invoice');
        if ($id === null) {
            $invoice = $this->invoice->getInvoice();
        } else {
            $invoice = $this->invoice->getInvoice($id);
        }
            if($invoice) {
                $this->response([
                    'status' => 200,
                    'message' => "data invoice",
                    'data' => $invoice
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 404,
                    'message' => "id tidak di temukan",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

    // public function index_post() 
    // {
    //     $data = [
    //         'id_user' => $this->post('id_user'),
    //         'id_user' => $this->post('nama'),
    //         'id_user' => $this->post('alamat'),
    //         'id_user' => $this->post('no_telp'),
    //         'id_user' => $this->post('tgl_pesan'),
    //         'id_user' => $this->post('batas_bayar'),
    //     ]
    // }

    // public function index_post() 
    // {
    //     $data = [
    //         'email' => trim($this->input->post('email', TRUE)),
    //         'password' => md5(trim($this->input->post('password'), TRUE))
    //     ];
    //     $cek = $this->db->get_where('user', array('email' => $this->input->post('email', TRUE)));
    //     $row = $this->db->get_where('user', $data)->row();

    //     if($cek->num_rows() >= 1) {
    //         if($row) {
    //             $data = [
    //                 'logged_in'    => true,
    //                 'nama'         => $row->nama,
    //                 'email'        => $row->email,
    //                 'password'     => $row->password,
    //                 'image'        => $row->image,
    //                 'no_telp'      => $row->no_telp,
    //                 'alamat'       => $row->alamat,
    //                 'role_id'      => $row->role_id,
    //                 'date_created' => $row->date_created,
    //                 'username'     => $row->username
    //             ];
    //             $this->response([
    //                 // 'error'  => false,
    //                 'status' => 200,
    //                 'message' => "Login Success",
    //                 'data' => $data
    //             ], REST_Controller::HTTP_OK);

    //         } else {
    //             $this->response([
    //                 // 'error'  => false,
    //                 'status' => 403,
    //                 'message' => "Login Gagal",
    //                 'data' => $data
    //             ], REST_Controller::HTTP_FORBIDDEN);
    //         }
    //     } else {
    //         $this->response([
    //             // 'error'  => false,
    //             'status' => 404,
    //             'message' => "Email tidak terdaftar atau tidak ditemukan",
    //             'data' => $data
    //         ], REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }

    

}