<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Pendaftaran Guru</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Pendaftaran

                        <div class="float-right">
                            <a href="<?= base_url('admin/daftar_guru') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Guru</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('admin/tambah_guru') ?>" method="post">

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" require>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NUPTK</label>
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="NUPTK" value="<?= set_value('nis') ?>" require>
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
                                    <label>NIP</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="NIP" value="<?= set_value('nik') ?>" require>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Status Kepegawaian</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Status Kepegawaian" value="<?= set_value('nik') ?>" require>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis PtK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Jenis PtK" value="<?= set_value('nik') ?>" require>
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
                                    <label>Status Perkawinan</label>
                                    <input type="number" class="form-control" id="alamat" name="alamat" placeholder="Status Perkawinan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pasangan</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Nama Pasangan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Pasangan</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Pekerjaan Pasangan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="NPWP"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Wajib Pajak</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Nama Wajib Pajak"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIY/NIGK</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="NIY/NIGK"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>SK Pengangkatan</label>
                                    <input type="number" class="form-control" id="alamat" name="alamat" placeholder="SK Pengangkatan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                
                                

                            </div>

                            <div class="col-md-6">

                            <div class="form-group">
                                    <label>TMT Pengangkatan</label>
                                    <input type="text" class="form-control" id="alamat" name="TMT Pengangkatan" placeholder="TMT Pengangkatan"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lembaga Pengangkatan</label>
                                    <input type="number" class="form-control" id="email" name="email" placeholder="Lembaga Pengangkatan" value="<?= set_value('email') ?>" require>
                                    <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kartu Pasangan</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Kartu Pasangan" value="<?= set_value('nama_ayah') ?>">
                                    <?= form_error('nama_ayah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kompetensi Dimiliki</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Kompetensi Dimiliki"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Pendidikan Terakhir"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Status Kuliah</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Status Kuliah"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Email"><?= set_value('alamat') ?></kecamatan>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Pensiun</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Tahun Pensiun"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tugas Tambahan</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Tugas Tambahan" value="<?= set_value('nama_ibu') ?>">
                                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>TMT Tugas Tamabahan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="TMT Tugas Tamabahan"><?= set_value('alamat') ?></in>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Tugas Tambahan</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jumlah Jam Tugas Tambahan"><?= set_value('alamat') ?></inp>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Mengajar</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jumlah Jam Mengajar"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Mengajar +</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Jumlah Jam Mengajar +"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Surat Tugas</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Nomor Surat Tugas"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Tugas</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Tanggal Surat Tugas"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Tahun Ajaran"><?= set_value('alamat') ?></input>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Sekolah Induk</label>
                                    <input type="text" class="form-control" id="alamat" name="Kecamatan" placeholder="Sekolah Induk"><?= set_value('alamat') ?></input>
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