<?php

class Type_model extends CI_Model
{
    public function getType($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_jenis_logistik')->result_array();
        } else {
            return $this->db->get_where('tbl_jenis_logistik', ['tbl_jenis_id' => $id])->result_array();
        }
    }
}