<?php

class Budgetinstituteout_model extends CI_Model
{
    public function getBudgetInstituteOut($param, $amount)
    {
        if( $amount === null){
            if ($param === null) {
                $this->db->select_sum('qtyentered');
                $this->db->from('tbl_barangkeluar');
                return $this->db->get()->result_array();
                //return $this->db->get('tbl_barangkeluar')->result_array();
            } else {
                $this->db->select_sum('qtyentered');
                $this->db->from('tbl_barangkeluar');
                $this->db->where($param);
                return $this->db->get()->result_array();
                //return $this->db->get_where('tbl_anggaran', $param)->result_array();
            }
        } else {
            if ($param === null) {
                $this->db->select_sum('amount');
                $this->db->from('tbl_barangkeluar');
                return $this->db->get()->result_array();
                //return $this->db->get('tbl_barangkeluar')->result_array();
            } else {
                $this->db->select_sum('amount');
                $this->db->from('tbl_barangkeluar');
                $this->db->where($param);
                return $this->db->get()->result_array();
                //return $this->db->get_where('tbl_anggaran', $param)->result_array();
            }
        }
        
    }
}