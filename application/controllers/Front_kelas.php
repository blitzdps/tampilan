<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front_kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('M_home');
    }

    public function index()
    {
        $data['menu'] = 'kelas';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();

        $data['kelas'] =  $this->db->get('tbl_kelas')->result_array();


        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/kelas', $data);
        $this->load->view('frontend/footer', $data);
    }
}
