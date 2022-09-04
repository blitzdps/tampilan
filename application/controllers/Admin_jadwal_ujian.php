<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_jadwal_ujian extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Jadwal_ujian_model');
		$this->load->model('Pelajaran_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pdf');

        $this->load->model('Main_model');
        $this->load->model('Export_model');
        $this->load->model('Import_model');
        $this->load->helper('tgl_indo');
        $this->load->library('email');

        $users = $this->session->userdata('email');

        $user = $this->db->get_where('karyawan', ['email' => $users])->row_array();
        if ($user['role_id'] == '5') {
            redirect('siswa');
        } elseif ($user['role_id'] !== '1') {
            redirect('karyawan');
        } elseif ($user['role_id'] < '1') {
            redirect('auth/blocked');
        }

        if (!$users) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan masuk terlebih dahulu!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>');
            redirect('auth/admin');
        }
		
		// if (!isset($this->session->userdata['username'])) {
		// 	$this->session->set_flashdata('pesan', 'Anda Belum Login!',
        //     '<div class="alert alert-danger alert-dismissible fade show" role=alert">
        //      Anda Belum Login!
        //      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //      <span aria-hidden="true">&times;</span></button></div>');
        //     redirect('login');
		// }
	}
	
	public function index()
	{
		// $data = $this->Admin_model->ambil_data($this->session->userdata['username']);
		// $data = array(
		// 	'username'	=>	$data->username
		// );

        $data['menu'] = 'jadwal_ujian';
        $data['title'] = 'Data Jadwal Ujian';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['jadwal_ujian']=$this->Jadwal_ujian_model->getAllJadwalUjian()->result_array();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();
		// $this->load->view('pelajaran/tes');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/jadwal_ujian/list', $data);
        $this->load->view('template/footer_admin');
	 
	}

	// public function form()
	// {
	// 		$this->load->view('pelajaran/form');
	// 		$this->load->view('pelajaran/form2');
	// }

	public function tambah()
	{
        $data['menu'] = 'jadwal ujian';
        $data['title'] = 'Data Jadwal Ujian';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
		
		$data['jadwal_ujian']=$this->Jadwal_ujian_model->getAllJadwalUjian()->result_array();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Mulai Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Selesai Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Keterangan Tidak Boleh Kosong.</div>'
                    ));

		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		// $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required');
		// $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		// $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
		// $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/jadwal_ujian/form', $data);
            $this->load->view('template/footer_admin');
        } else {
            $this->Jadwal_ujian_model->tambahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jadwal Ujian <strong></strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_jadwal_ujian');
		}
		
	}

	public function hapus()
	{
		$id_jadwal_ujian = $this->input->get('id_jadwal_ujian');
        $this->db->delete('tbl_jadwal_ujian', array('id_jadwal_ujian' => $id_jadwal_ujian));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jadwal Ujian berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_jadwal_ujian');
		
	}

	public function ubah($id)
	{
        $data['menu'] = 'jadwal ujian';
        $data['title'] = 'Data Jadwal Ujian';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

        $data['jadwal_ujian']=$this->Jadwal_ujian_model->getJadwalUjianById($id)->row_array();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Mulai Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Selesai Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Keterangan Tidak Boleh Kosong.</div>'
                    ));
                    
                    if ($this->form_validation->run() == FALSE ) {
                        $this->load->view('template/header', $data);
                        $this->load->view('template/sidebar_admin', $data);
                        $this->load->view('template/topbar_admin', $data);
                        $this->load->view('admin/jadwal_ujian/ubah', $data);
                        $this->load->view('template/footer_admin');	
                    } else {
                        $this->Jadwal_ujian_model->ubahdata($data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Jadwal Ujian berhasil diubah
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                    redirect('admin_jadwal_ujian');
                    }
	}

	public function cetak()
	{
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result_array();
		$this->load->view('pelajaran/cetak' ,$data);
		
	}
}