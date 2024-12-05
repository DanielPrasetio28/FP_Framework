<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        $this->load->library('session');
        
    }

    public function index()
    {    
        $search = $this->input->get('search');
        $filter = $this->input->get('filter');
    
        // Gunakan hanya satu fungsi untuk mengambil data siswa
        $data['siswa'] = $this->M_siswa->get_siswa($search, $filter);
    
        // Mengirim data siswa ke view
        $this->load->view('siswa/V_siswa', $data);
    }


    public function edit($nisn)
    {
        $data['siswa'] = $this->M_siswa->get_siswa_by_nisn($nisn);
        if ($data['siswa']) {
            $this->load->view('siswa/edit', $data);
        } else {
            show_404();
        }
    }

    public function update($nisn)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angkatan'),
            'kelas_id' => $this->input->post('kelas_id')
        ];

        if ($this->M_siswa->update_siswa($nisn, $data)) {
            redirect('siswa');
        } else {
            show_error('Data gagal diperbarui.');
        }
    }

    public function hapus($nisn)
    {
        // Cek apakah data siswa dengan NISN yang diberikan ada
        $this->db->where('nisn', $nisn);
        $siswa = $this->db->get('siswa')->row();
    
        if ($siswa) {
            // Hapus data siswa
            $this->db->where('nisn', $nisn);
            $this->db->delete('siswa');
    
            // Cek apakah penghapusan berhasil
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data siswa berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus data siswa.');
            }
        } else {
            $this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
        }
    
        // Redirect kembali ke halaman daftar siswa
        redirect('siswa');
    }

    public function tambah()
    {
        // Ambil data jurusan dan kelas
        $data['jurusan'] = $this->M_siswa->get_jurusan();  // Ambil data jurusan dari model
        $data['kelas'] = $this->M_siswa->get_kelas();      // Ambil data kelas dari model
    
        // Muat view tambah siswa
        $this->load->view('siswa/V_tambah_siswa', $data);
    }
    
    public function simpan()
    {
        // Ambil data dari form
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angkatan'),
            'kelas_id' => $this->input->post('kelas'),  // ID kelas dipilih di dropdown
        );
    
        // Simpan data siswa ke database
        $this->M_siswa->simpan_siswa($data);
        redirect('siswa');
    }
    

}

