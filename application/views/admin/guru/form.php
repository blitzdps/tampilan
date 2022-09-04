<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Tambah Guru</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Tambah Data Guru

                        <div class="float-right">
                            <a href="<?= base_url('admin_guru') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Guru</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <?= form_open_multipart('admin_guru/tambah'); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama Lengkap">
                                    <?= form_error('nama_guru', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NUPTK</label>
                                    <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="NUPTK" value="<?= set_value('nuptk') ?>">
                                    <?= form_error('nuptk', '<small class="text-danger pl-3">', ' </small>') ?>
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
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip') ?>">
                                    <?= form_error('nip', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Status Kepegawaian</label>
                                    <input type="number" class="form-control" id="status_kepegawaian" name="status_kepegawaian" placeholder="Status Kepegawaian" value="<?= set_value('status_kepegawaian') ?>">
                                    <?= form_error('status_kepegawaian', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis PTK</label>
                                    <input type="number" class="form-control" id="jenis_ptk" name="jenis_ptk" placeholder="Jenis PTK" value="<?= set_value('jenis_ptk') ?>">
                                    <?= form_error('jenis_ptk', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="agama" class="col-form-label">Agama :</label>
                                    <select class="form-control" id="agama" name="agama">
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
                                    <input type="number" class="form-control" id="status_perkawinan" name="status_perkawinan" placeholder="Status Perkawinan"><?= set_value('status_perkawinan') ?></input>
                                    <?= form_error('status_perkawinan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pasangan</label>
                                    <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder="Nama Pasangan"><?= set_value('nam_pasangan') ?></input>
                                    <?= form_error('nam_pasangan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Pasangan</label>
                                    <input type="text" class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan" placeholder="Pekerjaan Pasangan"><?= set_value('pekerjaan_pasangan') ?></input>
                                    <?= form_error('pekerjaan_pasangan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP"><?= set_value('npwp') ?></input>
                                    <?= form_error('npwp', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Wajib Pajak</label>
                                    <input type="text" class="form-control" id="nama_wajib_pajak" name="nama_wajib_pajak" placeholder="Nama Wajib Pajak"><?= set_value('nama_wajib_pajak') ?></input>
                                    <?= form_error('nama_wajib_pajak', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIY/NIGK</label>
                                    <input type="text" class="form-control" id="niy_nigk" name="niy_nigk" placeholder="NIY/NIGK"><?= set_value('niy_nigk') ?></input>
                                    <?= form_error('niy_nigk', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>SK Pengangkatan</label>
                                    <input type="number" class="form-control" id="sk_pengangkatan" name="sk_pengangkatan" placeholder="SK Pengangkatan"><?= set_value('sk_pengangkatan') ?></input>
                                    <?= form_error('sk_pengangkatan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                
                                

                            </div>

                            <div class="col-md-6">

                            <div class="form-group">
                                    <label>TMT Pengangkatan</label>
                                    <input type="text" class="form-control" id="tmt_pengangkatan" name="TMT Pengangkatan" placeholder="TMT Pengangkatan"><?= set_value('tmt_pengangkatan') ?></input>
                                    <?= form_error('tmt_pengangkatan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Lembaga Pengangkatan</label>
                                    <input type="number" class="form-control" id="lembaga_pengangkat" name="lembaga_pengangkat" placeholder="Lembaga Pengangkatan" value="<?= set_value('lembaga_pengangkat') ?>">
                                    <?= form_error('lembaga_pengangkat', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kartu Pasangan</label>
                                    <input type="text" class="form-control" id="kartu_pasangan" name="kartu_pasangan" placeholder="Kartu Pasangan" value="<?= set_value('kartu_pasangan') ?>">
                                    <?= form_error('kartu_pasangan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Kompetensi Dimiliki</label>
                                    <input type="text" class="form-control" id="kompetensi_dimiliki" name="kompetensi_dimiliki" placeholder="Kompetensi Dimiliki"><?= set_value('kompetensi_dimiliki') ?></input>
                                    <?= form_error('kompetensi_dimiliki', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" placeholder="Pendidikan Terakhir"><?= set_value('pendidikan_terakhir') ?></input>
                                    <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Status Kuliah</label>
                                    <input type="text" class="form-control" id="status_kuliah" name="status_kuliah" placeholder="Status Kuliah"><?= set_value('status_kuliah') ?></input>
                                    <?= form_error('status_kuliah', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"><?= set_value('email') ?></input>
                                    <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Pensiun</label>
                                    <input type="text" class="form-control" id="tahun_pensiun" name="tahun_pensiun" placeholder="Tahun Pensiun"><?= set_value('tahun_pensiun') ?></input>
                                    <?= form_error('tahun_pensiun', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tugas Tambahan</label>
                                    <input type="text" class="form-control" id="tugas_tambahan" name="tugas_tambahan" placeholder="Tugas Tambahan" value="<?= set_value('tugas_tambahan') ?>">
                                    <?= form_error('tugas_tambahan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>TMT Tugas Tamabahan</label>
                                    <input type="text" class="form-control" id="tmt_tugas_tambahan" name="tmt_tugas_tambahan" placeholder="TMT Tugas Tamabahan"><?= set_value('tmt_tugas_tambahan') ?></input>
                                    <?= form_error('tmt_tugas_tambahan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Tugas Tambahan</label>
                                    <input type="text" class="form-control" id="jumlah_jam_tugas_tambahan" name="jumlah_jam_tugas_tambahan" placeholder="Jumlah Jam Tugas Tambahan"><?= set_value('jumlah_jam_tugas_tambahan') ?></input>
                                    <?= form_error('jumlah_jam_tugas_tambahan', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Mengajar</label>
                                    <input type="text" class="form-control" id="jumlah_jam_mengajar" name="jumlah_jam_mengajar" placeholder="Jumlah Jam Mengajar"><?= set_value('jumlah_jam_mengajar') ?></input>
                                    <?= form_error('jumlah_jam_mengajar', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Mengajar +</label>
                                    <input type="text" class="form-control" id="jumlah_jam_mengajar_+" name="jumlah_jam_mengajar_+" placeholder="Jumlah Jam Mengajar +"><?= set_value('jumlah_jam_mengajar_+') ?></input>
                                    <?= form_error('jumlah_jam_mengajar_+', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Surat Tugas</label>
                                    <input type="text" class="form-control" id="nomor_surat_tugas" name="nomor_surat_tugas" placeholder="Nomor Surat Tugas"><?= set_value('nomor_surat_tugas') ?></input>
                                    <?= form_error('nomor_surat_tugas', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Tugas</label>
                                    <input type="text" class="form-control" id="tanggal_surat_tugas" name="tanggal_surat_tugas" placeholder="Tanggal Surat Tugas"><?= set_value('tanggal_surat_tugas') ?></input>
                                    <?= form_error('tanggal_surat_tugas', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran"><?= set_value('tahun_ajaran') ?></input>
                                    <?= form_error('tahun_ajaran', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Sekolah Induk</label>
                                    <input type="text" class="form-control" id="sekolah_induk" name="sekolah_induk" placeholder="Sekolah Induk"><?= set_value('sekolah_induk') ?></input>
                                    <?= form_error('sekolah_induk', '<small class="text-danger pl-3">', ' </small>') ?>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <textarea type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP"><?= set_value('no_hp') ?></textarea>
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <textarea type="text" class="form-control" id="password" name="password" placeholder="Password"><?= set_value('password') ?></textarea>
                                    <?= form_error('password', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>

                                <div class="form-group row">
                                            <div class="col-sm-3">
                                                <img src="" width="100" height="85" id="preview" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input hidden type="file" name="img_guru" class="file" accept="image/*" id="imgInp">
                                                <div class="input-group my-3">
                                                    <input type="text" class="form-control" disabled placeholder="Foto guru" id="file">
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

                        </div>
                        <div class="pt-3 form-group row">
                            <div class="col-md-12">
                                <button type="submit" name="tambah" class="btn-block btn btn-primary">Simpan Data</button>
                            </div>
                        </div>

                        <?php form_close() ?>
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