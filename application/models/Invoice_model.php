<?php 

class Invoice_model extends CI_Model{

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
        $id_invoice = $this->db->insert_id();

        foreach($this->cart->contents() as $item){
            $data = array(
                'id_invoice' => $id_invoice,
                'id_ikan' => $item['id'],
                'jenis_ikan' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price']
            ); 
            $this->db->insert('pesanan', $data);
        }
        return true;
    }

    // CONTOH INVOICE BIASA
    public function tampil_data()
    {
        $result = $this->db->get('invoice');
        return $result;
        // if($result->num_rows() > 0){
        //     return $result->result();
        // } else {
        //     return false ;
        // }
    }

    // CONTOH INVOICE BENAR
    public function get()
    {
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=0');
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();
    }
    
    public function update_order($data)
    {
        $this->db->where('id_invoice', $data['id_invoice']);
        $this->db->update('invoice1', $data);
    }
    
    public function get_proses()
    {
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=1');
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();
    }
    
    public function get_kirim()
    {
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=2');
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();
    }
    public function get_berhasil()
    {
        $this->db->select('*');
        $this->db->from('invoice1');
        $this->db->where('status_order=3');
        $this->db->order_by('id_invoice','desc');
        return $this->db->get()->result();
    }

    public function ambil_id_invoice($id)
    {
        $result = $this->db->where('id_invoice', $id)->limit(1)->get('invoice1');
        if($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id)
    {
        $result = $this->db->where('id_invoice', $id)->get('pesanan');
        if($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function ambil_id_user($id)
    {
        $result = $this->db->where('id_invoice', $id)->get('user');
        if($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('tgl_pesan', $keyword);

        return $this->db->get()->result();
        
    }
}
?>