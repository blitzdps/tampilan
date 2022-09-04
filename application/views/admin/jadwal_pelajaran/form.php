<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Tambah Jadwal Pelajaran</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Tambah Data Jadwal Pelajaran

                        <div class="float-right">
                            <a href="<?= base_url('admin_jadwal_pelajaran') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Jadwal Pelajaran</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('Admin_jadwal_pelajaran/tambah') ?>" method="post">

                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Hari</label>
                        <select class="form-control" name="hari" id="hari" required>
                            <option value="">--Pilih Hari--</option>
                            <option value="1">Senin</option>
                            <option value="2">Selasa</option>
                            <option value="3">Rabu</option>
                            <option value="4">Kamis</option>
                            <option value="5">Jumat</option>
                            <option value="6">Sabtu</option>
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('hari');?> </small>
                       </div>

                       <div class="col-md-6">
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
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Pelajaran</label>
                        <select name="id_pelajaran" id="id_pelajaran" class="form-control" required>
                        <option value ="">--Pilih Pelajaran--</option>
                            <?php foreach ($pelajaran as $pj) : ?>
                            <option value="<?php echo $pj->id_pelajaran?>"><?php echo $pj->nama_pelajaran?></option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_pelajaran');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Guru</label>
                        <select name="id_guru" id="id_guru" class="form-control" required>
                        <option value ="">--Pilih Guru--</option>
                            <?php foreach ($guru as $gr) : ?>
                            <option value="<?php echo $gr->id_guru?>"><?php echo $gr->nama_guru?></option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_guru');?> </small>
                       </div>


                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Jam Mulai</label>
                                    <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" placeholder="Jam Mulai" required>
                                </div>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Jam Selesai</label>
                                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" placeholder="Jam Selesai" required>
                                </div>
                       </div>

                        <div class="pt-3 form-group row">
                            <div class="col-md-12">
                                <button type="submit" name="tambah" class="btn-block btn btn-primary">Tambah Data</button>
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