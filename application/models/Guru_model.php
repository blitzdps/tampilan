<?php

/**
 * 
 */
class Guru_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function getAllGuru()
	{
		$q = $this->db->query("SELECT * FROM tbl_guru ORDER BY nama_guru ASC ");
		return $q;
	}

	public function getGuruById($id)
	{
		return $this->db->get_where('tbl_guru' , ['id_guru' => $id])->row_array();
	}

	public function tambahdata($data,$img_guru)
	{
		$data = [
			"nama_guru" => $this->input->post('nama_guru',true),
			"nuptk" => $this->input->post('nuptk',true),
			"jk" => $this->input->post('jk',true),
			"tempat_lahir" => $this->input->post('tempat_lahir',true),
			"tanggal_lahir" => $this->input->post('tanggal_lahir',true),
			"nip" => $this->input->post('nip',true),
			"status_kepegawaian" => $this->input->post('status_kepegawaian',true),
			"jenis_ptk" => $this->input->post('jenis_ptk',true),
			"agama" => $this->input->post('agama',true),
			"alamat" => $this->input->post('alamat',true),
			"status_perkawinan" => $this->input->post('status_perkawinan',true),
			"nama_pasangan" => $this->input->post('nama_pasangan',true),
			"pekerjaan_pasangan" => $this->input->post('pekerjaan_pasangan',true),
			"npwp" => $this->input->post('npwp',true),
			"nama_wajib_pajak" => $this->input->post('nama_wajib_pajak',true),
			"niy_nigk" => $this->input->post('niy_nigk',true),
			"sk_pengangkatan" => $this->input->post('sk_pengangkatan',true),
			"tmt_pengangkatan" => $this->input->post('tmt_pengangkatan',true),
			"lembaga_pengangkat" => $this->input->post('lembaga_pengangkat',true),
			"kartu_pasangan" => $this->input->post('kartu_pasangan',true),
			"kompetensi_dimiliki" => $this->input->post('kompetensi_dimiliki',true),
			"pendidikan_terakhir" => $this->input->post('pendidikan_terakhir',true),
			"status_kuliah" => $this->input->post('status_kuliah',true),
			"email" => $this->input->post('email',true),
			"tahun_pensiun" => $this->input->post('tahun_pensiun',true),
			"tugas_tambahan" => $this->input->post('tugas_tambahan',true),
			"jumlah_jam_tugas_tambahan" => $this->input->post('jumlah_jam_tugas_tambahan',true),
			"jumlah_jam_mengajar" => $this->input->post('jumlah_jam_mengajar',true),
			"jumlah_jam_mengajar_+" => $this->input->post('jumlah_jam_mengajar_+',true),
			"no_surat_tugas" => $this->input->post('no_surat_tugas',true),
			"tgl_surat_tugas" => $this->input->post('tgl_surat_tugas',true),
			"tahun_ajaran" => $this->input->post('tahun_ajaran',true),
			"sekolah_induk" => $this->input->post('sekolah_induk',true),
			"no_hp" => $this->input->post('no_hp',true),
			"password" => $this->input->post('password',true),
			"img_guru" => $img_guru
		];
		$this->db->insert('tbl_guru', $data);
	}

	public function hapusdata($id)
	{
		$this->db->delete('tbl_guru', ['id_guru' => $id]);
	}

	public function ubahdata($data,$img_guru)
	{		
		$data = [
			"nama_guru" => $this->input->post('nama_guru',true),
			"nuptk" => $this->input->post('nuptk',true),
			"jk" => $this->input->post('jk',true),
			"tempat_lahir" => $this->input->post('tempat_lahir',true),
			"tanggal_lahir" => $this->input->post('tanggal_lahir',true),
			"nip" => $this->input->post('nip',true),
			"status_kepegawaian" => $this->input->post('status_kepegawaian',true),
			"jenis_ptk" => $this->input->post('jenis_ptk',true),
			"agama" => $this->input->post('agama',true),
			"alamat" => $this->input->post('alamat',true),
			"status_perkawinan" => $this->input->post('status_perkawinan',true),
			"nama_pasangan" => $this->input->post('nama_pasangan',true),
			"pekerjaan_pasangan" => $this->input->post('pekerjaan_pasangan',true),
			"npwp" => $this->input->post('npwp',true),
			"nama_wajib_pajak" => $this->input->post('nama_wajib_pajak',true),
			"niy_nigk" => $this->input->post('niy_nigk',true),
			"sk_pengangkatan" => $this->input->post('sk_pengangkatan',true),
			"tmt_pengangkatan" => $this->input->post('tmt_pengangkatan',true),
			"lembaga_pengangkat" => $this->input->post('lembaga_pengangkat',true),
			"kartu_pasangan" => $this->input->post('kartu_pasangan',true),
			"kompetensi_dimiliki" => $this->input->post('kompetensi_dimiliki',true),
			"pendidikan_terakhir" => $this->input->post('pendidikan_terakhir',true),
			"status_kuliah" => $this->input->post('status_kuliah',true),
			"email" => $this->input->post('email',true),
			"tahun_pensiun" => $this->input->post('tahun_pensiun',true),
			"tugas_tambahan" => $this->input->post('tugas_tambahan',true),
			"jumlah_jam_tugas_tambahan" => $this->input->post('jumlah_jam_tugas_tambahan',true),
			"jumlah_jam_mengajar" => $this->input->post('jumlah_jam_mengajar',true),
			"jumlah_jam_mengajar_+" => $this->input->post('jumlah_jam_mengajar_+',true),
			"no_surat_tugas" => $this->input->post('no_surat_tugas',true),
			"tgl_surat_tugas" => $this->input->post('tgl_surat_tugas',true),
			"tahun_ajaran" => $this->input->post('tahun_ajaran',true),
			"sekolah_induk" => $this->input->post('sekolah_induk',true),
			"no_hp" => $this->input->post('no_hp',true),
			"password" => $this->input->post('password',true),
			"img_guru" => $img_guru
		];
		$this->db->where('id_guru', $this->input->post('id_guru'));
		$this->db->update('tbl_guru', $data);
	}
}