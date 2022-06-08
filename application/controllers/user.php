<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/M_tampil');
    }

    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('user/dashboard_user');
        $this->load->view('templates/auth_footer');
    }

    public function tulis_laporan()
	{
		$this->load->view('templates/auth_header');
        $this->load->view('user/v_input');
        $this->load->view('templates/auth_footer');
	}

    public function tambah_laporan()
	{
            $config['upload_path'] = 'gambar/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('foto'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('user/v_input', $error);
            }
            else
            {
                $upimage = $this->upload->data();
                $this->load->view('user/v_input', $upimage);

                $data = [
                    //onok tambahan htmlspecialchars dan true digawe ngindari serangan XSS Attack
                    'no_tiket' => htmlspecialchars($this->input->post('no_tiket')),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_jenis_pengaduan' => $this->input->post('id_jenis_pengaduan'),
                    'lokasi' => $this->input->post('lokasi'),
                    'tgl_tiket' => date("Y-m-d"),
                    'id_status' => 1,
                    'isian_laporan' => $this->input->post('isian_laporan'),
                    'foto' => $upimage['file_name']
                ];

                $this->db->insert('table_tiket', $data);
                $this->session->set_flashdata('success',
                '<script>
                swal("Berhasil", "Laporan anda sudah kami rekam", "success");
                </script>'
                );
                redirect('user/tulis_laporan');
            }
	}
    
    public function daftar_laporan()
    {
        $nik = $this->session->userdata('id_user');
        $where = array('id_user' => $nik);
        $data['table_tiket'] = $this->db->get_where('table_tiket', $where)->result();

        $this->load->view('templates/auth_header');
        $this->load->view('user/v_tampil', $data);
        $this->load->view('templates/auth_footer');
    }

    public function edit($id_tiket)
    {
        $where = array('id_tiket' => $id_tiket);
        $data['hasil'] = $this->M_tampil->edit_data('table_tiket', $where)->result();

        $this->load->view('templates/auth_header');
        $this->load->view('user/v_edit', $data);
        $this->load->view('templates/auth_footer');
    }

    public function update()
    {
        $config['upload_path'] = 'gambar/upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('edit_foto'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/v_edit', $error);
        }
        else
        {
            $upimage = $this->upload->data();
            $this->load->view('user/v_edit', $upimage);

            $no_tiket = $this->input->post('no_tiket');

            $data = [
                //onok tambahan htmlspecialchars dan true digawe ngindari serangan XSS Attack
                'id_jenis_pengaduan' => $this->input->post('edit_id_jenis_pengaduan'),
                'lokasi' => $this->input->post('edit_lokasi'),
                'tgl_tiket' => $this->input->post('tgl_tiket'),
                'isian_laporan' => $this->input->post('edit_isian_laporan'),
                'foto' => $upimage['file_name']
            ];

            $where = array(
                'no_tiket' => $no_tiket
            );
    
            $this->M_tampil->update_data($where,$data, 'table_tiket');
            $this->session->set_flashdata('success',
            '<script>
            swal("Berhasil", "Laporan anda sudah kami rekam", "success");
            </script>'
            );
            redirect('user/daftar_laporan');
            }
    }

    function hapus($id_tiket)
    {
        $id_tiket = $this->input->post('id_tiket');

        $where = array('id_tiket' => $id_tiket);
        $this->M_tampil->hapus_data($where, 'table_tiket');
        redirect('user/daftar_laporan');
    }

}
