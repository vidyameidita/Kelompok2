<?php

/**
 * 
 */
class Pengaduan_petugas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("petugas/m_pengaduan_petugas");
	}

	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		$data['pengaduan_petugas'] = $this->m_pengaduan_petugas->get_data();
		// print_r($data);
		// die();

		$this->load->view('templates/auth_header');
        $this->load->view('petugas/v_pengaduan_petugas', $data);
        $this->load->view('templates/auth_footer');
	}

	public function hapus($id_tiket) 
	{
		$where = array('id_tiket' => $id_tiket);
		$this->m_pengaduan_petugas->hapus_data($where, 'table_tiket');
		redirect('petugas/pengaduan_petugas/index');

	}

	public function edit($id_tiket) 
	{
		$where = array('id_tiket' => $id_tiket);
		$data['pengaduan_petugas'] = $this->m_pengaduan_petugas->edit_data($where, 'table_tiket')->result();
		$this->load->view('templates/auth_header');
        $this->load->view('petugas/edit', $data);
        $this->load->view('templates/auth_footer');

    }

    public function update($id_tiket)
	{
		// print_r($_POST);
		// die();

		// $id_tiket		= $this->input->post('id_tiket');
		// $id_user		= $this->input->post('id_user');
		// $id_jenis_pengaduan		= $this->input->post('id_jenis_pengaduan');
		// $tgl_tiket		= $this->input->post('tgl_tiket');
		$id_status		= $this->input->post('id_status');
		// $isian_laporan	= $this->input->post('isian_laporan');

		$data = array(
			// 'id_tiket'		=> '',
			// 'id_user'		=> $id_user,
			// 'id_jenis_pengaduan'		=> $id_jenis_pengaduan,
			// 'tgl_tiket'		=> $tgl_tiket,
			'id_status'		=> $id_status
			// 'isian_laporan'	=> $isian_laporan
		);

		$where = array('id_tiket' => $id_tiket);

			$this->m_pengaduan_petugas->update_data($where, $data, 'table_tiket');
		redirect('petugas/pengaduan_petugas/');


	}



}