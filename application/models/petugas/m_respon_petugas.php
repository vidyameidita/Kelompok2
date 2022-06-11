<?php

/**
 * 
 */
class M_respon_petugas extends CI_Model
{
	
	public function get_data() 
	{

		// $this->db->join("table_role a", "a.id_role=b.id_role"); 

		return $this->db->get('table_tanggapan')->result();


	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);

	}

	public function detail_data($id_tanggapan = NULL)
	{
		$query = $this->db->get_where('table_tanggapan', array('id_tanggapan' => $id_tanggapan))->row();
		return $query;
	}
}