<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_loginregister extends CI_Model {

    // Login Siswa
    public function login_siswa($nisn, $password)
    {
        $this->db->where('nisn', $nisn);
        $query = $this->db->get('siswa');
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

    public function login_admin($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admin');
        $login_data = $query->row();
    
        // Verifikasi password (tanpa password_hash)
        if ($login_data && $password === $login_data->password) {
            return $login_data;
        }
    
        return null;
    }

    public function register_admin($data) {
        // Menambahkan data admin ke tabel admin
        $this->db->insert('admin', $data);
        return $this->db->insert_id(); // Mengembalikan ID yang baru dimasukkan
    }

    public function get_admin_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        return $query->row(); // Mengembalikan data admin
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
