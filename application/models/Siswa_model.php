<?php

/**
 * 
 */
class Siswa_model extends CI_model
{
	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllSiswa()
	{

		$q = $this->db->query("SELECT * FROM tbl_siswa , tbl_kelas 
								WHERE tbl_siswa.id_kelas = tbl_kelas.id_kelas ORDER BY nisn ASC ");
		return $q;
		// json_decode($q);
		// return $this->db->get('tbl_siswa') -> result_array();
		// $this->db->order_by('nis','DESC');
	}

	public function getSiswaById($id)
	{
		$q = $this->db->query("SELECT * FROM tbl_siswa,tbl_kelas
								WHERE tbl_siswa.id_kelas=tbl_kelas.id_kelas
								AND tbl_siswa.id_siswa = '$id' ");
		return $q;
		// return $this->db->get_where('tbl_siswa' , ['id_siswa' => $id])->row_array();
    }
    
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

	public function tambahdata($data,$img_siswa)
	{
		
		$data = [
			"nama_siswa" => $this->input->post('nama_siswa',true),
			"nipd" => $this->input->post('nipd',true),
			"jk" => $this->input->post('jk',true),
			"nisn" => $this->input->post('nisn',true),
			"tempat_lahir" => $this->input->post('tempat_lahir',true),
			"tgl_lahir" => $this->input->post('tgl_lahir',true),
			"nik" => $this->input->post('nik',true),
			"agama" => $this->input->post('agama',true),
			"alamat" => $this->input->post('alamat',true),
			"rt" => $this->input->post('rt',true),
			"rw" => $this->input->post('rw',true),
			"dusun" => $this->input->post('dusun',true),
			"kelurahan" => $this->input->post('kelurahan',true),
			"kecamatan" => $this->input->post('kecamatan',true),
			"kode_pos" => $this->input->post('kode_pos',true),
			"jenis_tinggal" => $this->input->post('jenis_tinggal',true),
			"alat_transportasi" => $this->input->post('alat_transportasi',true),
			"telepon" => $this->input->post('telepon',true),
			"hp" => $this->input->post('hp',true),
			"email" => $this->input->post('email',true),
			"skhun" => $this->input->post('skhun',true),
			"penerima_kps" => $this->input->post('penerima_kps',true),
			"no_kps" => $this->input->post('no_kps',true),
			"nama_ayah" => $this->input->post('nama_ayah',true),
			"tahun_lahir_ayah" => $this->input->post('tahun_lahir_ayah',true),
			"jenjang_pendidikan_ayah" => $this->input->post('jenjang_pendidikan_ayah',true),
			"pekerjaan_ayah" => $this->input->post('pekerjaan_ayah',true),
			"penghasilan_ayah" => $this->input->post('penghasilan_ayah',true),
			"nik_ayah" => $this->input->post('nik_ayah',true),
			"nama_ibu" => $this->input->post('nama_ibu',true),
			"tahun_lahir_ibu" => $this->input->post('tahun_lahir_ibu',true),
			"jenjang_pendidikan_ibu" => $this->input->post('jenjang_pendidikan_ibu',true),
			"pekerjaan_ibu" => $this->input->post('pekerjaan_ibu',true),
			"penghasilan_ibu" => $this->input->post('penghasilan_ibu',true),
			"nik_ibu" => $this->input->post('nik_ibu',true),
			"nama_wali" => $this->input->post('nama_wali',true),
			"tahun_lahir" => $this->input->post('tahun_lahir',true),
			"jenjang_pendidikan_wali" => $this->input->post('jenjang_pendidikan_wali',true),
			"pekerjaan_wali" => $this->input->post('pekerjaan_wali',true),
			"penghasilan_wali" => $this->input->post('penghasilan_wali',true),
			"nik_wali" => $this->input->post('nik_wali',true),
			"no_peserta_un" => $this->input->post('no_peserta_un',true),
			"no_ijazah" => $this->input->post('no_ijazah',true),
			"penerima_kip" => $this->input->post('penerima_kip',true),
			"no_kip" => $this->input->post('no_kip',true),
			"nama_kip" => $this->input->post('nama_kip',true),
			"no_kks" => $this->input->post('no_kks',true),
			"no_akta_lahir" => $this->input->post('no_akta_lahir',true),
			"bank" => $this->input->post('bank',true),
			"no_rek_bank" => $this->input->post('no_rek_bank',true),
			"nama_rek" => $this->input->post('nama_rek',true),
			"layak_pip" => $this->input->post('layak_pip',true),
			"alasan_layak_pip" => $this->input->post('alasan_layak_pip',true),
			"kebutuhan_khusus" => $this->input->post('kebutuhan_khusus',true),
			"sekolah_asal" => $this->input->post('sekolah_asal',true),
			"anak_ke" => $this->input->post('anak_ke',true),
			"lintang" => $this->input->post('lintang',true),
			"bujur" => $this->input->post('bujur',true),
			"no_kk" => $this->input->post('no_kk',true),
			"berat_badan" => $this->input->post('berat_badan',true),
			"tinggi_badan" => $this->input->post('tinggi_badan',true),
			"lingkar_kepala" => $this->input->post('lingkar_kepala',true),
			"jumlah_saudara" => $this->input->post('jumlah_saudara',true),
			"jarak_sekolah" => $this->input->post('jarak_sekolah',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			'img_siswa' => $img_siswa
		];

		$this->db->insert('tbl_siswa', $data);
	}

	public function hapusdata($id)
	{
		// $this->db->where('id_siswa' , $id);
		$this->db->delete('tbl_siswa', ['id_siswa' => $id]);
	}

	public function ubahdata($data,$img_siswa)
	{
		$data = [
			"nama_siswa" => $this->input->post('nama_siswa',true),
			"nipd" => $this->input->post('nipd',true),
			"jk" => $this->input->post('jk',true),
			"nisn" => $this->input->post('nisn',true),
			"tempat_lahir" => $this->input->post('tempat_lahir',true),
			"tgl_lahir" => $this->input->post('tgl_lahir',true),
			"nik" => $this->input->post('nik',true),
			"agama" => $this->input->post('agama',true),
			"alamat" => $this->input->post('alamat',true),
			"rt" => $this->input->post('rt',true),
			"rw" => $this->input->post('rw',true),
			"dusun" => $this->input->post('dusun',true),
			"kelurahan" => $this->input->post('kelurahan',true),
			"kecamatan" => $this->input->post('kecamatan',true),
			"kode_pos" => $this->input->post('kode_pos',true),
			"jenis_tinggal" => $this->input->post('jenis_tinggal',true),
			"alat_transportasi" => $this->input->post('alat_transportasi',true),
			"telepon" => $this->input->post('telepon',true),
			"hp" => $this->input->post('hp',true),
			"email" => $this->input->post('email',true),
			"skhun" => $this->input->post('skhun',true),
			"penerima_kps" => $this->input->post('penerima_kps',true),
			"no_kps" => $this->input->post('no_kps',true),
			"nama_ayah" => $this->input->post('nama_ayah',true),
			"tahun_lahir_ayah" => $this->input->post('tahun_lahir_ayah',true),
			"jenjang_pendidikan_ayah" => $this->input->post('jenjang_pendidikan_ayah',true),
			"pekerjaan_ayah" => $this->input->post('pekerjaan_ayah',true),
			"penghasilan_ayah" => $this->input->post('penghasilan_ayah',true),
			"nik_ayah" => $this->input->post('nik_ayah',true),
			"nama_ibu" => $this->input->post('nama_ibu',true),
			"tahun_lahir_ibu" => $this->input->post('tahun_lahir_ibu',true),
			"jenjang_pendidikan_ibu" => $this->input->post('jenjang_pendidikan_ibu',true),
			"pekerjaan_ibu" => $this->input->post('pekerjaan_ibu',true),
			"penghasilan_ibu" => $this->input->post('penghasilan_ibu',true),
			"nik_ibu" => $this->input->post('nik_ibu',true),
			"nama_wali" => $this->input->post('nama_wali',true),
			"tahun_lahir" => $this->input->post('tahun_lahir',true),
			"jenjang_pendidikan_wali" => $this->input->post('jenjang_pendidikan_wali',true),
			"pekerjaan_wali" => $this->input->post('pekerjaan_wali',true),
			"penghasilan_wali" => $this->input->post('penghasilan_wali',true),
			"nik_wali" => $this->input->post('nik_wali',true),
			"no_peserta_un" => $this->input->post('no_peserta_un',true),
			"no_ijazah" => $this->input->post('no_ijazah',true),
			"penerima_kip" => $this->input->post('penerima_kip',true),
			"no_kip" => $this->input->post('no_kip',true),
			"nama_kip" => $this->input->post('nama_kip',true),
			"no_kks" => $this->input->post('no_kks',true),
			"no_akta_lahir" => $this->input->post('no_akta_lahir',true),
			"bank" => $this->input->post('bank',true),
			"no_rek_bank" => $this->input->post('no_rek_bank',true),
			"nama_rek" => $this->input->post('nama_rek',true),
			"layak_pip" => $this->input->post('layak_pip',true),
			"alasan_layak_pip" => $this->input->post('alasan_layak_pip',true),
			"kebutuhan_khusus" => $this->input->post('kebutuhan_khusus',true),
			"sekolah_asal" => $this->input->post('sekolah_asal',true),
			"anak_ke" => $this->input->post('anak_ke',true),
			"lintang" => $this->input->post('lintang',true),
			"bujur" => $this->input->post('bujur',true),
			"no_kk" => $this->input->post('no_kk',true),
			"berat_badan" => $this->input->post('berat_badan',true),
			"tinggi_badan" => $this->input->post('tinggi_badan',true),
			"lingkar_kepala" => $this->input->post('lingkar_kepala',true),
			"jumlah_saudara" => $this->input->post('jumlah_saudara',true),
			"jarak_sekolah" => $this->input->post('jarak_sekolah',true),
			"id_kelas" => $this->input->post('id_kelas',true),
			'img_siswa' => $img_siswa
		];

		$this->db->where('id_siswa', $this->input->post('id_siswa'));
		$this->db->update('tbl_siswa', $data);
	}
}