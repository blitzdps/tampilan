<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_pelajaran extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
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

        $data['menu'] = 'pelajaran';
        $data['title'] = 'Data Pelajaran';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result_array();
		// $this->load->view('pelajaran/tes');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/kbm/pelajaran', $data);
        $this->load->view('template/footer_admin');
	 
	}

	// public function form()
	// {
	// 		$this->load->view('pelajaran/form');
	// 		$this->load->view('pelajaran/form2');
	// }

	public function tambah()
	{
		
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result_array();
		$this->form_validation->set_rules('pelajaran', 'Kode Pelajaran', 'required');
		$this->form_validation->set_rules('nama_pelajaran', 'Pelajaran', 'required');

		if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/kbm/pelajaran', $data);
            $this->load->view('template/footer_admin');
        } else {
            $pelajaran = $this->input->post('pelajaran');
            $this->db->where('pelajaran', $pelajaran);
            $cek_data =  $this->db->get('tbl_pelajaran')->row_array();

            if ($cek_data['pelajaran'] == $pelajaran) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Pelajaran <strong>' . $pelajaran . '</strong> Sudah Ada :(
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>');
                redirect('admin_pelajaran');
            }

            $data = [
                'pelajaran' => $pelajaran,
                'nama_pelajaran' => $this->input->post('nama_pelajaran')

            ];
            $this->db->insert('tbl_pelajaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pelajaran <strong>' . $pelajaran . '</strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
            redirect('admin_pelajaran');
        }
		
	}

	public function hapus()
	{
		$id_pelajaran = $this->input->get('id_pelajaran');
        $this->db->delete('tbl_pelajaran', array('id_pelajaran' => $id_pelajaran));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pelajaran berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_pelajaran');
		
	}


	public function ubah()
	{
		$id_pelajaran    = $this->input->post('id_pelajaran');
        $pelajaran  = $this->input->post('pelajaran');
        $nama_pelajaran  = $this->input->post('nama_pelajaran');

        $data = [
            'pelajaran' => $pelajaran,
            'nama_pelajaran' => $nama_pelajaran
        ];
        $this->db->where('id_pelajaran', $id_pelajaran);
        $this->db->update('tbl_pelajaran', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pelajaran <strong>' . $pelajaran . '</strong> berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_pelajaran');
	}

	public function cetak()
	{
		$data['pelajaran']=$this->Pelajaran_model->getAllPelajaran()->result_array();
		$this->load->view('pelajaran/cetak' ,$data);
		
	}
}