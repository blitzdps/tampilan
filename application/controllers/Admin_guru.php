<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Admin_guru extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Guru_model');
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
        $data['menu'] = 'guru';
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();

		$data['guru']=$this->Guru_model->getAllGuru()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin', $data);
        $this->load->view('template/topbar_admin', $data);
        $this->load->view('admin/guru/list', $data);
        $this->load->view('template/footer_admin');
	 
	}

    public function tambah()
	{
        $data['menu'] = 'guru';
        $data['title'] = 'Data Guru';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
		$data['guru']=$this->Guru_model->getAllGuru()->result_array();

        // $this->form_validation->set_rules('nama_guru', 'Nama Guru');
        // $this->form_validation->set_rules('nuptk', 'NUPTK');
        // $this->form_validation->set_rules('jk', 'JK');
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir');
        // $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir');
        // $this->form_validation->set_rules('nip', 'NIP');
        // $this->form_validation->set_rules('status_kepegawaian', 'Status Kepegawaian');
        // $this->form_validation->set_rules('jenis_ptk', 'Jenis PTK');
        // $this->form_validation->set_rules('agama', 'Agama');
        // $this->form_validation->set_rules('alamat', 'Alamat');
        // $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan');
        // $this->form_validation->set_rules('nama_pasangan', 'Nama Pasangan');
        // $this->form_validation->set_rules('pekerjaan_pasangan', 'Pekerjaan Pasangan');
        // $this->form_validation->set_rules('npwp', 'NPWP');
        // $this->form_validation->set_rules('nama_wajib_pajak', 'Nama Wajib Pajak');
        // $this->form_validation->set_rules('niy/nigk', 'NIY/NIGK');
        // $this->form_validation->set_rules('sk_pengangkatan', 'SK Pengangkatan');
        // $this->form_validation->set_rules('tmt_pengangkatan', 'TMt Pengangkatan');
        // $this->form_validation->set_rules('lembaga_pengangkat', 'Lembaga Pengangkat');
        // $this->form_validation->set_rules('kartu_pasangan', 'Kartu Pasangan');
        // $this->form_validation->set_rules('kompetensi_dimiliki', 'Kompetensi Dimiliki');
        // $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan terakhir   ');
        // $this->form_validation->set_rules('status_kuliah', 'Status Kuliah');
        // $this->form_validation->set_rules('email', 'Email');
        // $this->form_validation->set_rules('tahun_pensiun', 'Tahun Pensiun');
        // $this->form_validation->set_rules('tugas_tambahan', 'Tugas tambahan');
        // $this->form_validation->set_rules('jumlah_jam_tugas_tambahan', 'Jumlah Jam Tugas Tambahan');
        // $this->form_validation->set_rules('jumlah_jam_mengajar', 'Jumlah Jam Mengajar');
        // $this->form_validation->set_rules('jumlah_jam_mengajar_+', 'Jumlah Jam Mengajar_+');
        // $this->form_validation->set_rules('no_surat_tugas', 'No Surat Tugas');
        // $this->form_validation->set_rules('tgl_surat_tugas', 'Tanggal Surat Tugas');
        // $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran');
        // $this->form_validation->set_rules('sekolah_induk', 'Sekolah Induk');
        // $this->form_validation->set_rules('no_hp', 'No HP');
        // $this->form_validation->set_rules('password', 'Password');

        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Guru Tidak Boleh Kosong.</div>'
                    ));
        // $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NUPTK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jk', 'JK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> JK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nip', 'NIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('status_kepegawaian', 'Status Kepegawaian', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Status Kepegawaian Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenis_ptk', 'Jenis PTK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis PTK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('agama', 'Agama', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Agama Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Status Perkawinan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_pasangan', 'Nama Pasangan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Pasangan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_pasangan', 'Pekerjaan Pasangan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Pasangan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('npwp', 'NPWP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NPWP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_wajib_pajak', 'Nama Wajib Pajak', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Wajib Pajak Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('niy/nigk', 'NIY/NIGK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIY/NIGK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('sk_pengangkatan', 'SK Pengangkatan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> SK Pengangkatan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tmt_pengangkatan', 'TMT Pengangkatan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> TMT Pengangkatan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('lembaga_pengangkat', 'Lembaga Pengangkat', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Lembaga Pengangkat Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kartu_pasangan', 'Kartu Pasangan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kartu Pasangan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kompetensi_dimiliki', 'Kompetensi Dimiliki', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kompetensi Dimiliki Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pendidikan Terakhir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('status_kuliah', 'Status Kuliah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Status Kuliah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('email', 'Email', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_pensiun', 'Tahun Pensiun', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Pensiun Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tugas_tambahan', 'Tugas Tambahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tugas Tambahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tmt_tugas_tambahan', 'TMT Tugas Tambahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> TMT Tugas Tambahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_jam_tugas_tambahan', 'Jumlah Jam Tugas Tambahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Jam Tugas Tambahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_jam_mengajar', 'Jumlah Jam Mengajar', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Jam Mengajar Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_jam_mengajar_+', 'Jumlah Jam Mengajar +', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Jam Mengajar + Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_surat_tugas', 'No Surat Tugas', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Surat Tugas Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tgl_surat_tugas', 'Tanggal Surat Tugas', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Surat Tugas Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Ajaran Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('sekolah_induk', 'Sekolah Induk', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sekolah Induk Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No HP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('password', 'Password', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
        //             ));

		if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/guru/form', $data);
            $this->load->view('template/footer_admin');
        }  else {

            //GAMBAR
            $config['upload_path'] = './assets/img/data/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8048';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_guru')) {
                $img_guru  = $this->upload->data('file_name');
            } else {
                $img_guru  = '';
            }

            $this->Guru_model->tambahdata($data,$img_guru);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru <strong> </strong> berhasil ditambahkan :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
            redirect('admin_guru');
        }
    }

    public function hapus()
	{
		$id_guru = $this->input->get('id_guru');
        $this->db->delete('tbl_guru', array('id_guru' => $id_guru));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_guru');
		
	}

    public function ubah($id)
	{

        $data['menu'] = 'guru';
        $data['title'] = 'Data Guru';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] =  $this->db->get('website')->row_array();
        $data['guru']=$this->Guru_model->getGuruById($id);

        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Guru Tidak Boleh Kosong.</div>'
                    ));
        // $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NUPTK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jk', 'JK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> JK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nip', 'NIP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('status_kepegawaian', 'Status Kepegawaian', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Status Kepegawaian Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jenis_ptk', 'Jenis PTK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis PTK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('agama', 'Agama', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Agama Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Status Perkawinan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_pasangan', 'Nama Pasangan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Pasangan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pekerjaan_pasangan', 'Pekerjaan Pasangan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Pasangan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('npwp', 'NPWP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NPWP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('nama_wajib_pajak', 'Nama Wajib Pajak', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Wajib Pajak Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('niy/nigk', 'NIY/NIGK', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIY/NIGK Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('sk_pengangkatan', 'SK Pengangkatan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> SK Pengangkatan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tmt_pengangkatan', 'TMT Pengangkatan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> TMT Pengangkatan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('lembaga_pengangkat', 'Lembaga Pengangkat', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Lembaga Pengangkat Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kartu_pasangan', 'Kartu Pasangan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kartu Pasangan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('kompetensi_dimiliki', 'Kompetensi Dimiliki', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kompetensi Dimiliki Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pendidikan Terakhir Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('status_kuliah', 'Status Kuliah', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Status Kuliah Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('email', 'Email', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_pensiun', 'Tahun Pensiun', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Pensiun Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tugas_tambahan', 'Tugas Tambahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tugas Tambahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tmt_tugas_tambahan', 'TMT Tugas Tambahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> TMT Tugas Tambahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_jam_tugas_tambahan', 'Jumlah Jam Tugas Tambahan', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Jam Tugas Tambahan Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_jam_mengajar', 'Jumlah Jam Mengajar', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Jam Mengajar Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('jumlah_jam_mengajar_+', 'Jumlah Jam Mengajar +', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jumlah Jam Mengajar + Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_surat_tugas', 'No Surat Tugas', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No Surat Tugas Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tgl_surat_tugas', 'Tanggal Surat Tugas', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Surat Tugas Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tahun Ajaran Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('sekolah_induk', 'Sekolah Induk', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sekolah Induk Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> No HP Tidak Boleh Kosong.</div>'
        //             ));
        // $this->form_validation->set_rules('password', 'Password', 'required|trim',
        //         array(
        //             'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
        //             ));

        // $id_guru    = $this->input->post('id_guru');
        // $nama_guru = $this->input->post('nama_guru');
		// $nuptk = $this->input->post('nuptk');
		// $jk = $this->input->post('jk');
		// $tempat_lahir = $this->input->post('tempat_lahir');
		// $tanggal_lahir = $this->input->post('tanggal_lahir');
		// $nip = $this->input->post('nip');
		// $status_kepegawaian = $this->input->post('status_kepegawaian');
		// $jenis_ptk = $this->input->post('jenis_ptk');
		// $agama = $this->input->post('agama');
		// $alamat = $this->input->post('alamat');
		// $status_perkawinan = $this->input->post('status_perkawinan');
		// $nama_pasangan = $this->input->post('nama_pasangan');
		// $pekerjaan_pasangan = $this->input->post('pekerjaan_pasangan');
		// $npwp = $this->input->post('npwp');
		// $nama_wajib_pajak = $this->input->post('nama_wajib_pajak');
		// $niy_nigk = $this->input->post('niy_nigk');
		// $sk_pengangkatan = $this->input->post('sk_pengangkatan');
		// $tmt_pengangkatan = $this->input->post('tmt_pengangkatan');
		// $lembaga_pengangkat = $this->input->post('lembaga_pengangkat');
		// $kartu_pasangan = $this->input->post('kartu_pasangan');
		// $kompetensi_dimiliki = $this->input->post('kompetensi_dimiliki');
		// $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		// $status_kuliah = $this->input->post('status_kuliah');
		// $email = $this->input->post('email');
		// $tahun_pensiun = $this->input->post('tahun_pensiun');
		// $tugas_tambahan = $this->input->post('tugas_tambahan');
		// $jumlah_jam_tugas_tambahan = $this->input->post('jumlah_jam_tugas_tambahan');
		// $jumlah_jam_mengajar = $this->input->post('jumlah_jam_mengajar');
		// $jumlah_jam_mengajar_plus = $this->input->post('jumlah_jam_mengajar_plus');
		// $no_surat_tugas = $this->input->post('no_surat_tugas');
		// $tgl_surat_tugas = $this->input->post('tgl_surat_tugas');
		// $tahun_ajaran = $this->input->post('tahun_ajaran');
		// $sekolah_induk = $this->input->post('sekolah_induk');
		// $no_hp = $this->input->post('no_hp');
		// $password = $this->input->post('password');

        // $data = [
			
		// 	'nama_guru' => $nama_guru,
		// 	'nuptk' => $nuptk,
		// 	'jk' => $jk,
		// 	'tempat_lahir' => $tempat_lahir,
		// 	'tanggal_lahir' => $tanggal_lahir,
		// 	'nip' => $nip,
		// 	'status_kepegawaian' => $status_kepegawaian,
		// 	'jenis_ptk' => $jenis_ptk,
		// 	'agama' => $agama,
		// 	'alamat' => $alamat,
		// 	'status_perkawinan' => $status_perkawinan,
		// 	'nama_pasangan' => $nama_pasangan,
		// 	'pekerjaan_pasangan' => $pekerjaan_pasangan,
		// 	'npwp' => $npwp,
		// 	'nama_wajib_pajak' => $nama_wajib_pajak,
		// 	'niy_nigk' => $niy_nigk,
		// 	'sk_pengangkatan' => $sk_pengangkatan,
		// 	'tmt_pengangkatan' => $tmt_pengangkatan,
		// 	'lembaga_pengangkat' => $lembaga_pengangkat,
		// 	'kartu_pasangan' => $kartu_pasangan,
		// 	'kompetensi_dimiliki' => $kompetensi_dimiliki,
		// 	'pendidikan_terakhir' => $pendidikan_terakhir,
		// 	'status_kuliah' => $status_kuliah,
		// 	'email' => $email,
		// 	'tahun_pensiun' => $tahun_pensiun,
		// 	'tugas_tambahan' => $tugas_tambahan,
		// 	'jumlah_jam_tugas_tambahan' => $jumlah_jam_tugas_tambahan,
		// 	'jumlah_jam_mengajar' => $jumlah_jam_mengajar,
		// 	'jumlah_jam_mengajar_plus' => $jumlah_jam_mengajar_plus,
		// 	'no_surat_tugas' => $no_surat_tugas,
		// 	'tgl_surat_tugas' => $tgl_surat_tugas,
		// 	'tahun_ajaran' => $tahun_ajaran,
		// 	'sekolah_induk' => $sekolah_induk,
		// 	'no_hp' => $no_hp,
		// 	'password' => $password
			
		// ];
        
        if ($this->form_validation->run() == FALSE ) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('template/topbar_admin', $data);
            $this->load->view('admin/guru/ubah', $data);
            $this->load->view('template/footer_admin');	
		} else {

            //GAMBAR
            $config['upload_path'] = './assets/img/data/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8048';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            $this->db->where('id_guru', $id);
            $g =  $this->db->get('tbl_guru')->row_array();

            if ($this->upload->do_upload('img_guru')) {
                $img_guru  = $this->upload->data('file_name');
                unlink("./assets/img/gallery/" . $g['img_guru']);
            } else {
                $img_guru  = $g['img_guru'];
            }

			$this->Guru_model->ubahdata($data,$img_guru);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin_guru');
		}
	}
}