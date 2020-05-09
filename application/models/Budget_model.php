<?php

class Budget_model extends CI_Model
{
    public function getBudget($param = null)
    {
        if ($param === null) {
            return $this->db->get('tbl_anggaran')->result_array();
        } else {
            return $this->db->get_where('tbl_anggaran', $param)->result_array();
        }
    }
}