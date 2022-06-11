<?php
/**
 * 
 */
class Mtulis_laporan extends CI_Model
{
	
	public function get_data() 
	{

		// $this->db->join("table_role a", "a.id_role=b.id_role"); 

		return $this->db->get('table_tiket')->result();


		// $registrasi = "registrasi";
		// return $registrasi;

	}

	public function input_data($data)
	{
		return $this->db->insert("table_tiket", $data);

	}
}