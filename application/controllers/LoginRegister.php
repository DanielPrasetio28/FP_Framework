<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LoginRegister extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        $this->load->model('M_loginregister');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('V_index');
    }

    // Login Siswa
    public function login_siswa()
    {
        if($this->input->post()) {
            $nisn = $this->input->post('nisn');
            $password = $this->input->post('password');
            
            // Cek login data
            $login_data = $this->M_loginregister->login_siswa($nisn, $password);
    
            if ($login_data) {
                // Jika login berhasil, set session atau lakukan hal lainnya
                $this->session->set_userdata('nisn', $login_data->nisn);
                redirect('dashboard/V_dashboard_siswa');
            } else {
                // Jika login gagal, beri pesan error
                $this->session->set_flashdata('error', 'NISN atau Password Salah');
                redirect('loginregister/login_siswa');
            }
        }
    
        // Jika form belum disubmit, load view login siswa
        $this->load->view('login/V_login_siswa');
    }

    // Register Siswa
    public function register_siswa()
    {
        if ($this->input->post()) {
            // Mendapatkan data kelas dan jurusan dari model
            $data['jurusan'] = $this->M_siswa->get_jurusan();  
            $data['kelas'] = $this->M_siswa->get_kelas();  
    
            // Menyusun data untuk registrasi
            $register_data = array(
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'angkatan' => $this->input->post('angkatan'),
                'kelas' => $this->input->post('kelas'),
                'password' => $this->input->post('password')
            );
    
            // Menyimpan data siswa ke database
            $this->M_loginregister->register_siswa($register_data);
    
            // Memberikan pesan sukses
            $this->session->set_flashdata('success', 'Registrasi Berhasil');
            
            // Mengalihkan pengguna ke halaman login
            redirect('loginregister/login_siswa');
        }
    
        // Jika form belum disubmit, load view dengan data kelas dan jurusan
        $data['jurusan'] = $this->M_siswa->get_jurusan();  
        $data['kelas'] = $this->M_siswa->get_kelas(); 
    
        $this->load->view('register/V_register_siswa', $data);
    }
    

    // Login Admin
    public function login_admin()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Cek login data admin
            $login_data = $this->M_loginregister->login_admin($username, $password);
    
            if ($login_data) {
                // Jika login berhasil, set session dan redirect
                $this->session->set_userdata('username', $login_data->username);
                $this->session->set_userdata('role', $login_data->role);  // Simpan role
                redirect('dashboard');  // Redirect ke dashboard admin
            } else {
                // Jika login gagal, beri pesan error
                $this->session->set_flashdata('error', 'Username atau Password Salah');
                redirect('loginregister/login_admin');
            }
        }
    
        // Jika form belum disubmit, load login view admin
        $this->load->view('login/V_login_admin');
    }


    // Register Admin
    public function register_admin()
    {
        if($this->input->post()) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'role' => 'admin'
            );

            $this->M_loginregister->register_admin($data);
            $this->session->set_flashdata('success', 'Registrasi Admin Berhasil');
            redirect('loginregister/login_admin');
        }

        $this->load->view('register/V_register_admin');
    }

    // Login Kepsek
    public function login_kepsek()
    {
        if($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Cek login data kepala sekolah
            $login_data = $this->M_loginregister->login_kepsek($username, $password);
    
            if ($login_data) {
                // Jika login berhasil, set session atau lakukan hal lainnya
                $this->session->set_userdata('username', $login_data->username);
                $this->session->set_userdata('role', $login_data->role);  // Simpan role
                redirect('dashboard/V_dashboard_kepsek');
            } else {
                // Jika login gagal, beri pesan error
                $this->session->set_flashdata('error', 'Username atau Password Salah');
                redirect('loginregister/login_kepsek');
            }
        }
    
        // Jika form belum disubmit, load login view kepala sekolah
        $this->load->view('login/V_login_kepsek');
    }

    // Logout Siswa
    public function logout_siswa()
    {
        $this->session->sess_destroy();
        redirect('loginregister/login_siswa');
    }

    // Logout Admin
    public function logout_admin()
    {
        $this->session->sess_destroy();
        redirect('loginregister/login_admin');
    }

    // Logout Kepsek
    public function logout_kepsek()
    {
        $this->session->sess_destroy();
        redirect('loginregister/login_kepsek');
    }
}
