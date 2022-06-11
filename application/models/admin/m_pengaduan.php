<?php

/**
 * 
 */
class M_pengaduan extends CI_Model
{
	
	public function get_data() 
	{

		// $this->db->join("table_role a", "a.id_role=b.id_role"); 
		$this->db->join("table_status ts", "tt.id_status = ts.id_status");

		return $this->db->get('table_tiket tt')->result();

	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);

	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function detail_data($id_tiket = NULL)
	{
		$query = $this->db->get_where('table_tiket', array('id_tiket' => $id_tiket))->row();
		return $query;
	}

	
}