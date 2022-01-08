<?php

class Invoice extends CI_Controller{

    public function index()
    {
        $data['invoice'] = $this->invoice_model->tampil_data()->result();
        $data['title'] = 'Detail invoice';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice/index',$data);
        $this->load->view('templates/admin_footer');
    }

    public function detail($id)
    
    {
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id);
        $data['title'] = 'Detail pemesanaan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice/detail_invoice',$data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_invoice($id)
    {
        $where = array('invoice' => $id);
        $data['edit_invoice'] = $this->db->query("SELECT * FROM invoice iv WHERE id_invoice='$id'")->result();
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id);
        $data['title'] = 'Edit Data invoice';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice/edit_invoice',$data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_invoice_aksi(){
            $id                       = $this->input->post('id_invoice');
            $nama                     = $this->input->post('nama');
            $no_telp                  = $this->input->post('no_telp');
            $alamat                   = $this->input->post('alamat');
            $tgl_pesan                = $this->input->post('tgl_pesan');
            $batas_bayar              = $this->input->post('batas_bayar');
            $status_pembayaran        = $this->input->post('status_pembayaran');
            $bukti_pembayaran         = $_FILES['bukti_pembayaran']['name'];
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
                'nama'              => $nama,
                'no_telp'           => $no_telp,
                'alamat'            => $alamat,
                'tgl_pesan'         => $tgl_pesan,
                'batas_bayar'       => $batas_bayar,
                'status_pembayaran' => $status_pembayaran,
                'bukti_pembayaran'  => $bukti_pembayaran
            );

        $where = array('id_invoice' => $id);

        $this->ikan_model->update_data('invoice', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Invoice Berhasil Diubah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('invoice');
    }



    public function print()
    {
        $data['invoice'] = $this->ikan_model->get_data('invoice')->result();
        $this->load->view('invoice/print', $data);
    }

    // public function excel()
    // {
    //     $data['invoice'] = $this->ikan_model->get_data('invoice')->result();

    //     require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
    //     require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007');

    //     $object = new PHPExcel();

    //     $object->getProperties()->setCreator("UPDT Perikanan Sleman");
    //     $object->getProperties()->setLastModifiedBy("UPDT Perikanan Sleman");
    //     $object->getProperties()->setTitle("Daftar Invoice");

    //     $object->setActiveSheetIndex(0);

    //     $object->getActiveSheet()->setCellValue('A1', 'No');
    //     $object->getActiveSheet()->setCellValue('B1', 'Nama');
    //     $object->getActiveSheet()->setCellValue('C1', 'Alamat');
    //     $object->getActiveSheet()->setCellValue('D1', 'No Telepon');
    //     $object->getActiveSheet()->setCellValue('E1', 'Tanggal Pesan');
    //     $object->getActiveSheet()->setCellValue('F1', 'Status Pembayaran');
    //     // $object->getActiveSheet()->setCellValue('G1', 'Bukti Pembayaran');
        
    //     $baris = 2;
    //     $no = 1;
        
    //     foreach($data['invoice'] as $in) {
    //         $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    //         $object->getActiveSheet()->setCellValue('B'.$baris, $in->nama);
    //         $object->getActiveSheet()->setCellValue('C'.$baris, $in->alamat);
    //         $object->getActiveSheet()->setCellValue('D'.$baris, $in->no_telp);
    //         $object->getActiveSheet()->setCellValue('E'.$baris, $in->tgl_pesan);
    //         $object->getActiveSheet()->setCellValue('F'.$baris, $in->status_pembayaran);
    //         // $object->getActiveSheet()->setCellValue('G'.$baris, $in->bukti_pembayaran);

    //         $baris++;
    //     }
    //     $filename = "Data_Invoice".'.xlsx';
    //     $object->getActiveSheet()->setTitle()("Data Invoice");
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="'.$filename.'"');
    //     header('Cache-Control: max-age=0');

    //     $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
    //     $writer->save('php://output');
    //     exit;
    // }

    public function print_pesanan($id)
    {
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id);

        $this->load->view('invoice/print_pesanan', $data);
    }

    public function search()
    {
        $keyword = $this->input->post('invoice');
        $data['invoice'] = $this->invoice_model->get_keyword($keyword);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('invoice',$data);
        $this->load->view('templates/admin_footer');  
    }
}

?>