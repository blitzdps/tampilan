<?php

/**
 * 
 */
class Nilai_tugas_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllNilaiTugas()
	{

		$q = $this->db->query("SELECT * FROM tbl_nilai_tugas , tbl_tugas , tbl_siswa 
								WHERE tbl_nilai_tugas.id_tugas = tbl_tugas.id_tugas 
								AND tbl_nilai_tugas.id_siswa = tbl_siswa.id_siswa
								ORDER BY nama_siswa ASC ");
		return $q;
		// return $this->db->get('tbl_jadwal_pelajaran') -> result_array();
	}

	public function tampil_data($table)
    {
        return $this->db->get($table);
	}

	public function getNilaiTugasById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_nilai_tugas , tbl_tugas  , tbl_siswa
								WHERE tbl_nilai_tugas.id_tugas = tbl_tugas.id_tugas 
								AND tbl_nilai_tugas.id_siswa = tbl_siswa.id_siswa
								AND tbl_nilai_tugas.id_nilai_tugas ='$id' ");
		return $q;
		// return $this->db->get_where('tbl_jadwal_pelajaran' , ['id_jadwal_pelajaran' => $id])->row_array();
	}


	public function tambahdata($data)
	{
		
		$data = [
            "id_siswa" => $this->input->post('id_siswa',true),
			"id_tugas" => $this->input->post('id_tugas',true),
			"nilai_tugas" => $this->input->post('nilai_tugas',true)
		];

		$this->db->insert('tbl_nilai_tugas', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_jadwal_pelajaran' , $id);
		$this->db->delete('tbl_nilai_tugas', ['id_nilai_tugas' => $id]);
	}

	public function ubahdata($data)
	{
		
		$data = [
            "id_siswa" => $this->input->post('id_siswa',true),
			"id_tugas" => $this->input->post('id_tugas',true),
			"nilai_ulangan" => $this->input->post('nilai_ulangan',true)
		];

		$this->db->where('id_nilai_tugas', $this->input->post('id_nilai_tugas'));
		$this->db->update('tbl_nilai_tugas', $data);
	}
}