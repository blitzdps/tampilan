<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_nilai_ulangan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nilai_ulangan_model');
		$this->load->model('Siswa_model');
		$this->load->model('Ulangan_model');
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
		$data['menu'] = 'nilai_ulangan';
        $data['title'] = 'Data Nilai Ulangan';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['nilai_ulangan']=$this->Nilai_ulangan_model->getAllNilaiUlangan()->result_array();
		$data['ulangan']=$this->Ulangan_model->getAllUlangan()->result();
		$data['siswa']=$this->Siswa_model->getAllSiswa()->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/nilai_ulangan/list', $data);
        $this->load->view('template/footer_admin');
	}


	public function tambah()
	{
        $data['menu'] = 'nilai ulangan';
        $data['title'] = 'Data Nilai Ulangan';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['nilai_ulangan']=$this->Nilai_ulangan_model->getAllNilaiUlangan()->result_array();
		$data['ulangan']=$this->Ulangan_model->getAllUlangan()->result();
		$data['siswa']=$this->Siswa_model->getAllSiswa()->result();

        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Siswa Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_ulangan', 'Ulangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Ulangan Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_ulangan', 'Nilai Ulangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai Ulangan Tidak Boleh Kosong.</div>'
                    ));

		if ($this->form_validation->run() == FALSE ) {
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/nilai_ulangan/form', $data);
        $this->load->view('template/footer_admin');	
		} else {
			$this->Nilai_ulangan_model->tambahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Nilai Ulangan <strong></strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_nilai_ulangan');
		}
	}

	public function hapus()
	{
		$id_nilai_ulangan = $this->input->get('id_nilai_ulangan');
        $this->db->delete('tbl_nilai_ulangan', array('id_nilai_ulangan' => $id_nilai_ulangan));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Nilai Ulangan berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_nilai_ulangan');
		
	}


	public function ubah($id)
	{
		$data['menu'] = 'nilai ulangan';
        $data['title'] = 'Data Nilai Ulangan';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['nilai_ulangan']=$this->Nilai_ulangan_model->getNilaiUlanganById($id)->row_array();
		$data['ulangan']=$this->Ulangan_model->getAllUlangan()->result();
		$data['siswa']=$this->Siswa_model->getAllSiswa()->result();

        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Siswa Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_ulangan', 'Ulangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Ulangan Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_ulangan', 'Nilai Ulangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai Ulangan Tidak Boleh Kosong.</div>'
                    ));

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/nilai_ulangan/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {
			$this->Nilai_ulangan_model->ubahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Nilai Ulangan berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_nilai_ulangan');
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