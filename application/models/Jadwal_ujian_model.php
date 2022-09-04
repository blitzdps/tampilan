<?php

/**
 * 
 */
class Jadwal_ujian_model extends CI_model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllJadwalUjian()
	{
		$q = $this->db->query("SELECT * FROM tbl_jadwal_ujian , tbl_pelajaran 
								WHERE tbl_jadwal_ujian.id_pelajaran = tbl_pelajaran.id_pelajaran
								ORDER BY tanggal ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_ujian') -> result_array();
		// $this->db->order_by('kode_kelas','DESC');

	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getJadwalUjianById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_jadwal_ujian , tbl_pelajaran 
								WHERE tbl_jadwal_ujian.id_pelajaran = tbl_pelajaran.id_pelajaran
								AND tbl_jadwal_ujian.id_jadwal_ujian ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_ujian' , ['id_jadwal_ujian' => $id])->row_array();
	}

	public function tambahdata($data)
	{
		
		$data = [
			"tanggal" => $this->input->post('tanggal',true),
			"id_pelajaran" => $this->input->post('id_pelajaran',true),
			"jam_mulai" => $this->input->post('jam_mulai',true),
			"jam_selesai" => $this->input->post('jam_selesai',true),
			"keterangan" => $this->input->post('keterangan',true)		
		];

		$this->db->insert('tbl_jadwal_ujian', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_ujian' , $id);
		$this->db->delete('tbl_jadwal_ujian', ['id_jadwal_ujian' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
			
			"tanggal" => $this->input->post('tanggal',true),
			"id_pelajaran" => $this->input->post('id_pelajaran',true),
			"jam_mulai" => $this->input->post('jam_mulai',true),
			"jam_selesai" => $this->input->post('jam_selesai',true),
			"keterangan" => $this->input->post('keterangan',true)
			
		];

		$this->db->where('id_jadwal_ujian', $this->input->post('id_jadwal_ujian'));
		$this->db->update('tbl_jadwal_ujian', $data);
	}
}