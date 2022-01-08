<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


    public function cek_login()
    {
        $email = set_value('email');
        $password = set_value('password');


        $result = $this->db
                        ->where('email', $email)
                        ->where('password', md5($password))
                        ->limit(1)
                        ->get('user');
        
        if($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false ;
        }
    }

    public function update_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function sudah_login($email, $nama)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('nama', $nama);
        $this->db->order_by('id_user');

        $query = $this->db->get();
        return $query->row();

    }

    public function ambil_id_user($id){
        $hasil = $this->db->where('id_user', $id)->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }




    
}

?>