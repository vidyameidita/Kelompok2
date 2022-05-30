<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Tulis_laporan extends CI_Controller
{
	
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model("user/Mtulis_laporan");
	// }

	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		// $data['tulis_laporan'] = $this->Mtulis_laporan->get_data();
		// print_r($data);
		// die();

		$this->load->view('templates/auth_header');
        $this->load->view('user/Vtulis_laporan');
        $this->load->view('templates/auth_footer');


}

}