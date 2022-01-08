<?php 

class Invoice_api_model extends CI_Model{

    public function getInvoice($id = null)
    {
        if($id === null) {
            return $this->db->get('invoice')->result_array();
        } else {
            return $this->db->get_where('invoice', ['id_invoice' => $id])->result_array();
        }
    }
    
    public function getPesanan($id = null)
    {
        if($id === null) {
            return $this->db->get('pesanan')->result_array();
        } else {
            return $this->db->get_where('pesanan', ['id_invoice' => $id])->result_array();
        }
    }

}


?>