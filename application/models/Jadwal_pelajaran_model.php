<?php

/**
 * 
 */
class Jadwal_pelajaran_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllJadwalPelajaran()
	{

		$q = $this->db->query("SELECT * FROM tbl_jadwal_pelajaran , tbl_kelas , tbl_pelajaran , tbl_guru 
								WHERE tbl_jadwal_pelajaran.id_kelas = tbl_kelas.id_kelas 
								AND tbl_jadwal_pelajaran.id_pelajaran = tbl_pelajaran.id_pelajaran 
								AND tbl_jadwal_pelajaran.id_guru = tbl_guru.id_guru
								ORDER BY hari ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_pelajaran') -> result_array();
	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getJadwalPelajaranById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_jadwal_pelajaran , tbl_kelas , tbl_pelajaran , tbl_guru 
								WHERE tbl_jadwal_pelajaran.id_kelas = tbl_kelas.id_kelas 
								AND tbl_jadwal_pelajaran.id_pelajaran = tbl_pelajaran.id_pelajaran 
								AND tbl_jadwal_pelajaran.id_guru = tbl_guru.id_guru
								AND tbl_jadwal_pelajaran.id_jadwal_pelajaran ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_pelajaran' , ['id_jadwal_pelajaran' => $id])->row_array();
	}


	public function tambahdata($data)
	{
		
		$data = [
			"hari" => $this->input->post('hari',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			"id_pelajaran" => $this->input->post('id_pelajaran',true),
			"id_guru" => $this->input->post('id_guru',true),
			"jam_mulai" => $this->input->post('jam_mulai',true),
			"jam_selesai" => $this->input->post('jam_selesai',true)
		];

		$this->db->insert('tbl_jadwal_pelajaran', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_pelajaran' , $id);
		$this->db->delete('tbl_jadwal_pelajaran', ['id_jadwal_pelajaran' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
			"hari" => $this->input->post('hari',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			"id_pelajaran" => $this->input->post('id_pelajaran',true),
			"id_guru" => $this->input->post('id_guru',true),
			"jam_mulai" => $this->input->post('jam_mulai',true),
			"jam_selesai" => $this->input->post('jam_selesai',true)
		];

		$this->db->where('id_jadwal_pelajaran', $this->input->post('id_jadwal_pelajaran'));
		$this->db->update('tbl_jadwal_pelajaran', $data);
	}
}