<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Jadwal Ujian</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data Jadwal Ujian

                        <div class="float-right">
                            <a href="<?= base_url('admin_jadwal_ujian') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Jadwal Ujian</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="" method="post">

                    <input type="hidden" name="id_jadwal_ujian" id="id_jadwal_ujian" value="<?php echo $jadwal_ujian['id_jadwal_ujian'];?>">

                    <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $jadwal_ujian['tanggal'];?>" >
                                </div>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Pelajaran</label>
                        <select name="id_pelajaran" class="form-control" >
                            <?php foreach ($pelajaran as $pj) : ?>
                              <option value="<?php echo $pj->id_pelajaran?>"<?php if($pj->id_pelajaran == $jadwal_ujian['id_pelajaran']){echo "selected";} ?>><?php echo $pj->nama_pelajaran?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_pelajaran');?> </small>
                        </div>
                
                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control" id="jam_mulai" value="<?php echo $jadwal_ujian['jam_mulai'];?>" >
                                </div>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Jam Selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control" id="jam_selesai" value="<?php echo $jadwal_ujian['jam_selesai'];?>" >
                                </div>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="keterangan" id="keterangan" >
                        <option value="UAS" <?php if($jadwal_ujian['keterangan'] == 'UAS'){echo "selected";} ?>>UAS</option>
                        <option value="UTS" <?php if($jadwal_ujian['keterangan'] == 'UTS'){echo "selected";} ?>>UTS</option>
                      </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('keterangan');?> </small>
                       </div>

                        <div class="pt-3 form-group row">
                            <div class="col-md-12">
                                <button type="submit" name="tambah" class="btn-block btn btn-primary">Ubah Data</button>
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
