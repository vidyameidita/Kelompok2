<?php

/**
 * 
 */
class Respon_petugas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("petugas/m_respon_petugas");
	}

	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		$data['respon_petugas'] = $this->m_respon_petugas->get_data();
		// print_r($data);
		// die();

		$this->load->view('templates/auth_header');
        $this->load->view('petugas/v_respon_petugas', $data);
        $this->load->view('templates/auth_footer');
	}
	public function hapus_respon($id_tanggapan) 
	{
		$where = array('id_tanggapan' => $id_tanggapan);
		$this->m_respon_petugas->hapus_data($where, 'table_tanggapan');
		redirect('petugas/respon_petugas/');

	}

	public function detail_respon($id_tanggapan) 
	{
		$this->load->model('m_respon_petugas');
		$detail_pengaduan = $this->m_respon_petugas->detail_data($id_tanggapan);
		$data['detail_respon'] = $detail_respon;

		$this->load->view('templates/auth_header');
        $this->load->view('respon/detail_respon', $data);
        $this->load->view('templates/auth_footer');
	}
}