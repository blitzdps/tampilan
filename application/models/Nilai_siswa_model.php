<?php

/**
 * 
 */
class Nilai_siswa_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllNilaiSiswa()
	{

		$q = $this->db->query("SELECT * FROM tbl_nilai_siswa , tbl_siswa , tbl_pelajaran
								WHERE tbl_nilai_siswa.id_siswa = tbl_siswa.id_siswa 
								AND tbl_nilai_siswa.id_pelajaran = tbl_pelajaran.id_pelajaran
								ORDER BY nama_pelajaran ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_pelajaran') -> result_array();
	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getNilaiSiswaById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_nilai_siswa , tbl_siswa , tbl_pelajaran
								WHERE tbl_nilai_siswa.id_siswa = tbl_siswa.id_siswa 
								AND tbl_nilai_siswa.id_pelajaran = tbl_pelajaran.id_pelajaran
								AND tbl_nilai_siswa.id_nilai_siswa ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_pelajaran' , ['id_jadwal_pelajaran' => $id])->row_array();
	}


	public function tambahdata($data)
	{
		
		$data = [
            "id_siswa" => $this->input->post('id_siswa',true),
			"id_pelajaran" => $this->input->post('id_pelajaran',true),
			"nilai_tugas" => $this->input->post('nilai_tugas',true),
			"nilai_ulangan" => $this->input->post('nilai_ulangan',true),
			"nilai_uts" => $this->input->post('nilai_uts',true),
			"nilai_uas" => $this->input->post('nilai_uas',true)
		];

		$this->db->insert('tbl_nilai_siswa', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_pelajaran' , $id);
		$this->db->delete('tbl_nilai_siswa', ['id_nilai_siswa' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
            "id_siswa" => $this->input->post('id_siswa',true),
			"id_pelajaran" => $this->input->post('id_pelajaran',true),
			"nilai_tugas" => $this->input->post('nilai_tugas',true),
			"nilai_ulangan" => $this->input->post('nilai_ulangan',true),
			"nilai_uts" => $this->input->post('nilai_uts',true),
			"nilai_uas" => $this->input->post('nilai_uas',true)
		];

		$this->db->where('id_nilai_siswa', $this->input->post('id_nilai_siswa'));
		$this->db->update('tbl_nilai_siswa', $data);
	}
}