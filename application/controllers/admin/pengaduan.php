<?php

/**
 * 
 */
class Pengaduan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/m_pengaduan");
	}

	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		$data['pengaduan'] = $this->m_pengaduan->get_data();
		// print_r($data);
		// die();

		$this->load->view('templates/auth_header');
        $this->load->view('admin/v_pengaduan', $data);
        $this->load->view('templates/auth_footer');
	}

	public function hapus_pengaduan($id_tiket) 
	{
		$where = array('id_tiket' => $id_tiket);
		$this->m_pengaduan->hapus_data($where, 'table_tiket');
		redirect('admin/pengaduan/index');

	}

	public function detail_pengaduan($id_tiket) 
	{
		$this->load->model('m_pengaduan');
		$detail_pengaduan = $this->m_pengaduan->detail_data($id_tiket);
		$data['detail_pengaduan'] = $detail_pengaduan;

		$this->load->view('templates/auth_header');
        $this->load->view('admin/detail_pengaduan', $data);
        $this->load->view('templates/auth_footer');
	}


} 