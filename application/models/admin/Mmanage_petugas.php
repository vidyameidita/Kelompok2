<?php


class Mmanage_petugas extends CI_Model {

	public function get_data() 
	{

		$this->db->join("table_role a", "a.id_role=b.id_role"); 

		return $this->db->get('table_petugas b')->result();


		// $registrasi = "registrasi";
		// return $registrasi;

	}

	public function input_data($data)
	{
		return $this->db->insert("table_petugas", $data);

	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);

	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);

	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	 
}