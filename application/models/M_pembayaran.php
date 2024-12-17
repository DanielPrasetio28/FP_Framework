<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

    // Simpan data pembayaran (upload bukti transfer)
    public function simpan_pembayaran($data) {
        return $this->db->insert('pembayaran', $data);
    }

    public function get_pembayaran_by_siswa($nisn) {
        $this->db->select('pembayaran.*, siswa.nama AS nama_siswa');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'pembayaran.siswa_nisn = siswa.nisn');
        $this->db->where('pembayaran.siswa_nisn', $nisn);
        return $this->db->get()->result();
    }
    

    public function update_pembayaran($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pembayaran', $data);
    }

    // Ambil semua pembayaran (untuk admin)
    public function get_all_pembayaran() {
        $this->db->select('pembayaran.*, siswa.nama AS nama_siswa');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'pembayaran.siswa_nisn = siswa.nisn');
        return $this->db->get()->result();
    }
}
