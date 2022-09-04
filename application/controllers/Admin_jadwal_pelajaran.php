<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_jadwal_pelajaran extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jadwal_pelajaran_model');
		$this->load->model('Pelajaran_model');
		$this->load->model('Kelas_model');
		$this->load->model('Guru_model');
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
		$data['menu'] = 'jadwal pelajaran';
        $data['title'] = 'Data Jadwal Pelajaran';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['jadwal_pelajaran']=$this->Jadwal_pelajaran_model->getAllJadwalPelajaran()->result_array();
		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();
		$data['guru']=$this->Guru_model->getAllGuru()->result();
		// $this->load->view('jadwal/tes');
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/jadwal_pelajaran/list', $data);
        $this->load->view('template/footer_admin');
	}

	// public function form()
	// {
	// 		$this->load->view('jadwal/form');
	// 		$this->load->view('jadwal/form2');
	// }

	public function tambah()
	{
        $data['menu'] = 'jadwal pelajaran';
        $data['title'] = 'Data Jadwal Pelajaran';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
		

		$data['jadwal_pelajaran']=$this->Jadwal_pelajaran_model->getAllJadwalPelajaran()->result_array();
		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();
		$data['guru']=$this->Guru_model->getAllGuru()->result();

        $this->form_validation->set_rules('hari', 'Hari', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Hari Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_pelajaran', 'Nama Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Pelajaran Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('id_guru', 'Nama Guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Hari Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Mulai Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Selesai Tidak Boleh Kosong.</div>'
                    ));

		// $this->form_validation->set_rules('hari', 'Hari', 'required');
		// $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		// $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required');
		// $this->form_validation->set_rules('id_guru', 'Nama Guru', 'required');
		// $this->form_validation->set_rules('jam_mulai', 'Jam mulai', 'required');
		// $this->form_validation->set_rules('jam_selesai', 'Jam selesai', 'required');


		if ($this->form_validation->run() == FALSE ) {
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/jadwal_pelajaran/form', $data);
        $this->load->view('template/footer_admin');	
		} else {
			$this->Jadwal_pelajaran_model->tambahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jadwal Pelajaran <strong></strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_jadwal_pelajaran');
		}
	}

	public function hapus()
	{
		$id_jadwal_pelajaran = $this->input->get('id_jadwal_pelajaran');
        $this->db->delete('tbl_jadwal_pelajaran', array('id_jadwal_pelajaran' => $id_jadwal_pelajaran));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jadwal Pelajaran berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_jadwal_pelajaran');
		
	}


	public function ubah($id)
	{
		$data['menu'] = 'jadwal pelajaran';
        $data['title'] = 'Data Jadwal Pelajaran';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result();
		$data['guru']=$this->Guru_model->getAllGuru()->result();
		$data['jadwal_pelajaran']=$this->Jadwal_pelajaran_model->getJadwalPelajaranById($id)->row_array();
		// $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		// $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required');
		// $this->form_validation->set_rules('id_guru', 'Nama Guru', 'required');
		// $this->form_validation->set_rules('hari', 'Hari', 'required');
		// $this->form_validation->set_rules('jam_mulai', 'Jam mulai', 'required');
		// $this->form_validation->set_rules('jam_selesai', 'Jam selesai', 'required');

        $this->form_validation->set_rules('hari', 'Hari', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Hari Tidak Boleh Kosong.</div>'
                    )
            );
		$this->form_validation->set_rules('id_kelas', 'Kode Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('id_pelajaran', 'Nama Pelajaran', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Pelajaran Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('id_guru', 'Nama Guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Guru Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Mulai Tidak Boleh Kosong.</div>'
                    )
            );
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim',
			array(
				'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jam Selesai Tidak Boleh Kosong.</div>'
				)
		);

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/jadwal_pelajaran/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {
			$this->Jadwal_pelajaran_model->ubahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jadwal Pelajaran berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_jadwal_pelajaran');
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