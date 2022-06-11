<?php

/**
 * 
 */
class Registrasi_admin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/Mregistrasi_admin");
	}

	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		$data['registrasi_admin'] = $this->Mregistrasi_admin->get_data();
		// print_r($data);
		// die();

		$this->load->view('templates/auth_header');
        $this->load->view('admin/Vregistrasi_admin', $data);
        $this->load->view('templates/auth_footer');
	}

	public function tambah_aksi()
	{
		// print_r($_POST);
		// die();
		$this->form_validation->set_rules('id_user', 'Nik', 'required|numeric|trim|max_length[16]|is_unique[table_user.id_user]', ['is_unique' => 'NIK ini sudah digunakan!']);

		if ($this->form_validation->run()){
        	$id_user		= $this->input->post('id_user');
			$nama 			= $this->input->post('nama');
			$id_jk 			= $this->input->post('id_jk');
			$email			= $this->input->post('email');
			$password		= $this->input->post('password');
			$alamat 		= $this->input->post('alamat');
			$telp 		 	= $this->input->post('telp');
			// $nama 			= $this->input->post('nama');
			$id_role		= $this->input->post('id_role');

			$data = array(

				'id_user'		=> $id_user,
				'nama'			=> $nama,
				'id_jk'			=> $id_jk,
				'email'			=> $email,
				'password'		=> $password,
				'alamat'		=> $alamat,
				'telp'			=> $telp,
				'id_role'		=> $id_role
			);
			// print_r($data);

			$this->Mregistrasi_admin->input_data($data);
			print_r("<script type='text/javascript'>alert('simpan berhasil !!');
				window.location.href = '".base_url()."admin/registrasi_admin/index';</script>");
        }else{

			print_r("<script type='text/javascript'>alert('simpan gagal !!');
				window.location.href = '".base_url()."admin/registrasi_admin/index';</script>");
                // $this->load->view('formsuccess');
        }

		// die();
		// redirect('admin/registrasi_admin/index');
		
	}

	public function hapus_registrasi($id_user) 
	{
		$where = array('id_user' => $id_user);
		$this->Mregistrasi_admin->hapus_data($where, 'table_user');
		print_r("<script type='text/javascript'>alert('Hapus Berhasil!!');
				window.location.href = '".base_url()."admin/registrasi_admin/index';</script>");
            
	}

	public function edit_registrasi($id_user) 
	{
		$where = array('id_user' => $id_user);
		$data['pengaduan'] = $this->Mregistrasi_admin->edit_data($where, 'table_user')->result();
		$this->load->view('templates/auth_header');
        $this->load->view('admin/edit_registrasi', $data);
        $this->load->view('templates/auth_footer');
		

	}

	public function update($id_user)
	{
		// print_r($_POST);
		// die();
		// $this->for
		// $id_user		= $this->input->post('id_user');
		$nama 			= $this->input->post('nama');
		$id_jk			= $this->input->post('id_jk');
		$email			= $this->input->post('email');
		$password		= $this->input->post('password');
		$alamat			= $this->input->post('alamat');
		$telp 			= $this->input->post('telp');
		$id_role		= $this->input->post('id_role');

		$data = array(
			// 'id_user'		=> '',
			'nama'			=> $nama,
			'id_jk'			=> $id_jk,
			'email'			=> $email,
			'password'		=> $password,
			'alamat'		=> $alamat,
			'telp'			=> $telp,
			'id_role'		=> $id_role
		);

		$where = array('id_user' => $id_user);

			$this->Mregistrasi_admin->update_data($where, $data, 'table_user');
		redirect('admin/registrasi_admin/index');


	}
}