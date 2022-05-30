<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('templates/auth_header');
        $this->load->view('admin/dashboard_admin');
        $this->load->view('templates/auth_footer');
	}
}