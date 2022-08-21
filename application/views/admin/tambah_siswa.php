<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Pendaftaran siswa Baru</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Pendaftaran

                        <div class="float-right">
                            <a href="<?= base_url('admin/daftar_siswa') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data siswa</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('admin/tambah_siswa') ?>" method="post">

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" require>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIPD</label>
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk siswa" value="<?= set_value('nis') ?>" require>
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
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk siswa" value="<?= set_value('nis') ?>" require>
                                    <small class="text-info">* Password otomatis sama dengan NIS</small><br />
                                    <?= form_error('nis', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <select class="form-control" id="kab" name="kab">
                                        <option>- Pilih provinsi dahulu -</option>
                                        <?= form_error('kab', '<small class="text-danger pl-3">', ' </small>') ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="<?= set_value('ttl') ?>">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik') ?>" require>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="jk" class="col-form-label">Agama :</label>
                                    <select class="form-control" id="jk" name="jk">
                                        <option value="">- Pilih Agama -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="RT"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="RW"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Dusun"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Kelurahan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Kecamatan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="number" class="form-control" id="alamat" name="alamat" placeholder="Kode Pos"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tinggal</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jenis Tinggal"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Alat Transportasi</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alat Transportasi"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="number" class="form-control" id="alamat" name="alamat" placeholder="Telepon"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="number" class="form-control" id="alamat" name="alamat" placeholder="No HP"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Email"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>SKHUN</label>
                                    <input type="number" class="form-control" id="alamat" name="alamat" placeholder="SKHUN"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penerima KPS</label>
                                    <input type="text" class="form-control" id="alamat" name="Penerima KPS" placeholder="Penerima KPS"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No KPS</label>
                                    <input type="number" class="form-control" id="email" name="email" placeholder="No KPS" value="<?= set_value('email') ?>" require>
                                    <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Orang Tua" value="<?= set_value('nama_ayah') ?>">
                                    <?= form_error('nama_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lahir</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Tahun Lahir"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jenjang Pendidikan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Pekerjaan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Penghasilan"><?= set_value('alamat') ?></kecamatan>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="NIK"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Orang Tua" value="<?= set_value('nama_ibu') ?>">
                                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lahir</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Tahun Lahir"><?= set_value('alamat') ?></in>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jenjang Pendidikan"><?= set_value('alamat') ?></inp>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Pekerjaan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Penghasilan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="NIK"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Rombel saat ini</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Rombel saat ini"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Peserta Ujian Nasional</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="No Peserta Ujian Nasional"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Seri Ijazah</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="No Seri Ijazah"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Penerima KIP</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Penerima KIP"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KIP</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Nomor KIP"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama di KIP</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Nama di KIP"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KKS</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Nomor KKS"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Registrasi Akta Lahir</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="No Registrasi Akta Lahir"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Bank"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rekening Bank</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Nomor Rekening Bank"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Rekening Atas Nama</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Rekening Atas Nama"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Layak PIP (usulan dari sekolah)</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Layak PIP (usulan dari sekolah)"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Alasan Layak PIP</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Alasan Layak PIP"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kebutuhan Khusus</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Kebutuhan Khusus"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Sekolah Asal</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Sekolah Asal"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Anak ke-berapa</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Anak ke-berapa"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lintang</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Lintang"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Bujur</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Bujur"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No KK</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="No KK"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Berat Badan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Tinggi Badan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lingkar Kepala</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Lingkar Kepala"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jml. Saudara Kandung</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jml. Saudara Kandung"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jarak Rumah ke Sekolah (KM)</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jarak Rumah ke Sekolah (KM)"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="pt-3 form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn-block btn btn-primary">Simpan Pendaftaran</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#prov').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_kota'); ?>',
                data: {
                    prov: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kab').html(response);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pendidikan').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_kelas'); ?>',
                data: {
                    pendidikan: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kelas').html(response);
                }
            });
        });
    });
</script>