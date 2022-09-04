<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_tugas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tugas_model');
		$this->load->model('Pelajaran_model');
		$this->load->model('Kelas_model');
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
	}
	
	public function index()
	{
		$data['menu'] = 'tugas';
        $data['title'] = 'Data Tugas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['tugas']=$this->Tugas_model->getAllTugas()->result_array();
		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/tugas/list', $data);
        $this->load->view('template/footer_admin');
	}


	public function tambah()
	{
        $data['menu'] = 'tugas';
        $data['title'] = 'Data Tugas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
		

		$data['tugas']=$this->Tugas_model->getAllTugas()->result_array();
		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

        $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nama_tugas', 'Nama Tugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tugas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Tidak Boleh Kosong.</div>'
                    ));



		if ($this->form_validation->run() == FALSE ) {
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/tugas/form', $data);
        $this->load->view('template/footer_admin');	
		} else {
			$this->Tugas_model->tambahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tugas <strong></strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_tugas');
		}
	}

	public function hapus()
	{
		$id_tugas = $this->input->get('id_tugas');
        $this->db->delete('tbl_tugas', array('id_tugas' => $id_tugas));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tugas berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_tugas');
		
	}


	public function ubah($id)
	{
		$data['menu'] = 'tugas';
        $data['title'] = 'Data Tugas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();
		$data['tugas']=$this->Tugas_model->getTugasById($id)->row_array();

        $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nama_tugas', 'Nama Tugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tugas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Tidak Boleh Kosong.</div>'
                    ));

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/tugas/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {
			$this->Tugas_model->ubahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tugas berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_tugas');
		}
	}

	public function cetak()
	{
		$data['jadwal']=$this->Jadwal_model->getAllJadwal()->result_array();
		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();
		$data['guru']=$this->Guru_model->getAllGuru()->result();
		$this->load->view('jadwal/cetak' ,$data);
	}
}