<?php

/**
 * 
 */
class Tugas_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllTugas()
	{

		$q = $this->db->query("SELECT * FROM tbl_tugas , tbl_kelas , tbl_pelajaran 
								WHERE tbl_tugas.id_kelas = tbl_kelas.id_kelas 
								AND tbl_tugas.id_pelajaran = tbl_pelajaran.id_pelajaran
								ORDER BY pelajaran ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_pelajaran') -> result_array();
	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getTugasById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_tugas , tbl_kelas , tbl_pelajaran
								WHERE tbl_tugas.id_kelas = tbl_kelas.id_kelas 
								AND tbl_tugas.id_pelajaran = tbl_pelajaran.id_pelajaran
								AND tbl_tugas.id_tugas ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_pelajaran' , ['id_jadwal_pelajaran' => $id])->row_array();
	}


	public function tambahdata($data)
	{
		
		$data = [
            "id_pelajaran" => $this->input->post('id_pelajaran',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			"nama_tugas" => $this->input->post('nama_tugas',true),
			"tgl" => $this->input->post('tgl',true)
		];

		$this->db->insert('tbl_tugas', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_pelajaran' , $id);
		$this->db->delete('tbl_tugas', ['id_tugas' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
            "id_pelajaran" => $this->input->post('id_pelajaran',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			"nama_tugas" => $this->input->post('nama_tugas',true),
			"tgl" => $this->input->post('tgl',true)
		];

		$this->db->where('id_tugas', $this->input->post('id_tugas'));
		$this->db->update('tbl_tugas', $data);
	}
}