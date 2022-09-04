<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Data Siswa</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data

                        <div class="float-right">
                            <a href="<?= base_url('admin_siswa') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data siswa</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <!-- <form action="" method="post"> -->

                    <?= form_open_multipart(); ?>

                    <input type="hidden" name="id_siswa" id="id_siswa" value="<?php echo $siswa['id_siswa'];?>">

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?php echo $siswa['nama_siswa'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NIPD</label>
                                    <input type="text" name="nipd" class="form-control" id="nipd" value="<?php echo $siswa['nipd'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk" >
                                    <option value="1" <?php if($siswa['jk'] == '1'){echo "selected";} ?>>Laki-laki</option>
                                    <option value="2" <?php if($siswa['jk'] == '2'){echo "selected";} ?>>Perempuan</option>
                                </select>
                                </div>
                                <small class="form-text text-danger"> <?php echo form_error('jk');?> </small>
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control" id="nisn" value="<?php echo $siswa['nisn'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $siswa['tempat_lahir'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?php echo $siswa['tgl_lahir'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" name="nik" class="form-control" id="nik" value="<?php echo $siswa['nik'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" id="agama" >
                                    <option value="1" <?php if($siswa['agama'] == '1'){echo "selected";} ?>>Islam</option>
                                    <option value="2" <?php if($siswa['agama'] == '2'){echo "selected";} ?>>Kristen</option>
                                    <option value="3" <?php if($siswa['agama'] == '3'){echo "selected";} ?>>Katolik</option>
                                    <option value="4" <?php if($siswa['agama'] == '4'){echo "selected";} ?>>Hindu</option>
                                    <option value="5" <?php if($siswa['agama'] == '5'){echo "selected";} ?>>Buddha</option>
                                    <option value="6" <?php if($siswa['agama'] == '6'){echo "selected";} ?>>Konghucu</option>
                                    </select>
                                </div>
                                    <small class="form-text text-danger"> <?php echo form_error('agama');?> </small>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $siswa['alamat'];?>" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="number" name="rt" class="form-control" id="rt" value="<?php echo $siswa['rt'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="number" name="rw" class="form-control" id="rw" value="<?php echo $siswa['rw'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <input type="text" name="dusun" class="form-control" id="dusun" value="<?php echo $siswa['dusun'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" name="dusukelurahann" class="form-control" id="kelurahan" value="<?php echo $siswa['kelurahan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="<?php echo $siswa['kecamatan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="number" name="kode_pos" class="form-control" id="kode_pos" value="<?php echo $siswa['kode_pos'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tinggal</label>
                                    <input type="text" name="jenis_tinggal" class="form-control" id="jenis_tinggal" value="<?php echo $siswa['jenis_tinggal'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Alat Transportasi</label>
                                    <input type="text" name="alat_transportasi" class="form-control" id="alat_transportasi" value="<?php echo $siswa['alat_transportasi'];?>" >
                                </div>
                                <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" name="telepon" class="form-control" id="telepon" value="<?php echo $siswa['telepon'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="number" name="hp" class="form-control" id="hp" value="<?php echo $siswa['hp'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $siswa['email'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>SKHUN</label>
                                    <input type="number" name="skhun" class="form-control" id="skhun" value="<?php echo $siswa['skhun'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Penerima KPS</label>
                                    <input type="text" name="penerima_kps" class="form-control" id="penerima_kps" value="<?php echo $siswa['penerima_kps'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>No KPS</label>
                                    <input type="number" name="no_kps" class="form-control" id="no_kps" value="<?php echo $siswa['no_kps'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="<?php echo $siswa['nama_ayah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lahir Ayah</label>
                                    <input type="number" name="tahun_lahir_ayah" class="form-control" id="tahun_lahir_ayah" value="<?php echo $siswa['tahun_lahir_ayah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan Ayah</label>
                                    <input type="text" name="jenjang_pendidikan_ayah" class="form-control" id="jenjang_pendidikan_ayah" value="<?php echo $siswa['jenjang_pendidikan_ayah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Ayah</label>
                                    <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" value="<?php echo $siswa['pekerjaan_ayah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan Ayah</label>
                                    <input type="text" name="penghasilan_ayah" class="form-control" id="penghasilan_ayah" value="<?php echo $siswa['penghasilan_ayah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NIK Ayah</label>
                                    <input type="number" name="nik_ayah" class="form-control" id="nik_ayah" value="<?php echo $siswa['nik_ayah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="<?php echo $siswa['nama_ibu'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lahir Ibu</label>
                                    <input type="number" name="tahun_lahir_ibu" class="form-control" id="tahun_lahir_ibu" value="<?php echo $siswa['tahun_lahir_ibu'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan Ibu</label>
                                    <input type="text" name="jenjang_pendidikan_ibu" class="form-control" id="jenjang_pendidikan_ibu" value="<?php echo $siswa['jenjang_pendidikan_ibu'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu" value="<?php echo $siswa['pekerjaan_ibu'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan Ibu</label>
                                    <input type="text" name="penghasilan_ibu" class="form-control" id="penghasilan_ibu" value="<?php echo $siswa['penghasilan_ibu'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>NIK Ibu</label>
                                    <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" value="<?php echo $siswa['nik_ibu'];?>" >
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>No Peserta Ujian Nasional</label>
                                    <input type="text" name="no_peserta_un" class="form-control" id="no_peserta_un" value="<?php echo $siswa['no_peserta_un'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>No Seri Ijazah</label>
                                    <input type="number" name="no_ijazah" class="form-control" id="no_ijazah" value="<?php echo $siswa['no_ijazah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Penerima KIP</label>
                                    <input type="text" name="penerima_kip" class="form-control" id="penerima_kip" value="<?php echo $siswa['penerima_kip'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nomor KIP</label>
                                    <input type="number" name="no_kip" class="form-control" id="no_kip" value="<?php echo $siswa['no_kip'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nama di KIP</label>
                                    <input type="text" name="nama_kip" class="form-control" id="nama_kip" value="<?php echo $siswa['nama_kip'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nomor KKS</label>
                                    <input type="number" name="no_kks" class="form-control" id="no_kks" value="<?php echo $siswa['no_kks'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>No Registrasi Akta Lahir</label>
                                    <input type="number" name="no_akta_lahir" class="form-control" id="no_akta_lahir" value="<?php echo $siswa['no_akta_lahir'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input type="text" name="bank" class="form-control" id="bank" value="<?php echo $siswa['bank'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rekening Bank</label>
                                    <input type="number" name="no_rek_bank" class="form-control" id="no_rek_bank" value="<?php echo $siswa['no_rek_bank'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Rekening Atas Nama</label>
                                    <input type="text" name="nama_rek" class="form-control" id="nama_rek" value="<?php echo $siswa['nama_rek'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Layak PIP (usulan dari sekolah)</label>
                                    <input type="text" name="layak_pip" class="form-control" id="layak_pip" value="<?php echo $siswa['layak_pip'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Alasan Layak PIP</label>
                                    <input type="text" name="alasan_layak_pip" class="form-control" id="alasan_layak_pip" value="<?php echo $siswa['alasan_layak_pip'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kebutuhan Khusus</label>
                                    <input type="text" name="kebutuhan_khusus" class="form-control" id="kebutuhan_khusus" value="<?php echo $siswa['kebutuhan_khusus'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Sekolah Asal</label>
                                    <input type="text" name="sekolah_asal" class="form-control" id="sekolah_asal" value="<?php echo $siswa['sekolah_asal'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Anak ke-berapa</label>
                                    <input type="number" name="anak_ke" class="form-control" id="anak_ke" value="<?php echo $siswa['anak_ke'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Lintang</label>
                                    <input type="text" name="lintang" class="form-control" id="lintang" value="<?php echo $siswa['lintang'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Bujur</label>
                                    <input type="text" name="bujur" class="form-control" id="bujur" value="<?php echo $siswa['bujur'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>No KK</label>
                                    <input type="text" name="no_kk" class="form-control" id="no_kk" value="<?php echo $siswa['no_kk'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="text" name="berat_badan" class="form-control" id="berat_badan" value="<?php echo $siswa['berat_badan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="text" name="tinggi_badan" class="form-control" id="tinggi_badan" value="<?php echo $siswa['tinggi_badan'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Lingkar Kepala</label>
                                    <input type="text" name="lingkar_kepala" class="form-control" id="lingkar_kepala" value="<?php echo $siswa['lingkar_kepala'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jml. Saudara Kandung</label>
                                    <input type="text" name="jumlah_saudara" class="form-control" id="jumlah_saudara" value="<?php echo $siswa['jumlah_saudara'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Jarak Rumah ke Sekolah (KM)</label>
                                    <input type="text" name="jarak_sekolah" class="form-control" id="jarak_sekolah" value="<?php echo $siswa['jarak_sekolah'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="id_kelas" class="form-control" >
                                        <?php foreach ($kelas as $kls) : ?>
                                        <option value="<?php echo $kls->id_kelas?>"<?php if($kls->id_kelas == $siswa['id_kelas']){echo "selected";} ?>><?php echo $kls->kode_kelas?> </option>
                                        <?php endforeach; ?>  
                                    </select>
                                </div>
                                <small class="form-text text-danger"> <?php echo form_error('id_kelas');?> </small>

                                <div class="form-group row">
                                            <div class="col-sm-3">
                                                <img src="<?php if (!empty($siswa['img_siswa'])) {
                                                                echo base_url('assets/img/data/' . $siswa['img_siswa']);
                                                            } ?>" width="100" height="85" id="preview" class="img-thumbnail mt-3">
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
                                <button type="submit" name="tambah" class="btn-block btn btn-primary">Simpan Data</button>
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