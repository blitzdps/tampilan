<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Tambah Jadwal Ujian</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Tambah Data Jadwal Ujian

                        <div class="float-right">
                            <a href="<?= base_url('admin_jadwal_ujian') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Jadwal Ujian</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('Admin_jadwal_ujian/tambah') ?>" method="post">

                    <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="time" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal" required>
                                </div>
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

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="keterangan" id="keterangan" required>
                            <option value="">--Pilih Keterangan--</option>
                            <option value="UAS">UAS</option>
                            <option value="UTS">UTS</option>
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('keterangan');?> </small>
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