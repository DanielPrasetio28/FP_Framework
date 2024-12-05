<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurnal extends CI_Model {

    public function get_all_kelas()
    {
        return $this->db->select('id, tingkat, jurusan, nama_kelas')
                        ->from('kelas')
                        ->get()
                        ->result();
    }

    public function insert_kelas($data)
    {
        return $this->db->insert('kelas', $data);
    }

    public function get_kelas_by_id($id)
    {
        return $this->db->get_where('kelas', ['id' => $id])->row();
    }

    public function get_mata_pelajaran($id)
    {
        $this->db->select('mata_pelajaran.*');
        $this->db->from('mata_pelajaran');
        $this->db->join('kelas_mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = kelas_mata_pelajaran.id_mata_pelajaran');
        $this->db->where('kelas_mata_pelajaran.id', $id);
        return $this->db->get()->result();
    }

    public function get_siswa_by_kelas($id)
    {
        return $this->db->get_where('siswa', ['id' => $id])->result();
    }

    public function get_siswa_by_nisn($id)
    {
        return $this->db->get_where('siswa', ['nisn' => $nisn])->result();
    }

    public function get_jumlah_kelas()
    {
        return $this->db->count_all('kelas');  
    }
}


