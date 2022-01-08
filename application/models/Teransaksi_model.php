<?php 

class Teransaksi_model extends CI_Model{

    public function get(){
        $this->db->select('*');
        $this->db->from('invoice1');
        // $this->db->where('status_pembayaran=0');
        $this->db->where('status_order=0');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();

    }

    public function get_proses(){
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=1');
        // $this->db->where('status_pembayaran=1');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();

    
    }
    public function get_kirim(){
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=2');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();

    }

    public function get_berhasil(){
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=3');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();

    }
}
?>