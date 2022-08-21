<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Api extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Api/M_api');
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
                                $data['no_telp']  = $this->M_api->get_profile($_POST['nip'])->no_telp;
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
                    if (isset($_POST['nis']) && isset($_POST['password'])) {
                        $user_login = $this->M_api->login_siswa($_POST['nis'], $_POST['password']);
                        
                        $result['login'] = array();
                        if ($user_login -> num_rows() == 1) {                           

                            $result['value'] = "1";
                            $result['pesan'] = "sukses login";
                            
                                $data['id_siswa']  = $this->M_api->get_siswa($_POST['nis'])->id_siswa;
                                $data['nis']  = $this->M_api->get_siswa($_POST['nis'])->nis;
                                $data['nama_siswa']  = $this->M_api->get_siswa($_POST['nis'])->nama_siswa;
                                $data['alamat']  = $this->M_api->get_siswa($_POST['nis'])->alamat;
                                $data['no_telp']  = $this->M_api->get_siswa($_POST['nis'])->no_telp;
                                $data['password']  = $this->M_api->get_siswa($_POST['nis'])->password;
                                $data['kode_kelas']  = $this->M_api->get_siswa($_POST['nis'])->kode_kelas;
                            
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

    public function jadwal()
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
    
    // public function jadwal()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //         $result['data'] = array();

    //         if ($this->M_api->getJadwalSekolah()) {

    //             $result['value'] = "1";
    //             $result['pesan'] = "response ok!";
    //             // $result['data'] = $this->M_api->getUjian();
                
    //             $data['id_jadwal']  = $this->M_api->getJadwalSekolah()->id_jadwal;
    //             $data['kode_kelas']  = $this->M_api->getJadwalSekolah()->kode_kelas;
    //             $data['nama_pelajaran']  = $this->M_api->getJadwalSekolah()->nama_pelajaran;
    //             $data['nama_guru']  = $this->M_api->getJadwalSekolah()->nama_guru;
    //             $data['hari']  = $this->M_api->getJadwalSekolah()->hari == "1" ? "Senin" : "2" ? "Selasa" : "3" ? "Rabu" : "4" ? "Kamis" : "5" ? "Jumat" : "Sabtu";
    //             $data['jam_mulai']  = $this->M_api->getJadwalSekolah()->jam_mulai;
    //             $data['jam_selesai']  = $this->M_api->getJadwalSekolah()->jam_selesai;
                            
    //             array_push($result['data'],$data);
    //         }
    //     } else {
    //         $result['value'] = "0";
    //         $result['pesan'] = "invalid request method!";
    //     }
    //     echo header("Content-Type: application/json");
    //     echo json_encode($result);
    // }
    //-------------------------------------- GET UJIAN ---------------------------------------------------
    
    public function ujian()
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

    // public function editprofil_guru()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $nip = $_POST['nip'];        
    //         $nama_guru = $_POST['nama_guru'];        
    //         $alamat = $_POST['alamat'];        
    //         $no_telp = $_POST['no_telp'];        
    //         $password = $_POST['password'];

    //         if ($this->M_api->edit_guru()) {

    //             $result['status'] = "1";
    //             $result['pesan'] = "response ok!";
    //             $result['data'] = $this->M_api->getPelajaran();        
    //     }
    //     else{
    //         $result['status'] = "0";
    //         $result['pesan'] = "invalid request method!";
    //     }
    // echo header("Content-Type: application/json");
    // echo json_encode($result);        
    // }
}