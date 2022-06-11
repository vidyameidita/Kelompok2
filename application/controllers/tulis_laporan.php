<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Tulis_laporan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user/Mtulis_laporan");
	}

	public function index()
	{
		// $data['sip'] = 'ini contoh untuk menampilkan data';
		// $data['tulis_laporan'] = $this->Mtulis_laporan->get_data();
		// print_r($data);
		// die();

		$data['tulis_laporan'] = $this->Mtulis_laporan->get_data();

		// print_r($data);
		// die();
		$this->load->view('templates/auth_header');
        $this->load->view('user/Vtulis_laporan');
        $this->load->view('templates/auth_footer');
    }

    public function tambah_aksi()
    {
    	$id_jenis_pengaduan = $this->input->post('id_jenis_pengaduan');
    	$tgl_tiket			= $this->input->post('tgl_tiket');
    	$isian_laporan		= $this->input->post('isian_laporan');
    	$foto 				= $_FILES ['foto'];
    	if ($foto= ''){}else{
    		$config['upload_path'] = './assets/foto';
    		$config['allowed_types'] = 'jpg|jpeg|png|gif';

    		$this->load->library('upload', $config);
    		if (!$this->upload->do_upload('foto')){
    			echo "Upload gagal"; die();
    		}else {
    			$foto= $this->upload->data('file_name');
    		}
    	}

    	$data = array (
    		'id_jenis_pengaduan'	=> $id_jenis_pengaduan,
    		'tgl_tiket'				=> $tgl_tiket,
    		'isian_laporan'			=> $isian_laporan,
    		'foto'					=> $foto

    	);

    	$this->Mtulis_laporan->input_data($data);
		redirect('tulis_laporan/index');

    }




}