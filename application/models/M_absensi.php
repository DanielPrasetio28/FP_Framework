<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model {

    // Mengambil tanggal hari kerja (Senin-Jumat)
    public function get_tanggal_hari_kerja() {
        $hari_ini = date('Y-m-d');
        $hari_kerja = [];
        for ($i = 0; $i < 30; $i++) { // 30 hari ke depan
            $tanggal = date('Y-m-d', strtotime("+$i day", strtotime($hari_ini)));
            $hari = date('N', strtotime($tanggal)); // 1 = Senin, 5 = Jumat
            if ($hari >= 1 && $hari <= 5) {
                $hari_kerja[] = $tanggal;
            }
        }
        return $hari_kerja;
    }

    // Mengambil siswa berdasarkan kelas
    public function get_siswa_by_kelas($kelas_id, $tanggal) {
        $this->db->select('siswa.nisn, siswa.nama, absensi.status');
        $this->db->from('siswa');
        $this->db->join('absensi', 'siswa.nisn = absensi.siswa_nisn AND absensi.tanggal = "' . $tanggal . '"', 'left');
        $this->db->where('siswa.kelas_id', $kelas_id);
        return $this->db->get()->result();
    }

    // Menyimpan data absensi
    public function save_absensi($kelas_id, $tanggal, $absensi) {
        foreach ($absensi as $nisn => $status) {
            $data = [
                'siswa_nisn' => $nisn,
                'kelas_id' => $kelas_id,
                'tanggal' => $tanggal,
                'status' => $status
            ];
            
            $this->db->replace('absensi', $data);
    
            // Cek apakah query berhasil
            if ($this->db->affected_rows() > 0) {
                log_message('info', 'Absensi berhasil disimpan untuk NISN: ' . $nisn);
            } else {
                log_message('error', 'Gagal menyimpan absensi untuk NISN: ' . $nisn);
            }
        }
    }
    
}
