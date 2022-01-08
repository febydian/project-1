<?php 
class Ikan_api_model extends CI_Model{
    public function getIkan($id = null)
    {
        if($id == null) {
            return $this->db->get('ikan')->result_array();
        } else {
            return $this->db->get_where('ikan', ['id_ikan' => $id])->result_array();
        }
    }
}

?>