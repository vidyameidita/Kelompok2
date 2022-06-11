<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Dashboard_petugas extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('templates/auth_header');
        $this->load->view('petugas/v_dashboard_petugas');
        $this->load->view('templates/auth_footer');
	}
}
