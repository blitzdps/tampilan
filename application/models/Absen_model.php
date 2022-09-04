<?php

/**
 * 
 */
class Absen_model extends CI_model
{
	public $variable;


	public function __construct()
	{
		parent::__construct();
	}

	public function getAllAbsen()
	{

		$q = $this->db->query("SELECT * FROM absen , tbl_siswa 
								WHERE tbl_siswa.id_siswa = 	absen.id_siswa
								ORDER BY nisn ASC ");
		return $q;

	}

	public function getListAbsenById($id)
	{
		// return $this->db->get_where('tbl_kelas' , ['id_kelas' => $id])->row_array();

		$q = $this->db->query("SELECT * FROM tbl_list_absen , tbl_kelas 
								WHERE tbl_list_absen.id_kelas = tbl_kelas.id_kelas
								AND tbl_list_absen.id_list_absen ='$id' ");
		return $q;
	}

	public function tambahdata($data)
	{
		
		$data = [
			"id_kelas"	=> $this->input->post('id_kelas',true),
			"tgl"			=> $this->input->post('tgl',true),
			"status"			=> 'Belum Selesai'
		];

		$this->db->insert('tbl_list_absen', $data);
	}

	public function hapusdata($id)
	{
		$this->db->delete('tbl_list_absen', ['id_list_absen' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
			"id_kelas"	=> $this->input->post('id_kelas',true),
			"tgl"			=> $this->input->post('tgl',true),
			"status"			=> $this->input->post('status',true),
		];

		$this->db->where('id_list_absen', $this->input->post('id_list_absen'));
		$this->db->update('tbl_list_absen', $data);
	}
}