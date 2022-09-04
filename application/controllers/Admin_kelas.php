<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_kelas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
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
		$data['menu'] = 'kelas';
        $data['title'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['kelas']=$this->Kelas_model->getAllKelas()->result_array();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/kelas/list', $data);
        $this->load->view('template/footer_admin');
	 
	}

	public function tambah()
	{
		$data['menu'] = 'kelas';
        $data['title'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['kelas']=$this->Kelas_model->getAllKelas()->result_array();
        $data['guru']=$this->Guru_model->getAllGuru()->result();
		// $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
		// $this->form_validation->set_rules('kelas', 'Kelas', 'required');
		// $this->form_validation->set_rules('sub_kelas', 'Sub Kelas', 'required');

		$this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('sub_kelas', 'Sub Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sub Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('id_guru', 'Nama Guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Guru Tidak Boleh Kosong.</div>'
                    )
            );

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/kelas/form', $data);
            $this->load->view('template/footer_admin');	
		} else {
			$this->Kelas_model->tambahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jadwal Kelas <strong></strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_kelas');
		}
		
	}

	public function hapus($id)
	{
		$id_kelas = $this->input->get('id_kelas');
        $this->db->delete('tbl_kelas', array('id_kelas' => $id_kelas));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kelas berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_kelas');
	}


	public function ubah($id)
	{
		$data['menu'] = 'kelas';
        $data['title'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['kelas']=$this->Kelas_model->getKelasById($id)->row_array();
        $data['guru']=$this->Guru_model->getAllGuru()->result();
		// $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
		// $this->form_validation->set_rules('kelas', 'Kelas', 'required');
		// $this->form_validation->set_rules('sub_kelas', 'Sub Kelas', 'required');

		$this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('sub_kelas', 'Sub Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sub Kelas Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('id_guru', 'Nama Guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Guru Tidak Boleh Kosong.</div>'
                    )
            );
			
		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/kelas/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {
			$this->Kelas_model->ubahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kelas berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_kelas');
		}
	}

	public function cetak()
	{
		$data['kelas']=$this->Kelas_model->getAllKelas();
		$this->load->view('kelas/cetak' ,$data);
		
	}
}