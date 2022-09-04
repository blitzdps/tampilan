<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Api extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Api/M_api');
        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');
    }

    //-------------------------------------- LOGIN ---------------------------------------------------  

    // public function login()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         if (isset($_POST['nip']) && isset($_POST['password'])) {
                
    //             $user_login = $this->M_api->proses_login($_POST['nip'], $_POST['password']);
    //             // $data = array();
    //             // $data['login'] = array();
    //             $result['id_guru']   = null;

    //             if ($user_login->num_rows() == 1) {
    //                 $result['value'] = "1";
    //                 $result['pesan'] = "sukses login!";
    //                 $result['id_guru']   = $user_login->row()->id_guru;
    //                 // $data['nip'] = $data['nip'];
    //                 // $data['nama_guru'] = $data['nama_guru'];
    //             } else {
    //                 $result['value'] = "0";
    //                 $result['pesan'] = "username / password salah!";
    //             }
    //         } else {
    //             $result['value'] = "0";
    //             $result['pesan'] = "beberapa inputan masih kosong!";
    //         }
    //     } else {
    //         $result['value'] = "0";
    //         $result['pesan'] = "invalid request method!";
    //     }
    //     echo header("Content-Type: application/json");
    //     echo json_encode($result);
    // }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['nip']) && isset($_POST['password'])) {
                        $user_login = $this->M_api->proses_login($_POST['nip'], $_POST['password']);
                        $result['login'] = array();
                        if ($user_login -> num_rows() == 1) {                           
                            $result['value'] = "1";
                            $result['pesan'] = "sukses login";
                                $data['id_guru']  = $this->M_api->get_profile($_POST['nip'])->id_guru;
                                $data['nip']  = $this->M_api->get_profile($_POST['nip'])->nip;
                                $data['nama_guru']  = $this->M_api->get_profile($_POST['nip'])->nama_guru;
                                $data['alamat']  = $this->M_api->get_profile($_POST['nip'])->alamat;
                                $data['no_hp']  = $this->M_api->get_profile($_POST['nip'])->no_hp;
                                $data['password']  = $this->M_api->get_profile($_POST['nip'])->password;    
                                array_push($result['login'],$data);
                        }
                        else {
                                $result['value'] = "0";
                                $result['pesan'] = "username / password salah!";
                        }
                    }else{
                            $result['value'] = "0";
                            $result['pesan'] = "beberapa inputan masih kosong!";
                    }        
                }
                else{
                    $result['value'] = "0";
                    $result['pesan'] = "invalid request method!";
                }
            echo header("Content-Type: application/json");
            echo json_encode($result);
    }

    public function login_siswa()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['nisn']) && isset($_POST['password'])) {
                        $user_login = $this->M_api->login_siswa($_POST['nisn'], $_POST['password']);
                        
                        $result['login'] = array();
                        if ($user_login -> num_rows() == 1) {                           

                            $result['value'] = "1";
                            $result['pesan'] = "sukses login";
                            
                                $data['id_siswa']  = $this->M_api->get_siswa($_POST['nisn'])->id_siswa;
                                $data['nisn']  = $this->M_api->get_siswa($_POST['nisn'])->nisn;
                                $data['nama_siswa']  = $this->M_api->get_siswa($_POST['nisn'])->nama_siswa;
                                $data['alamat']  = $this->M_api->get_siswa($_POST['nisn'])->alamat;
                                $data['hp']  = $this->M_api->get_siswa($_POST['nisn'])->hp;
                                $data['password']  = $this->M_api->get_siswa($_POST['nisn'])->password;
                                $data['kode_kelas']  = $this->M_api->get_siswa($_POST['nisn'])->kode_kelas;
                            
                                array_push($result['login'],$data);
                            }
                            else {
                                    $result['value'] = "0";
                                    $result['pesan'] = "username / password salah!";
                            }
                        }else{
                                $result['value'] = "0";
                                $result['pesan'] = "beberapa inputan masih kosong!";
    
                                // echo header("Content-Type: application/json");
                                // echo json_encode($result);
                        }        
                    }
                    else{
                        $result['value'] = "0";
                        $result['pesan'] = "invalid request method!";
                    }
                echo header("Content-Type: application/json");
                echo json_encode($result);
        }

    public function login_ortu()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['nio']) && isset($_POST['password_ortu'])) {
                        $user_login = $this->M_api->login_ortu($_POST['nio'], $_POST['password_ortu']);
                        
                        $result['login'] = array();
                        if ($user_login -> num_rows() == 1) {                           

                            $result['value'] = "1";
                            $result['pesan'] = "sukses login";
                            
                                $data['id_ortu']  = $this->M_api->get_ortu($_POST['nio'])->id_ortu;
                                $data['nio']  = $this->M_api->get_ortu($_POST['nio'])->nio;
                                $data['nama_ortu']  = $this->M_api->get_ortu($_POST['nio'])->nama_ortu;
                                $data['alamat_ortu']  = $this->M_api->get_ortu($_POST['nio'])->alamat_ortu;
                                $data['telp_ortu']  = $this->M_api->get_ortu($_POST['nio'])->telp_ortu;
                                $data['password_ortu']  = $this->M_api->get_ortu($_POST['nio'])->password_ortu;
                                $data['nama_siswa']  = $this->M_api->get_ortu($_POST['nio'])->nama_siswa;
                            
                                array_push($result['login'],$data);
                            }
                            else {
                                    $result['value'] = "0";
                                    $result['pesan'] = "username / password salah!";
                            }
                        }else{
                                $result['value'] = "0";
                                $result['pesan'] = "beberapa inputan masih kosong!";
    
                                // echo header("Content-Type: application/json");
                                // echo json_encode($result);
                        }        
                    }
                    else{
                        $result['value'] = "0";
                        $result['pesan'] = "invalid request method!";
                    }
                echo header("Content-Type: application/json");
                echo json_encode($result);
        }
    //-------------------------------------- REGISTER ---------------------------------------------------  

    //-------------------------------------- DASHBOARD ---------------------------------------------------  

     //-------------------------------------- PROFILE ---------------------------------------------------

    // public function profile_guru()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $result['data'] = null;

    //         if ($this->M_api->cek_nip($_POST['nip'])->num_rows() != 0) {

    //             $result['value'] = "1";
    //             $result['pesan'] = "response ok!";
    //             $result['data'] = [
    //                 'nip'           => $this->M_api->get_profile($_POST['nip'])->nip,
    //                 'nama_guru'     => $this->M_api->get_profile($_POST['nip'])->nama_guru,
    //                 'alamat'        => $this->M_api->get_profile($_POST['nip'])->alamat,
    //                 'no_telp'       => $this->M_api->get_profile($_POST['nip'])->no_telp,
    //                 'password'      => $this->M_api->get_profile($_POST['nip'])->password
    //             ];
    //         }
    //     } else {
    //         $result['value'] = "0";
    //         $result['pesan'] = "invalid request method!";
    //     }
    //     echo header("Content-Type: application/json");
    //     echo json_encode($result);
    // }

    //-------------------------------------- GET PENGUMUMAN ---------------------------------------------------

     public function guru()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getGuru()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getGuru();
                // $result['data'] = [
                //     'id_p'   => $this->M_api->getPengumuman()->id_p,
                //     'detail'   => $this->M_api->getPengumuman()->detail,
                //     'isi'   => $this->M_api->getPengumuman()->isi
                // ];
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function pengumuman()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getPengumuman()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getPengumuman();
                // $result['data'] = [
                //     'id_p'   => $this->M_api->getPengumuman()->id_p,
                //     'detail'   => $this->M_api->getPengumuman()->detail,
                //     'isi'   => $this->M_api->getPengumuman()->isi
                // ];
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }

    //-------------------------------------- GET JADWAL ---------------------------------------------------

    public function jadwal_pelajaran()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getJadwal()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getJadwal();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function daftar_absen()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getDaftarAbsen()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getDaftarAbsen();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function absen()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getAbsen()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getAbsen();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    //-------------------------------------- GET UJIAN ---------------------------------------------------
    
    public function jadwal_ujian()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getUjian()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getUjian();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function tugas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getTugas()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getTugas();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function nilai_tugas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getNilaiTugas()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getNilaiTugas();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function ulangan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getUlangan()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getUlangan();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function nilai_ulangan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getNilaiUlangan()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getNilaiUlangan();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function nilai_siswa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getNilaiSiswa()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getNilaiSiswa();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function siswa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getSiswa()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getSiswa();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function kelas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getKelas()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getKelas();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }

    //-------------------------------------- GET NILAI ---------------------------------------------------
    
    public function nilai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getNilai()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getNilai();
                
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function nilai2()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = array();

            if ($this->M_api->getNilai2($_GET['id_siswa'])) {                           
                
                    $data['id_nilai']  = $this->M_api->getNilai2($_GET['id_siswa'])->id_nilai;
                    $data['id_siswa']  = $this->M_api->getNilai2($_GET['id_siswa'])->id_siswa;
                    $data['id_pelajaran']  = $this->M_api->getNilai2($_GET['id_siswa'])->id_pelajaran;
                    $data['nilai']  = $this->M_api->getNilai2($_GET['id_siswa'])->nilai;
                
                    array_push($result['data'],$data);
                }
            }else{
                    $result['value'] = "0";
                    $result['pesan'] = "beberapa inputan masih kosong!";

                    // echo header("Content-Type: application/json");
                    // echo json_encode($result);
            }        
    echo header("Content-Type: application/json");
    echo json_encode($result);
    }

    public function pelajaran()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result['data'] = null;

            if ($this->M_api->getPelajaran()) {

                $result['value'] = "1";
                $result['pesan'] = "response ok!";
                $result['data'] = $this->M_api->getPelajaran();
                // $result['data'] = [
                //     'id_p'   => $this->M_api->getPengumuman()->id_p,
                //     'detail'   => $this->M_api->getPengumuman()->detail,
                //     'isi'   => $this->M_api->getPengumuman()->isi
                // ];
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }
        echo header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    function ubah_siswa(){
        $data=array(
			'password' => $this->input->post('password')
        );
        $where = $this->db->where('id_siswa', $this->input->post('id_siswa'));
		$query = $this->db->update('tbl_siswa', $data);
		
		if ($query){
                     $result['pesan'] = 'Berhasil edit Siswa';
            echo header("Content-Type: application/json");
            echo json_encode($result);
                 }
                 else{
                     $result['pesan'] = 'Gagal edit siswa';
            echo header("Content-Type: application/json");
            echo json_encode($result);
                 }
    }
    
    function tambah_daftar_absen() {
        
        
        $status = 'Belum Selesai';
        $data = array(
                    'id_kelas'           => $this->input->post('id_kelas'),
                    'id_pelajaran'          => $this->input->post('id_pelajaran'),
                    'tgl'    => $this->input->post('tgl'),
                    'status'    => $status);
        $query = $this->db->insert('daftar_absen', $data , $status);
        
        $id_kam = $this->input->post('id_kelas');
        $id_pel = $this->input->post('id_pelajaran');
        $tgl = $this->input->post('tgl');
        
        $absen  =  $this->db->get_where('daftar_absen', ['id_kelas' => $id_kam, 'id_pelajaran' => $id_pel ,'tgl' => $tgl])->row_array();

                $cek_kelas = $this->db->get_where('tbl_siswa', ['id_kelas' => $id_kam])->result_array();

                foreach ($cek_kelas as $a) {
                    $data2 = [
                        'id_siswa' => $a['id_siswa'],
                        'tgl' => $tgl,
                        'waktu' => date('h:i:s'),
                        'id_kelas' => $a['id_kelas'],
                        'id_pelajaran' => $absen['id_pelajaran'],
                        'status' => 'Hadir',
                        'role_absen' => $absen['id']
                    ];
                    $this->db->insert('absen', $data2);
                }
        
        if ($query){
                     $result['pesan'] = 'Berhasil Tambah Data Daftar Absen';
            echo header("Content-Type: application/json");
            echo json_encode($result);
                 }
                 else{
                     $result['pesan'] = 'Gagal Tambah data Daftar Absen';
            echo header("Content-Type: application/json");
            echo json_encode($result);
                 }
        
    }
    
    // function tambah_daftar_absen() {
    //     $data = array(
    //                 'id_kelas'           => $this->input->post('id_kelas'),
    //                 'id_pelajaran'          => $this->input->post('id_pelajaran'),
    //                 'tgl'    => $this->input->post('tgl'),
    //                 'status'    => $this->input->post('status')
    //     $query = $this->db->insert('daftar_absen', $data);
        
    //     $absen  =  $this->db->get_where('daftar_absen', ['id_kelas' => $id_kam, 'id_pelajaran' => $id_pel ,'tgl' => $tgl])->row_array();

    //             $cek_kelas = $this->db->get_where('tbl_siswa', ['id_kelas' => $id_kam])->result_array();

    //             foreach ($cek_kelas as $a) {
    //                 $data2 = [
    //                     'id_siswa' => $a['id_siswa'],
    //                     'tgl' => $tgl,
    //                     'waktu' => date('h:i:s'),
    //                     'id_kelas' => $a['id_kelas'],
    //                     'id_pelajaran' => $absen['id_pelajaran'],
    //                     'status' => 'Hadir',
    //                     'role_absen' => $absen['id']
    //                 ];
    //                 $this->db->insert('absen', $data2);
    //             }
        
    //     if ($query){
    //                  $result['pesan'] = 'Berhasil Tambah Data Daftar Absen';
    //         echo header("Content-Type: application/json");
    //         echo json_encode($result);
    //              }
    //              else{
    //                  $result['pesan'] = 'Gagal Tambah data Daftar Absen';
    //         echo header("Content-Type: application/json");
    //         echo json_encode($result);
    //              }
        
    // }

    
}