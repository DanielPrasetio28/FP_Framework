<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model siswa dan kelas
        $this->load->model('M_siswa');
        $this->load->model('M_jurnal'); 
        $this->load->model('M_admin'); 
    }


    public function index()
    {
        // Ambil jumlah siswa dan jumlah kelas dari model
        $data['jumlah_admin'] = $this->M_admin->get_jumlah_admin();
        $data['jumlah_siswa'] = $this->M_siswa->get_jumlah_siswa();
        $data['jumlah_kelas'] = $this->M_jurnal->get_jumlah_kelas(); 

        // Load view dengan data jumlah siswa dan jumlah kelas
        $this->load->view('dashboard/V_dashboard', $data);
    }

    public function dashboard_siswa()
    {
        $this->load->view('dashboard/V_dashboard_siswa', $data);
    }
}
