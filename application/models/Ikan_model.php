<?php

class Ikan_model extends CI_Model {
    
    public function get_data($table){
        return $this->db->get($table);
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data, $where);
    }

    public function detail_ikan($id)
    {
        $result = $this->db->where('id_ikan', $id)->get('ikan');
        if($result->num_rows() > 0){
            return $result->result();
        } else {
            return false;
        }
    }
    public function detail_ikan1($id_ikan)
    {
        $this->db->select('*');
        $this->db->from('ikan');
        $this->db->where('id_ikan', $id_ikan);
        $this->db->get()->row();
    }


    public function ambil_id_ikan($id){
        $hasil = $this->db->where('id_ikan', $id)->get('ikan');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_ikan', $id)
                            ->limit(1)
                            ->get('ikan');
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return array();
        }
    }

    // public function cek_login()
    // {
    //     $email    = set_value('email');
    //     $password = set_value('password');

    //     $result = $this->db
    //                     ->where('email', $email)
    //                     ->where('password', md5($password))
    //                     ->limit(1)
    //                     ->get('user');
                    
    //     if($result->num_rows() > 0) {
    //         return $result->row();
    //     } else {
    //         return FALSE;   
    //     }

    // }

    
}


?>