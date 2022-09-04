<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_nilai_siswa extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nilai_siswa_model');
		$this->load->model('Siswa_model');
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
	}
	
	public function index()
	{
		$data['menu'] = 'nilai siswa';
        $data['title'] = 'Data Nilai Siswa';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['nilai_siswa']=$this->Nilai_siswa_model->getAllNilaiSiswa()->result_array();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/nilai_siswa/list', $data);
        $this->load->view('template/footer_admin');
	}


	public function tambah()
	{
        $data['menu'] = 'nilai siswa';
        $data['title'] = 'Data Nilai Tugas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['nilai_siswa']=$this->Nilai_siswa_model->getAllNilaiSiswa()->result_array();
		$data['siswa']=$this->Siswa_model->getAllSiswa()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Siswa Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_tugas', 'Nilai Tugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai Tugas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_ulangan', 'Nilai Ulangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai Ulangan Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_uts', 'Nilai UTS', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai UTS Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_uas', 'Nilai UAS', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai UAS Tidak Boleh Kosong.</div>'
                    ));

		if ($this->form_validation->run() == FALSE ) {
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/nilai_siswa/form', $data);
        $this->load->view('template/footer_admin');	
		} else {
			$this->Nilai_siswa_model->tambahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Nilai Siswa <strong></strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_nilai_siswa');
		}
	}

	public function hapus()
	{
		$id_nilai_siswa = $this->input->get('id_nilai_siswa');
        $this->db->delete('tbl_nilai_siswa', array('id_nilai_siswa' => $id_nilai_siswa));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Nilai Siswa berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_nilai_siswa');
		
	}


	public function ubah($id)
	{
		$data['menu'] = 'nilai siswa';
        $data['title'] = 'Data Nilai Siswa';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['nilai_siswa']=$this->Nilai_siswa_model->getNilaiSiswaById($id)->row_array();
		$data['siswa']=$this->Siswa_model->getAllSiswa()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();

        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Siswa Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_tugas', 'Nilai Tugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai Tugas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_ulangan', 'Nilai Ulangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai Ulangan Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_uts', 'Nilai UTS', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai UTS Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('nilai_uas', 'Nilai UAS', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nilai UAS Tidak Boleh Kosong.</div>'
                    ));

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/nilai_siswa/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {
			$this->Nilai_siswa_model->ubahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Nilai Siswa berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_nilai_siswa');
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