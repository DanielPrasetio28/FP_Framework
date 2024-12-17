<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jurnal');
        $this->load->model('M_siswa');
    }

    public function index()
    {
        $data['kelas'] = $this->M_jurnal->get_all_kelas();
        $this->load->view('jurnal/V_jurnal', $data);
    }

    public function tambah_kelas()
    {
        $nama_kelas = $this->input->post('nama_kelas');
        $jurusan = $this->input->post('jurusan');
        $tingkat = $this->input->post('tingkat');

        $this->M_jurnal->insert_kelas([
            'nama_kelas' => $nama_kelas,
            'jurusan' => $jurusan,
            'tingkat' => $tingkat,
        ]);

        redirect('jurnal');
    }

    public function detail($kelas_id)
    {
        // Mengambil siswa berdasarkan kelas_id
        $data['siswa'] = $this->M_siswa->get_siswa_by_kelas($kelas_id);
        // Mengambil detail kelas berdasarkan kelas_id untuk ditampilkan di view
        $data['kelas'] = $this->M_jurnal->get_kelas_by_id($kelas_id);

        $this->load->view('jurnal/V_kelas', $data);
    }

    public function hapus($id)
    {
        // Panggil fungsi hapus_kelas di model dan cek apakah berhasil
        if ($this->M_jurnal->hapus_kelas($id)) {
            $this->session->set_flashdata('success', 'Kelas berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Kelas gagal dihapus.');
        }

        // Redirect kembali ke halaman jurnal
        redirect('jurnal');
    }

}
