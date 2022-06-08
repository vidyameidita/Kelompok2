<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tampil extends CI_Model
{

    function edit_data($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}