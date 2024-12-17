<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model siswa, jurnal, dan admin
        $this->load->model('M_siswa');
        $this->load->model('M_jurnal'); 
        $this->load->model('M_admin'); 

        // Load session library jika belum diload
        $this->load->library('session');
    }

    // Dashboard Admin
    public function index()
    {
        // Ambil data jumlah admin, siswa, dan kelas
        $data['jumlah_admin'] = $this->M_admin->get_jumlah_admin();
        $data['jumlah_siswa'] = $this->M_siswa->get_jumlah_siswa();
        $data['jumlah_kelas'] = $this->M_jurnal->get_jumlah_kelas();

        // Load view dashboard admin dengan data
        $this->load->view('dashboard/V_dashboard', $data);
    }

    // Dashboard Siswa
    public function dashboard_siswa()
    {
        // Contoh data dummy untuk siswa yang login (bisa diambil dari session)
        $data['nama'] = $this->session->userdata('nama') ?? 'Nama Siswa';
        $data['nisn'] = $this->session->userdata('nisn') ?? '1234567890';
        $data['kelas'] = $this->session->userdata('kelas') ?? 'XII IPA 1';
        $data['tanggal_lahir'] = $this->session->userdata('tanggal_lahir') ?? '2004-01-01';

        // Data status pembayaran (contoh dummy, ganti dengan query ke model jika ada)
        $data['status_pembayaran'] = 'lunas';

        // Data absensi (dummy)
        $data['absensi'] = [
            'hadir' => 20,
            'tidak_hadir' => 2,
        ];

        // Data jurnal kelas terbaru (dummy)
        $data['jurnal_terbaru'] = [
            'materi' => 'Pengenalan Algoritma',
            'tanggal' => date('Y-m-d'),
        ];

        // Load view dashboard siswa dengan data
        $this->load->view('dashboard/V_dashboard_siswa', $data);
    }
}
