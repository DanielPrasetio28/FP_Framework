<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
            $this->load->view('v_form');
        }

    function prosessData() {

    $data = $this->input->post();

    // Data profil
    $data['profile_picture'] = base_url('assets/Profil.jpg');
    $data['email_icon'] = base_url('assets/email.svg');
    $data['whatsapp_icon'] = base_url('assets/logo-whatsapp.svg');
    $data['instagram_icon'] = base_url('assets/logo-instagram.svg');

    $data['name'] = $data['name']??'';
    $data['address'] = $data['address']??'';
    $data['phone'] = $data['phone']??'';
    $data['email'] = $data['email']??'';
    

    // Data pendidikan
    $data['school_sd'] = $data['school_sd']??'SD tidak diketahui';
    $data['year_sd'] = $data['year_sd']??'Tahun tidak diketahui';

    $data['school_smp'] = $data['school_smp']??'SMP tidak diketahui';
    $data['year_smp'] = $data['year_smp']??'Tahun tidak diketahui';

    $data['school_sma'] = $data['school_sma']??'SMA tidak diketahui';
    $data['year_sma'] = $data['year_sma']??'Tahun tidak diketahui';

    $data['school_univ'] = $data['school_univ']??'Universitas tidak diketahui';
    $data['year_univ'] = $data['year_univ']??'Tahun tidak diketahui';
    

    // Data pengalaman kerja
    $data['company'] = $data['company']??'Tempat bekerja tidak diketahui';
    $data['year_company'] = $data['year_company']??'Tahun tidak diketahui';
    $data['position'] = $data['position']??'Posisi tidak diketahui';

    // Data skill
    $data['skills'] = [
        [
            'name' => 'HTML',
            'icon' => base_url('assets/html.png')
        ],
        [
            'name' => 'CSS',
            'icon' => base_url('assets/css.png')
        ],
        [
            'name' => 'JavaScript',
            'icon' => base_url('assets/js.png')
        ],
        [
            'name' => 'Tailwind CSS',
            'icon' => base_url('assets/Tailwind CSS.png')
        ]
    ];

    // Title halaman
    $data['title'] = 'Resume Interface';

    $this->load->helper('url');

    // Memuat view dan mengirimkan data
    $this->load->view('index', $data);
}
}