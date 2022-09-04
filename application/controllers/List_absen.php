<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class List_absen extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('List_absen_model');
		$this->load->model('Absen_model');
		$this->load->model('Kelas_model');
		$this->load->model('Siswa_model');
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
        $data['menu'] = 'absen siswa';
        $data['title'] = 'Data List Absen';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['list_absen']=$this->List_absen_model->getAllListAbsen()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/list_absen/list', $data);
        $this->load->view('template/footer_admin');
	 
	}

    public function tambah()
	{
        $data['menu'] = 'absen';
        $data['title'] = 'Data List Absen';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
		$data['list_absen']=$this->List_absen_model->getAllListAbsen()->result_array();
        $data['kelas']=$this->Kelas_model->getAllKelas()->result();

        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    ));
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Tidak Boleh Kosong.</div>'
                    ));
        

		if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/list_absen/form', $data);
            $this->load->view('template/footer_admin');
        }  else {

            $kelas2 = $this->input->post('id_kelas');
            $tgl = $this->input->post('tgl');
            $absen = $this->input->post('id_list_absen');
            $cek_kelas = $this->db->get_where('tbl_siswa', ['id_kelas' => $kelas2])->result_array();

            foreach ($cek_kelas as $a) {
                $data2 = [
                    'id_siswa' => $a['id_siswa'],
                    'tgl' => $tgl,
                    'waktu' => date('h:i:s'),
                    'id_kelas' => $a['id_kelas'],
                    'status' => 'Hadir',
                    'role_absen' => '2'
                ];
                $this->db->insert('absen', $data2);
            }

            $this->List_absen_model->tambahdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data List Absen <strong> </strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
            redirect('list_absen');
        }
    }

    public function hapus()
	{
		$id_list_absen = $this->input->get('id_list_absen');
        $this->db->delete('tbl_list_absen', array('id_list_absen' => $id_list_absen));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data List Absen berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('list_absen');
		
	}

    public function ubah($id)
	{

        $data['menu'] = 'absen';
        $data['title'] = 'Data Absen';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
        // $data['absen']=$this->List_absen_model->getListAbsenById($id)->row_array();
        $data['absen']=$this->Absen_model->getAllAbsen()->result_array();
        $data['siswa']=$this->Siswa_model->getAllSiswa()->result();

        // $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Tidak Boleh Kosong.</div>'
        //             ));
        
        
        
        if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/list_absen/absen', $data);
            $this->load->view('template/footer_admin');	
		} else {

            

			$this->List_absen_model->ubahdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Absen berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('list_absen');
		}
	}
}