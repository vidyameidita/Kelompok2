<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('user/dashboard_user');
        $this->load->view('templates/auth_footer');
    }
}
