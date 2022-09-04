<?php

/**
 * 
 */
class Ulangan_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllUlangan()
	{

		$q = $this->db->query("SELECT * FROM tbl_ulangan , tbl_kelas , tbl_pelajaran 
								WHERE tbl_ulangan.id_kelas = tbl_kelas.id_kelas 
								AND tbl_ulangan.id_pelajaran = tbl_pelajaran.id_pelajaran
								ORDER BY pelajaran ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_pelajaran') -> result_array();
	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getUlanganById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_ulangan , tbl_kelas , tbl_pelajaran
								WHERE tbl_ulangan.id_kelas = tbl_kelas.id_kelas 
								AND tbl_ulangan.id_pelajaran = tbl_pelajaran.id_pelajaran
								AND tbl_ulangan.id_ulangan ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_pelajaran' , ['id_jadwal_pelajaran' => $id])->row_array();
	}


	public function tambahdata($data)
	{
		
		$data = [
            "id_pelajaran" => $this->input->post('id_pelajaran',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			"nama_ulangan" => $this->input->post('nama_ulangan',true),
			"tgl" => $this->input->post('tgl',true)
		];

		$this->db->insert('tbl_ulangan', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_pelajaran' , $id);
		$this->db->delete('tbl_ulangan', ['id_ulangan' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
            "id_pelajaran" => $this->input->post('id_pelajaran',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			"nama_ulangan" => $this->input->post('nama_ulangan',true),
			"tgl" => $this->input->post('tgl',true)
		];

		$this->db->where('id_ulangan', $this->input->post('id_ulangan'));
		$this->db->update('tbl_ulangan', $data);
	}
}