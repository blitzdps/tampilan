<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Guru</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data Guru

                        <div class="float-right">
                            <a href="<?= base_url('admin_guru') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Guru</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>

                    <?= form_open_multipart(); ?>

                    <input type="hidden" name="id_guru" id="id_guru" value="<?php echo $guru['id_guru'];?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="<?php echo $guru['nama_guru'];?>" >
                                </div>

                                <div class="form-group">
                                    <label>NUPTK</label>
                                    <input type="text" name="nuptk" class="form-control" id="nuptk" value="<?php echo $guru['nuptk'];?>" >
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk" >
                                    <option value="1" <?php if($guru['jk'] == '1'){echo "selected";} ?>>Laki-laki</option>
                                    <option value="2" <?php if($guru['jk'] == '2'){echo "selected";} ?>>Perempuan</option>
                                </select>
                                </div>
                                <small class="form-text text-danger"> <?php echo form_error('jk');?> </small>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $guru['tempat_lahir'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?php echo $guru['tanggal_lahir'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" name="nip" class="form-control" id="nip" value="<?php echo $guru['nip'];?>" >
                                </div>

                                <div class="form-group">
                                    <label>Status Kepegawaian</label>
                                    <input type="text" name="status_kepegawaian" class="form-control" id="status_kepegawaian" value="<?php echo $guru['status_kepegawaian'];?>" >
                                </div>

                                <div class="form-group">
                                    <label>Jenis PTK</label>
                                    <input type="text" name="jenis_ptk" class="form-control" id="jenis_ptk" value="<?php echo $guru['jenis_ptk'];?>" >
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" id="agama" >
                                    <option value="1" <?php if($guru['agama'] == '1'){echo "selected";} ?>>Islam</option>
                                    <option value="2" <?php if($guru['agama'] == '2'){echo "selected";} ?>>Kristen</option>
                                    <option value="3" <?php if($guru['agama'] == '3'){echo "selected";} ?>>Katolik</option>
                                    <option value="4" <?php if($guru['agama'] == '4'){echo "selected";} ?>>Hindu</option>
                                    <option value="5" <?php if($guru['agama'] == '5'){echo "selected";} ?>>Buddha</option>
                                    <option value="6" <?php if($guru['agama'] == '6'){echo "selected";} ?>>Konghucu</option>
                                    </select>
                                </div>
                                    <small class="form-text text-danger"> <?php echo form_error('agama');?> </small>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $guru['alamat'];?>" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <input type="text" name="status_perkawinan" class="form-control" id="status_perkawinan" value="<?php echo $guru['status_perkawinan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nama Pasangan</label>
                                    <input type="text" name="nama_pasangan" class="form-control" id="nama_pasangan" value="<?php echo $guru['nama_pasangan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Pasangan</label>
                                    <input type="text" name="pekerjaan_pasangan" class="form-control" id="pekerjaan_pasangan" value="<?php echo $guru['pekerjaan_pasangan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <input type="text" name="npwp" class="form-control" id="npwp" value="<?php echo $guru['npwp'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nama Wajib Pajak</label>
                                    <input type="text" name="nama_wajib_pajak" class="form-control" id="nama_wajib_pajak" value="<?php echo $guru['nama_wajib_pajak'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NIY/NIGK</label>
                                    <input type="text" name="niy_nigk" class="form-control" id="niy_nigk" value="<?php echo $guru['niy_nigk'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>SK Pengangkatan</label>
                                    <input type="text" name="sk_pengangkatan" class="form-control" id="sk_pengangkatan" value="<?php echo $guru['sk_pengangkatan'];?>" >
                                </div>

                            </div>

                            <div class="col-md-6">

                            <div class="form-group">
                                    <label>TMT Pengangkatan</label>
                                    <input type="text" name="tmt_pengangkatan" class="form-control" id="tmt_pengangkatan" value="<?php echo $guru['tmt_pengangkatan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Lembaga Pengangkat</label>
                                    <input type="text" name="lembaga_pengangkat" class="form-control" id="lembaga_pengangkat" value="<?php echo $guru['lembaga_pengangkat'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kartu Pasangan</label>
                                    <input type="text" name="kartu_pasangan" class="form-control" id="kartu_pasangan" value="<?php echo $guru['kartu_pasangan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kompetensi Dimiliki</label>
                                    <input type="text" name="kompetensi_dimiliki" class="form-control" id="kompetensi_dimiliki" value="<?php echo $guru['kompetensi_dimiliki'];?>" >
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir" value="<?php echo $guru['pendidikan_terakhir'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Status Kuliah</label>
                                    <input type="text" name="status_kuliah" class="form-control" id="status_kuliah" value="<?php echo $guru['status_kuliah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $guru['email'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tahun Pensiun</label>
                                    <input type="text" name="tahun_pensiun" class="form-control" id="tahun_pensiun" value="<?php echo $guru['tahun_pensiun'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tugas Tambahan</label>
                                    <input type="text" name="tugas_tambahan" class="form-control" id="tugas_tambahan" value="<?php echo $guru['tugas_tambahan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>TMT Tugas Tambahan</label>
                                    <input type="text" name="tmt_tugas_tambahan" class="form-control" id="tmt_tugas_tambahan" value="<?php echo $guru['tmt_tugas_tambahan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Tugas Tambahan</label>
                                    <input type="text" name="jumlah_jam_tugas_tambahan" class="form-control" id="jumlah_jam_tugas_tambahan" value="<?php echo $guru['jumlah_jam_tugas_tambahan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Mengajar</label>
                                    <input type="text" name="jumlah_jam_mengajar" class="form-control" id="jumlah_jam_mengajar" value="<?php echo $guru['jumlah_jam_mengajar'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jam Mengajar +</label>
                                    <input type="text" name="jumlah_jam_mengajar_+" class="form-control" id="jumlah_jam_mengajar_+" value="<?php echo $guru['jumlah_jam_mengajar_+'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nomor Surat Tugas</label>
                                    <input type="text" name="no_surat_tugas" class="form-control" id="no_surat_tugas" value="<?php echo $guru['no_surat_tugas'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Tugas</label>
                                    <input type="text" name="tgl_surat_tugas" class="form-control" id="tgl_surat_tugas" value="<?php echo $guru['tgl_surat_tugas'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" value="<?php echo $guru['tahun_ajaran'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Sekolah Induk</label>
                                    <input type="text" name="sekolah_induk" class="form-control" id="sekolah_induk" value="<?php echo $guru['sekolah_induk'];?>" >
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="number" name="no_hp" class="form-control" id="no_hp" value="<?php echo $guru['no_hp'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" id="password" value="<?php echo $guru['password'];?>" >
                                </div>

                                <div class="form-group row">
                                            <div class="col-sm-3">
                                                <img src="<?php if (!empty($guru['img_guru'])) {
                                                                echo base_url('assets/img/data/' . $guru['img_guru']);
                                                            } ?>" width="100" height="85" id="preview" class="img-thumbnail mt-3">
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