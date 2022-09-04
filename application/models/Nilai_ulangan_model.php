<?php

/**
 * 
 */
class Nilai_ulangan_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllNilaiUlangan()
	{

		$q = $this->db->query("SELECT * FROM tbl_nilai_ulangan , tbl_ulangan , tbl_siswa 
								WHERE tbl_nilai_ulangan.id_ulangan = tbl_ulangan.id_ulangan 
								AND tbl_nilai_ulangan.id_siswa = tbl_siswa.id_siswa
								ORDER BY nama_siswa ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_pelajaran') -> result_array();
	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getNilaiUlanganById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_nilai_ulangan , tbl_ulangan  , tbl_siswa
								WHERE tbl_nilai_ulangan.id_ulangan = tbl_ulangan.id_ulangan 
								AND tbl_nilai_ulangan.id_siswa = tbl_siswa.id_siswa
								AND tbl_nilai_ulangan.id_nilai_ulangan ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_pelajaran' , ['id_jadwal_pelajaran' => $id])->row_array();
	}


	public function tambahdata($data)
	{
		
		$data = [
            "id_siswa" => $this->input->post('id_siswa',true),
			"id_ulangan" => $this->input->post('id_ulangan',true),
			"nilai_ulangan" => $this->input->post('nilai_ulangan',true)
		];

		$this->db->insert('tbl_nilai_ulangan', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_pelajaran' , $id);
		$this->db->delete('tbl_nilai_ulangan', ['id_nilai_ulangan' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
            "id_siswa" => $this->input->post('id_siswa',true),
			"id_ulangan" => $this->input->post('id_ulangan',true),
			"nilai_ulangan" => $this->input->post('nilai_ulangan',true)
		];

		$this->db->where('id_nilai_ulangan', $this->input->post('id_nilai_ulangan'));
		$this->db->update('tbl_nilai_ulangan', $data);
	}
}