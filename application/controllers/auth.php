<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    //untuk memanggil form_validation ketika mengakses controller auth berlaku untuk semua function
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('login_email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('login_password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //pengecekan lolos
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('login_email');
        $password = $this->input->post('login_password');

        $user = $this->db->get_where('table_user', ['email' => $email])->row_array();

        if ($user['email'] == $email) {
            // jika lolos atau email ada
            // dan cek password
            if ($user['id_role'] == 2 and password_verify($password, $user['password'])) {
                //jika yang login pengguna
                $data = [
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'id_role' => $user['id_role']
                ];
                $this->session->set_userdata($data);
                redirect('user');
            } elseif ($user['id_role'] == 1 and password_verify($password, $user['password'])) {
                //jika yang login admin
                $data = [
                    'email' => $user['email'],
                    'id_role' => $user['id_role']
                ];
                $this->session->set_userdata($data);
                redirect('admin/dashboard_admin');
            } else {
                //notif password salah
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger" role="alert">
                        Password yang anda masukkan salah!</div>'
                );
                redirect('auth');
            }
        } else {
            //jika gagal
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-info" role="alert">
                    Akun belum terdaftar!</div>'
            );
            redirect('auth');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required|numeric|trim|max_length[16]|is_unique[table_user.id_user]', [
            'is_unique' => 'NIK ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jk', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[table_user.email]', [
            'is_unique' => 'Email ini sudah digunakan!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => "Password tidak sama!",
            'ming_length' => "Password terlalu pendek! (min 8)"
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required|numeric|max_length[13]');

        if ($this->form_validation->run() == false) {
            // jika form_validation tidak berjalan
            $this->load->view('templates/auth_header');
            $this->load->view('auth/daftar');
            $this->load->view('templates/auth_footer');
        } else {

            $data = [
                //onok tambahan htmlspecialchars dan true digawe ngindari serangan XSS Attack
                'id_user' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_jk' => $this->input->post('jk'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'id_role' => 2,
            ];

            $this->db->insert('table_user', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
            Akun berhasil terdaftar, silahkan Masuk!</div>'
            );

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda Telah Keluar !</div>');
        redirect('auth');
    }
}
