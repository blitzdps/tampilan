<?php

/**
 * 
 */
class Kelas_model extends CI_model
{
	public $variable;


	public function __construct()
	{
		parent::__construct();
	}

	public function getAllKelas()
	{
		// $q = $this->db->query("SELECT * FROM tbl_kelas ORDER BY kode_kelas ASC ");
		// return $q;
		// return $this->db->get('tbl_kelas');
		// return $this->db->order_by('kode_kelas','DESC');
// return $this->db->get('tbl_kelas') -> result_array();
		
		// $this->db->order_by('kode_kelas','DESC');

		$q = $this->db->query("SELECT * FROM tbl_kelas , tbl_guru 
								WHERE tbl_kelas.id_guru = tbl_guru.id_guru
								ORDER BY kode_kelas ASC ");
		return $q;

	}

	public function getKelasById($id)
	{
		// return $this->db->get_where('tbl_kelas' , ['id_kelas' => $id])->row_array();

		$q = $this->db->query("SELECT * FROM tbl_kelas , tbl_guru 
								WHERE tbl_kelas.id_guru = tbl_guru.id_guru
								AND tbl_kelas.id_kelas ='$id' ");
		return $q;
	}

	public function tambahdata($data)
	{
		
		$data = [
			"kode_kelas"	=> $this->input->post('kode_kelas',true),
			"kelas"			=> $this->input->post('kelas',true),
			"sub_kelas"		=> $this->input->post('sub_kelas',true),
			"id_guru"		=> $this->input->post('id_guru',true)
		];

		$this->db->insert('tbl_kelas', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('kode_kelas' , $id);
		$this->db->delete('tbl_kelas', ['id_kelas' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
			"kode_kelas"	=> $this->input->post('kode_kelas',true),
			"kelas" 		=> $this->input->post('kelas',true),
			"sub_kelas" 	=> $this->input->post('sub_kelas',true),
			"id_guru"		=> $this->input->post('id_guru',true)
		];

		$this->db->where('id_kelas', $this->input->post('id_kelas'));
		$this->db->update('tbl_kelas', $data);
	}
}