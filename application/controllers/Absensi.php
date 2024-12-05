<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function index()
    {
        $this->load->view('absensi');
    }
}
