<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_loginregister extends CI_Model {

    // Login Siswa
    public function login_siswa($nisn, $password)
    {
        $this->db->where('nisn', $nisn);
        $query = $this->db->get('login_siswa');
        $login_data = $query->row();
        
        // Verifikasi password (tanpa password_hash)
        if ($login_data && $password === $login_data->password) {
            return $login_data;
        }
        
        return null;
    }

    // Register Siswa
    public function register_siswa($data)
    {
        // Mendaftar siswa baru, pertama masukkan data ke siswa
        $this->db->insert('siswa', $data);
    
        // Kemudian masukkan data login siswa ke login_siswa
        $login_data = [
            'nisn' => $data['nisn'],
            'password' => $data['password']  // Simpan password dalam bentuk biasa
        ];
        $this->db->insert('login_siswa', $login_data);
    }

    // Login Admin
    public function login_admin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('role', 'admin');
        $query = $this->db->get('users');
        $login_data = $query->row();
    
        // Verifikasi password (tanpa password_hash)
        if ($login_data && $password === $login_data->password) {
            return $login_data;
        }
    
        return null;
    }

    // Register Admin
    public function register_admin($data)
    {
        // Menambahkan role admin
        $data['role'] = 'admin';
    
        // Masukkan data admin ke dalam tabel users
        $this->db->insert('users', $data);
    }

    // Login Kepsek
    public function login_kepsek($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('role', 'kepsek');
        $query = $this->db->get('users');
        $login_data = $query->row();
    
        // Verifikasi password (tanpa password_hash)
        if ($login_data && $password === $login_data->password) {
            return $login_data;
        }
    
        return null;
    }
}
