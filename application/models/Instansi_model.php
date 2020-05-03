<?php

class Instansi_model extends CI_Model
{
    public function getInstansi($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_instansi')->result_array();
        } else {
            return $this->db->get_where('tbl_instansi', ['tbl_instansi_id' => $id])->result_array();
        }
    }
}