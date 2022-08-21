<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front_jadwal_ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('M_home');
    }

    public function index()
    {
        $data['menu'] = 'jadwal_ujian';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();

        $data['jadwal_ujian'] =  $this->db->get('tbl_jadwal_ujian')->result_array();


        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/jadwal_ujian', $data);
        $this->load->view('frontend/footer', $data);
    }
}
