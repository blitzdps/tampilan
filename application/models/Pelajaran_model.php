<?php

/**
 * 
 */
class Pelajaran_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllPelajaran()
	{
		$q = $this->db->query("SELECT * FROM tbl_pelajaran ORDER BY pelajaran ASC ");
		return $q;
	}

	public function getPelajaranById($id)
	{
		return $this->db->get_where('tbl_pelajaran' , ['id_pelajaran' => $id])->row_array();
	}

	public function tambahdata($data)
	{
		
		$data = [
			"pelajaran" => $this->input->post('pelajaran',true),
			"nama_pelajaran" => $this->input->post('nama_pelajaran',true)
		];

		$this->db->insert('tbl_pelajaran', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('pelajaran' , $id);
		$this->db->delete('tbl_pelajaran', ['id_pelajaran' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
			"pelajaran" => $this->input->post('pelajaran',true),
			"nama_pelajaran" => $this->input->post('nama_pelajaran',true)
		];

		$this->db->where('id_pelajaran', $this->input->post('id_pelajaran'));
		$this->db->update('tbl_pelajaran', $data);
	}
}