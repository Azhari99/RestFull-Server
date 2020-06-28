<?php

class Category_model extends CI_Model
{
    public function getCategory($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_kategori')->result_array();
        } else {
            return $this->db->get_where('tbl_kategori', ['tbl_kategori_id' => $id])->result_array();
        }
    }
}