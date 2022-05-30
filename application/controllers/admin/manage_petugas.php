<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Manage_petugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/Mmanage_petugas");
	}
	
	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		$data['registrasi'] = $this->Mmanage_petugas->get_data();
		// print_r($data);
		// die();

		$this->load->view('templates/auth_header');
        $this->load->view('admin/Vmanage_petugas', $data);
        $this->load->view('templates/auth_footer');
	}

	public function tambah_aksi()
	{
		// $id_petugas		= $this->input->post('id_petugas');
		$nama_petugas	= $this->input->post('nama_petugas');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$telp_petugas 	= $this->input->post('telp_petugas');
		$id_role			= $this->input->post('id_role');

		$data = array(

			'id_petugas'	=> '',
			'nama_petugas'	=> $nama_petugas,
			'username'		=> $username,
			'password'		=> $password,
			'telp_petugas'	=> $telp_petugas,
			'id_role'		=> $id_role
		);

		$this->Mmanage_petugas->input_data($data);
		redirect('admin/manage_petugas/index');
	}

	public function hapus($id_petugas) 
	{
		$where = array('id_petugas' => $id_petugas);
		$this->Mmanage_petugas->hapus_data($where, 'table_petugas');
		redirect('admin/manage_petugas/index');

	}

	public function edit($id_petugas) 
	{
		$where = array('id_petugas' => $id_petugas);
		$data['manage_petugas'] = $this->Mmanage_petugas->edit_data($where, 'table_petugas')->result();
		$this->load->view('templates/auth_header');
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/auth_footer');
		

	}

	public function update()
	{
		$id_petugas		= $this->input->post('id_petugas');
		$nama_petugas	= $this->input->post('nama_petugas');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$telp_petugas	= $this->input->post('telp_petugas');
		$id_role		= $this->input->post('id_role');

		$data = array(
			'id_petugas'	=> '',
			'nama_petugas'	=> $nama_petugas,
			'username'		=> $username,
			'password'		=> $password,
			'telp_petugas'	=> $telp_petugas,
			'id_role'		=> $id_role
		);

		$where = array('id_petugas' => $id_petugas);

			$this->Mmanage_petugas->update_data($where, $data, 'table_petugas');
		redirect('admin/manage_petugas/index');


	}
}