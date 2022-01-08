<?php 

class kategori_model extends CI_Model{

    public function indukan(){
        return $this->db->get_where('ikan', array('type_ikan' => 'INDUKAN'));
    }
}

?>