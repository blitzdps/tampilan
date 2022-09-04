<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_siswa extends CI_Controller 
{
    public function __construct()
	{
    parent::__construct();

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';

		$this->load->model('Siswa_model');
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
        $data['menu'] = 'siswa';
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['siswa']=$this->Siswa_model->getAllSiswa()->result_array();
        $data['kelas']=$this->Kelas_model->getAllKelas()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/siswa/list', $data);
        $this->load->view('template/footer_admin');
	 
	}

    public function tambah()
	{
        $data['menu'] = 'siswa';
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
		

		$data['kelas']=$this->Kelas_model->getAllKelas()->result();
		$data['siswa']=$this->Siswa_model->getAllSiswa()->result_array();

        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Siswa Tidak Boleh Kosong.</div>'
                    ));
        // $this->form_validation->set_rules('nipd', 'NIPD', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIPD Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jk', 'JK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> JK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nisn', 'NISN', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NISN Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik', 'NIK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('agama', 'Agama', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Agama Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('rt', 'RT', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> RT Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('rw', 'RW', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> RW Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('dusun', 'Dusun', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Dusun Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelurahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kecamatan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Pos Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenis_tinggal', 'Jenis Tinggal', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Tinggal Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alat_transportasi', 'Alat Transportasi', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alat Transportasi Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Telepon Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('hp', 'HP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> HP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('email', 'Email', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Email Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('skhun', 'SKHUN', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> SKHUN Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penerima_kps', 'Penerima KPS', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penerima KPS Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kps', 'No KPS', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KPS Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_lahir_ayah', 'Tahun Lahir Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Lahir Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenjang_pendidikan_ayah', 'Jenjang Pendidikan Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenjang Pendidikan Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penghasilan_ayah', 'Penghasilan Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penghasilan Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_lahir_ibu', 'Tahun Lahir Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Lahir Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenjang_pendidikan_ibu', 'Jenjang Pendidikan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenjang Pendidikan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penghasilan_ibu', 'Penghasilan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penghasilan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_lahir', 'Tahun Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenjang_pendidikan_wali', 'Jenjang Pendidikan Wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenjang Pendidikan Wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_wali', 'Pekerjaan wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penghasilan_wali', 'Penghasilan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penghasilan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik_wali', 'NIK Wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_peserta_un', 'No Peserta UN', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Peserta UN Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_ijazah', 'No Ijazah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Ijazah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penerima_kip', 'Penerima KIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penerima KIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kip', 'No KIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kks', 'No KKS', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KKS Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_akta_lahir', 'No Akta Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Akta Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('bank', 'Bank', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Bank Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_rek_bank', 'No Rekening Bank', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Rekening Bank Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_rek', 'Nama Rekening', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Rekening Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('layak_pip', 'Layak PIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Layak PIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alasan_layak_pip', 'Alasan Layak PIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alasan Layak PIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kebutuhan_khusus', 'kebutuhan Khusus', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> kebutuhan Khusus Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sekolah Asal Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('anak _ke', 'Anak ke', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Anak ke Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('lintang', 'Lintang', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Lintang Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('bujur', 'Bujur', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Bujur Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Berat Badan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tinggi Badan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('lingkar_kepala', 'Lingkar Kepala', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Lingkar Kepala Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Saudara Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jarak_sekolah', 'Jarak Sekolah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jarak Sekolah Tidak Boleh Kosong.</div>'
        //             ));
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    ));
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/siswa/form', $data);
            $this->load->view('template/footer_admin');
        }  else {

            //GAMBAR
            $config['upload_path'] = './assets/img/data/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8048';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_siswa')) {
                $img_siswa  = $this->upload->data('file_name');
            } else {
                $img_siswa  = '';
            }

            $this->Siswa_model->tambahdata($data,$img_siswa);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa <strong> </strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
            redirect('admin_siswa');
        }

    }

    public function hapus()
	{
		$id_siswa = $this->input->get('id_siswa');
        $this->db->delete('tbl_siswa', array('id_siswa' => $id_siswa));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_siswa');
		
	}

    public function ubah($id)
	{

        $data['menu'] = 'siswa';
        $data['title'] = 'Data Siswa';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
        $data['img'] =  $this->db->get('tbl_siswa')->row_array();


        $data['siswa']=$this->Siswa_model->getSiswaById($id)->row_array();
        $data['kelas']=$this->Kelas_model->getAllKelas()->result();

        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Siswa Tidak Boleh Kosong.</div>'
                    ));
        // $this->form_validation->set_rules('nipd', 'NIPD', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIPD Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jk', 'JK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> JK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nisn', 'NISN', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NISN Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik', 'NIK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('agama', 'Agama', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Agama Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('rt', 'RT', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> RT Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('rw', 'RW', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> RW Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('dusun', 'Dusun', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Dusun Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelurahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kecamatan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Pos Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenis_tinggal', 'Jenis Tinggal', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Tinggal Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alat_transportasi', 'Alat Transportasi', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alat Transportasi Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Telepon Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('hp', 'HP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> HP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('email', 'Email', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Email Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('skhun', 'SKHUN', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> SKHUN Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penerima_kps', 'Penerima KPS', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penerima KPS Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kps', 'No KPS', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KPS Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_lahir_ayah', 'Tahun Lahir Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Lahir Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenjang_pendidikan_ayah', 'Jenjang Pendidikan Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenjang Pendidikan Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penghasilan_ayah', 'Penghasilan Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penghasilan Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Ayah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_lahir_ibu', 'Tahun Lahir Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Lahir Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenjang_pendidikan_ibu', 'Jenjang Pendidikan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenjang Pendidikan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penghasilan_ibu', 'Penghasilan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penghasilan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_lahir', 'Tahun Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenjang_pendidikan_wali', 'Jenjang Pendidikan Wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenjang Pendidikan Wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_wali', 'Pekerjaan wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penghasilan_wali', 'Penghasilan Ibu', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penghasilan Ibu Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nik_wali', 'NIK Wali', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Wali Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_peserta_un', 'No Peserta UN', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Peserta UN Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_ijazah', 'No Ijazah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Ijazah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('penerima_kip', 'Penerima KIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Penerima KIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kip', 'No KIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kks', 'No KKS', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KKS Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_akta_lahir', 'No Akta Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Akta Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('bank', 'Bank', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Bank Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_rek_bank', 'No Rekening Bank', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Rekening Bank Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_rek', 'Nama Rekening', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Rekening Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('layak_pip', 'Layak PIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Layak PIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alasan_layak_pip', 'Alasan Layak PIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alasan Layak PIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kebutuhan_khusus', 'kebutuhan Khusus', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> kebutuhan Khusus Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sekolah Asal Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('anak _ke', 'Anak ke', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Anak ke Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('lintang', 'Lintang', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Lintang Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('bujur', 'Bujur', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Bujur Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No KK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Berat Badan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tinggi Badan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('lingkar_kepala', 'Lingkar Kepala', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Lingkar Kepala Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Saudara Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jarak_sekolah', 'Jarak Sekolah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jarak Sekolah Tidak Boleh Kosong.</div>'
        //             ));
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kelas Tidak Boleh Kosong.</div>'
                    ));

        if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/siswa/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {
             //GAMBAR
             $config['upload_path'] = './assets/img/data/';
             $config['allowed_types'] = 'jpg|png|jpeg';
             $config['max_size']  = '8048';
             $config['remove_space'] = TRUE;
 
             $this->load->library('upload', $config);
 
             $this->db->where('id_siswa', $id);
             $g =  $this->db->get('tbl_siswa')->row_array();
 
             if ($this->upload->do_upload('img_siswa')) {
                 $img_siswa  = $this->upload->data('file_name');
                 unlink("./assets/img/gallery/" . $g['img_siswa']);
             } else {
                 $img_siswa  = $g['img_siswa'];
             }

			$this->Siswa_model->ubahdata($data,$img_siswa);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_siswa');
		}

    }


}