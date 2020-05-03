<?php

class Permintaan_model extends CI_Model
{
    public function getPermintaan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_permintaan')->result_array();
        } else {
            return $this->db->get_where('tbl_permintaan', ['tbl_permintaan_id' => $id])->result_array();
        }
    }

    public function deletePermintaan($id)
    {
        $this->db->delete('tbl_permintaan', ['tbl_permintaan_id' => $id]);
        return $this->db->affected_rows();
    }

    public function createPermintaan($data)
    {
        $this->db->insert('tbl_permintaan', $data);
        return $this->db->affected_rows();
    }

    public function UpdatePermintaan($data, $id)
    {
        $this->db->update('tbl_permintaan', $data, ['tbl_permintaan_id' => $id]);
        return $this->db->affected_rows();
    }
}