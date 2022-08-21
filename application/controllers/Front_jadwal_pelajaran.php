<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front_jadwal_pelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('M_home');
    }

    public function index()
    {
        $data['menu'] = 'jadwal_pelajaran';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();

        $data['jadwal_pelajaran'] =  $this->db->get('tbl_jadwal_pelajaran')->result_array();


        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/jadwal_pelajaran', $data);
        $this->load->view('frontend/footer', $data);
    }
}
