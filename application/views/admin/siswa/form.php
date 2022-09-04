<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Tambah Data Siswa</h1>
            <hr />
        </div>
        
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Tambah Data

                        <div class="float-right">
                            <a href="<?= base_url('admin_siswa') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data siswa</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    

                    <?= form_open_multipart('admin_siswa/tambah'); ?>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Lengkap" value="<?= set_value('nama_siswa') ?>" require>
                                    <?= form_error('nama_siswa', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIPD</label>
                                    <input type="text" class="form-control" id="nipd" name="nipd" placeholder="NIPD" value="<?= set_value('nipd') ?>" require>
                                    <?= form_error('nis', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="jk" class="col-form-label">Jenis Kelamin :</label>
                                    <select class="form-control" id="jk" name="jk">
                                        <option value="">- Jenis Kelamin -</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" value="<?= set_value('nisn') ?>" require>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir') ?>" require>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik') ?>" require>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" id="agama">
                                        <option value="">--Agama--</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Katolik</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Buddha</option>
                                        <option value="6">Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="RT"><?= set_value('rt') ?></input>
                                    <?= form_error('rt', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="RW"><?= set_value('rw') ?></input>
                                    <?= form_error('rw', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun"><?= set_value('dusun') ?></input>
                                    <?= form_error('dusun', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan"><?= set_value('kelurahan') ?></input>
                                    <?= form_error('kelurahan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" name="Kecamatan" placeholder="Kecamatan"><?= set_value('kecamatan') ?></input>
                                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos"><?= set_value('kode_pos') ?></input>
                                    <?= form_error('kode_pos', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tinggal</label>
                                    <input type="text" class="form-control" id="jenis_tinggal" name="jenis_tinggal" placeholder="Jenis Tinggal"><?= set_value('jenis_tinggal') ?></input>
                                    <?= form_error('jenis_tinggal', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Alat Transportasi</label>
                                    <input type="text" class="form-control" id="alat_transportasi" name="alat_transportasi" placeholder="Alat Transportasi"><?= set_value('alat_transportasi') ?></input>
                                    <?= form_error('alat_transportasi', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon"><?= set_value('telepon') ?></input>
                                    <?= form_error('telepon', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="number" class="form-control" id="hp" name="hp" placeholder="No HP"><?= set_value('hp') ?></input>
                                    <?= form_error('hp', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"><?= set_value('email') ?></input>
                                    <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>SKHUN</label>
                                    <input type="number" class="form-control" id="skhun" name="skhun" placeholder="SKHUN"><?= set_value('skhun') ?></input>
                                    <?= form_error('skhun', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penerima KPS</label>
                                    <input type="text" class="form-control" id="penerima_kps" name="Penerima KPS" placeholder="Penerima KPS"><?= set_value('penerima_kps') ?></input>
                                    <?= form_error('penerima_kps', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No KPS</label>
                                    <input type="number" class="form-control" id="no_kps" name="no_kps" placeholder="No KPS" value="<?= set_value('no_kps') ?>" require>
                                    <?= form_error('no_kps', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" value="<?= set_value('nama_ayah') ?>">
                                    <?= form_error('nama_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lahir Ayah</label>
                                    <input type="text" class="form-control" id="tahun_lahir_ayah" name="tahun_lahir_ayah" placeholder="Tahun Lahir Ayah"><?= set_value('tahun_lahir_ayah') ?></input>
                                    <?= form_error('tahun_lahir_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan Ayah</label>
                                    <input type="text" class="form-control" id="jenjang_pendidikan_ayah" name="jenjang_pendidikan_ayah" placeholder="Jenjang Pendidikan Ayah"><?= set_value('jenjang_pendidikan_ayah') ?></input>
                                    <?= form_error('jenjang_pendidikan_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah"><?= set_value('pekerjaan_ayah') ?></input>
                                    <?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan Ayah</label>
                                    <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Penghasilan Ayah"><?= set_value('penghasilan_ayah') ?></input>
                                    <?= form_error('penghasilan_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIK Ayah</label>
                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK Ayah"><?= set_value('nik_ayah') ?></input>
                                    <?= form_error('nik_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                

                            </div>

                            <div class="col-md-6">

                            <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Orang Tua" value="<?= set_value('nama_ibu') ?>">
                                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lahir Ibu</label>
                                    <input type="text" class="form-control" id="tahun_lahir_ibu" name="tahun_lahir_ibu" placeholder="Tahun Lahir"><?= set_value('tahun_lahir_ibu') ?></in>
                                    <?= form_error('tahun_lahir_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan Ibu</label>
                                    <input type="text" class="form-control" id="jenjang_pendidikan_ibu" name="jenjang_pendidikan_ibu" placeholder="Jenjang Pendidikan"><?= set_value('jenjang_pendidikan_ibu') ?></inp>
                                    <?= form_error('jenjang_pendidikan_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu"><?= set_value('pekerjaan_ibu') ?></input>
                                    <?= form_error('pekerjaan_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan Ibu</label>
                                    <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Penghasilan Ibu"><?= set_value('penghasilan_ibu') ?></input>
                                    <?= form_error('penghasilan_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIK Ibu</label>
                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK Ibu"><?= set_value('nik_ibu') ?></input>
                                    <?= form_error('nik_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Peserta Ujian Nasional</label>
                                    <input type="text" class="form-control" id="no_peserta_ujian_nasional" name="no_peserta_ujian_nasional" placeholder="No Peserta Ujian Nasional"><?= set_value('no_peserta_ujian_nasional') ?></input>
                                    <?= form_error('no_peserta_ujian_nasional', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Seri Ijazah</label>
                                    <input type="text" class="form-control" id="no_seri_ijazah" name="no_seri_ijazah" placeholder="No Seri Ijazah"><?= set_value('no_seri_ijazah') ?></input>
                                    <?= form_error('no_seri_ijazah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penerima KIP</label>
                                    <input type="text" class="form-control" id="penerima_kip" name="penerima_kip" placeholder="Penerima KIP"><?= set_value('penerima_kip') ?></input>
                                    <?= form_error('penerima_kip', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KIP</label>
                                    <input type="text" class="form-control" id="no_kip" name="no_kip" placeholder="Nomor KIP"><?= set_value('no_kip') ?></input>
                                    <?= form_error('no_kip', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama di KIP</label>
                                    <input type="text" class="form-control" id="nama_kip" name="nama_kip" placeholder="Nama di KIP"><?= set_value('nama_kip') ?></input>
                                    <?= form_error('nama_kip', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KKS</label>
                                    <input type="text" class="form-control" id="no_kks" name="no_kks" placeholder="Nomor KKS"><?= set_value('no_kks') ?></input>
                                    <?= form_error('no_kks', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Registrasi Akta Lahir</label>
                                    <input type="text" class="form-control" id="no_akta_lahir" name="no_akta_lahir" placeholder="No Registrasi Akta Lahir"><?= set_value('no_akta_lahir') ?></input>
                                    <?= form_error('no_akta_lahir', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank"><?= set_value('bank') ?></input>
                                    <?= form_error('bank', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rekening Bank</label>
                                    <input type="text" class="form-control" id="no_rek_bank" name="no_rek_bank" placeholder="Nomor Rekening Bank"><?= set_value('no_rek_bank') ?></input>
                                    <?= form_error('no_rek_bank', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Rekening Atas Nama</label>
                                    <input type="text" class="form-control" id="nama_rek" name="nama_rek" placeholder="Rekening Atas Nama"><?= set_value('nama_rek') ?></input>
                                    <?= form_error('nama_rek', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Layak PIP (usulan dari sekolah)</label>
                                    <input type="text" class="form-control" id="layak_pip" name="layak_pip" placeholder="Layak PIP (usulan dari sekolah)"><?= set_value('layak_pip') ?></input>
                                    <?= form_error('layak_pip', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Alasan Layak PIP</label>
                                    <input type="text" class="form-control" id="alasan_layak_pip" name="alasan_layak_pip" placeholder="Alasan Layak PIP"><?= set_value('alasan_layak_pip') ?></input>
                                    <?= form_error('alasan_layak_pip', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kebutuhan Khusus</label>
                                    <input type="text" class="form-control" id="kebutuan_khusus" name="kebutuan_khusus" placeholder="Kebutuhan Khusus"><?= set_value('kebutuan_khusus') ?></input>
                                    <?= form_error('kebutuan_khusus', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Sekolah Asal</label>
                                    <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" placeholder="Sekolah Asal"><?= set_value('sekolah_asal') ?></input>
                                    <?= form_error('sekolah_asal', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Anak ke-berapa</label>
                                    <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak ke-berapa"><?= set_value('anak_ke') ?></input>
                                    <?= form_error('anak_ke', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lintang</label>
                                    <input type="text" class="form-control" id="lintang" name="lintang" placeholder="Lintang"><?= set_value('lintang') ?></input>
                                    <?= form_error('lintang', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Bujur</label>
                                    <input type="text" class="form-control" id="bujur" name="bujur" placeholder="Bujur"><?= set_value('bujur') ?></input>
                                    <?= form_error('bujur', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No KK</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No KK"><?= set_value('no_kk') ?></input>
                                    <?= form_error('no_kk', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="text" class="form-control" id="berat_badan" name="berat_badan" placeholder="Berat Badan"><?= set_value('berat_badan') ?></input>
                                    <?= form_error('berat_badan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan"><?= set_value('tinggi_badan') ?></input>
                                    <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lingkar Kepala</label>
                                    <input type="text" class="form-control" id="lingkar_kepala" name="lingkar_kepala" placeholder="Lingkar Kepala"><?= set_value('lingkar_kepala') ?></input>
                                    <?= form_error('lingkar_kepala', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jml. Saudara Kandung</label>
                                    <input type="text" class="form-control" id="jumlah_saudara" name="jumlah_saudara" placeholder="Jml. Saudara Kandung"><?= set_value('jumlah_saudara') ?></input>
                                    <?= form_error('jumlah_saudara', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jarak Rumah ke Sekolah (KM)</label>
                                    <input type="text" class="form-control" id="jarak_sekolah" name="jarak_sekolah" placeholder="Jarak Rumah ke Sekolah (KM)"><?= set_value('jarak_sekolah') ?></input>
                                    <?= form_error('jarak_sekolah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                <label>Kelas</label>
                                    <select name="id_kelas" id="id_kelas" class="form-control" required>
                                    <option value ="">--Pilih Kelas--</option>
                                        <?php foreach ($kelas as $kls) : ?>
                                        <option value="<?php echo $kls->id_kelas?>"><?php echo $kls->kode_kelas?></option>
                                        <?php endforeach; ?>  
                                    </select>
                                </div>
                                    <small class="form-text text-danger"> <?php echo form_error('id_kelas');?> </small>

                                    <div class="form-group row">
                                            <div class="col-sm-3">
                                                <img src="" width="100" height="85" id="preview" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input hidden type="file" name="img_siswa" class="file" accept="image/*" id="imgInp">
                                                <div class="input-group my-3">
                                                    <input type="text" class="form-control" disabled placeholder="Foto siswa" id="file">
                                                    <div class="input-group-append">
                                                        <button type="button" class="browse btn btn-primary">Browse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="pt-3 form-group row">
                            <div class="col-md-12">
                                <button type="submit" name="tambah" class="btn-block btn btn-primary">Simpan Pendaftaran</button>
                            </div>
                        </div>
                        <?php form_close() ?>
                    <!-- </form> -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>

<script type="text/javascript">
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });

    $(document).on("click", ".browse1", function() {
        var file = $(this).parents().find(".file1");
        file.trigger("click");
    });

    $(document).on("click", ".browse2", function() {
        var file = $(this).parents().find(".file2");
        file.trigger("click");
    });

    $(document).on("click", ".browse3", function() {
        var file = $(this).parents().find(".file3");
        file.trigger("click");
    });

    $('#imgInp').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#imgInp1').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file1").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview1").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#imgInp2').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file2").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview2").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#imgInp3').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file3").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview3").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>