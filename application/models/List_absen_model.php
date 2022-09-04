<?php

/**
 * 
 */
class List_absen_model extends CI_model
{
	public $variable;


	public function __construct()
	{
		parent::__construct();
	}

	public function getAllListAbsen()
	{

		$q = $this->db->query("SELECT * FROM tbl_list_absen , tbl_kelas 
								WHERE tbl_list_absen.id_kelas = tbl_kelas.id_kelas
								ORDER BY kode_kelas ASC ");
		return $q;

	}

	public function getListAbsenById($id)
	{
		// return $this->db->get_where('tbl_kelas' , ['id_kelas' => $id])->row_array();

		// $q = $this->db->query("SELECT * FROM absen , tbl_list_absen , tbl_siswa
		// 						WHERE absen.id_kelas = tbl_list_absen.id_kelas
		// 						AND tbl_list_absen.id_kelas = tbl_siswa.id_kelas
		// 						AND absen.id_siswa = tbl_siswa.id_siswa
		// 						AND tbl_list_absen.id_list_absen ='$id' ");
		// return $q;
		$q = $this->db->query("SELECT * FROM absen , tbl_siswa
								WHERE absen.id_siswa = tbl_siswa.id_siswa
								AND absen.id ='$id' ");
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