<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_api extends CI_Model {

    //-------------------------------------- LOGIN ---------------------------------------------------   

    public function proses_login($username, $password)
    {
        return $this->db->query("SELECT id_guru FROM tbl_guru WHERE nip = '$username' AND password = '$password'");
    }

    public function login_siswa($username, $password)
    {
        return $this->db->query("SELECT id_siswa FROM tbl_siswa WHERE nisn = '$username' AND password = '$password'");
    }

    public function login_ortu($username, $password_ortu)
    {
        return $this->db->query("SELECT id_ortu FROM tbl_orangtua WHERE nio = '$username' AND password_ortu = '$password_ortu'");
    }

    //-------------------------------------- CEK DATA ---------------------------------------------------   

    //-------------------------------------- DASHBOARD --------------------------------------------------- 
    
    //-------------------------------------- PROFILE --------------------------------------------------- 
    
    public function get_profile($nip)
    {
        return $this->db->query("SELECT * FROM tbl_guru WHERE nip = '$nip'")->row();
    }

    public function get_siswa($nisn)
    {
        return $this->db->query("SELECT * FROM tbl_siswa  , tbl_kelas 
                                WHERE nisn = '$nisn' 
                                AND tbl_siswa.id_kelas = tbl_kelas.id_kelas")->row();
    }
    
     public function getGuru($id = null) 
    {
        if ($id === null){
        return $this->db->get('tbl_guru')->result_array(); 
        }
        else{
        return $this->db->get_where('tbl_guru',['id_guru' => $id])->result_array(); 
        }
          
    }

    public function get_ortu($nio)
    {
        return $this->db->query("SELECT * FROM tbl_orangtua  , tbl_siswa 
                                WHERE nio = '$nio' 
                                AND tbl_orangtua.id_siswa = tbl_siswa.id_siswa")->row();
    }

    //-------------------------------------- PENGUMUMAN --------------------------------------------------- 
    
    public function getPengumuman($id = null) 
    {
        if ($id === null){
        return $this->db->get('tbl_pengumuman')->result_array(); 
        }
        else{
        return $this->db->get_where('tbl_pengumuman',['id_p' => $id])->result_array(); 
        }
          
    }

    //-------------------------------------- GET JADWAL ---------------------------------------------------
    
    public function getKelas() 
    {
        return $this->db->query("SELECT * FROM tbl_kelas,  tbl_guru
                                WHERE tbl_kelas.id_guru = tbl_guru.id_guru")->result_array();
    }
    
    public function getSiswa() 
    {
        return $this->db->query("SELECT * FROM tbl_siswa,  tbl_kelas
                                WHERE tbl_siswa.id_kelas = tbl_kelas.id_kelas")->result_array();
    }
    
    public function getJadwal() 
    {
        return $this->db->query("SELECT * FROM tbl_jadwal_pelajaran, tbl_kelas , tbl_pelajaran , tbl_guru 
                                WHERE tbl_jadwal_pelajaran.id_kelas = tbl_kelas.id_kelas
                                AND tbl_jadwal_pelajaran.id_pelajaran = tbl_pelajaran.id_pelajaran
                                AND tbl_jadwal_pelajaran.id_guru = tbl_guru.id_guru")->result_array();
    }
    
    public function getTugas() 
    {
        return $this->db->query("SELECT * FROM tbl_tugas, tbl_pelajaran , tbl_kelas
                                WHERE tbl_tugas.id_pelajaran = tbl_pelajaran.id_pelajaran AND tbl_tugas.id_kelas = tbl_kelas.id_kelas")->result_array();
    }
    
    public function getNilaiTugas() 
    {
        return $this->db->query("SELECT * FROM tbl_nilai_tugas, tbl_tugas
                                WHERE tbl_nilai_tugas.id_tugas = tbl_tugas.id_tugas ")->result_array();
    }
    
    public function getUlangan() 
    {
        return $this->db->query("SELECT * FROM tbl_ulangan, tbl_pelajaran , tbl_kelas
                                WHERE tbl_ulangan.id_pelajaran = tbl_pelajaran.id_pelajaran AND tbl_ulangan.id_kelas = tbl_kelas.id_kelas ")->result_array();
    }
    
    public function getNilaiUlangan() 
    {
        return $this->db->query("SELECT * FROM tbl_nilai_ulangan, tbl_ulangan
                                WHERE tbl_nilai_ulangan.id_ulangan = tbl_ulangan.id_ulangan ")->result_array();
    }
    
    public function getDaftarAbsen() 
    {
        return $this->db->query("SELECT * FROM daftar_absen, tbl_kelas , tbl_pelajaran
                                WHERE daftar_absen.id_kelas = tbl_kelas.id_kelas
                                AND daftar_absen.id_pelajaran = tbl_pelajaran.id_pelajaran
                                ORDER BY tgl DESC")->result_array();
    }
    
    public function getAbsen() 
    {
        return $this->db->query("SELECT * FROM daftar_absen, tbl_kelas , absen , tbl_siswa , tbl_pelajaran
                                WHERE daftar_absen.id = absen.role_absen
                                AND absen.id_siswa = tbl_siswa.id_siswa
                                AND absen.id_kelas = tbl_kelas.id_kelas
                                AND absen.id_pelajaran = tbl_pelajaran.id_pelajaran")->result_array();
    }

    // public function getJadwalSekolah() 
    // {
    //     return $this->db->query("SELECT * FROM tbl_jadwal_pelajaran, tbl_kelas , tbl_pelajaran , tbl_guru 
    //                             WHERE tbl_jadwal_pelajaran.id_kelas = tbl_kelas.id_kelas
    //                             AND tbl_jadwal_pelajaran.id_pelajaran = tbl_pelajaran.id_pelajaran
    //                             AND tbl_jadwal_pelajaran.id_guru = tbl_guru.id_guru")->row();
    // }
    
    

    //-------------------------------------- GET UJIAN ---------------------------------------------------
    
    public function getUjian() 
    {
        return $this->db->query("SELECT * FROM tbl_jadwal_ujian , tbl_pelajaran 
                                WHERE tbl_jadwal_ujian.id_pelajaran = tbl_pelajaran.id_pelajaran
                                ")->result_array();
          
    }

    //-------------------------------------- GET NILAI ---------------------------------------------------
    
    public function getNilai2($id) 
    {
        return $this->db->get_where('tbl_nilai' , ['id_siswa' => $id]) -> row();
    }

    public function getNilai() 
    {
        return $this->db->query("SELECT * FROM tbl_nilai , tbl_siswa , tbl_pelajaran  
                                WHERE tbl_nilai.id_siswa = tbl_siswa.id_siswa
                                AND tbl_nilai.id_pelajaran = tbl_pelajaran.id_pelajaran
                                ")->result_array();
    }

    public function getPelajaran($id = null) 
    {
        if ($id === null){
            return $this->db->get('tbl_pelajaran')->result_array(); 
            }
            else{
            return $this->db->get_where('tbl_pelajaran',['id_pelajaran' => $id])->result_array(); 
            }
              
    }

    //-------------------------------------- TAMBAH KELUHAN ---------------------------------------------------

    // public function edit_guru($id)
    // {
    //     return $this->db->query("SELECT id_guru FROM tbl_guru WHERE nip = '$username' AND password = '$password'");
    //     return $this->db->update("UPDATE tbl_guru SET nama_guru = '$nama_guru' ");
    // }

    //-------------------------------------- GET KELUHAN BY ID ---------------------------------------------------

    //-------------------------------------- TAMBAH KELUHAN ---------------------------------------------------

    //-------------------------------------- UBAH KELUHAN ---------------------------------------------------

    //-------------------------------------- UBAH KELUHAN ---------------------------------------------------

}