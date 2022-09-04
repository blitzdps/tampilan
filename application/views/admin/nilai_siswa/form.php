<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Tambah Nilai Siswa</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Tambah Data Nilai Siswa

                        <div class="float-right">
                            <a href="<?= base_url('admin_nilai_siswa') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Siswa</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('Admin_nilai_siswa/tambah') ?>" method="post">

                    
                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Siswa</label>
                        <select name="id_siswa" id="id_siswa" class="form-control" required>
                        <option value ="">--Pilih Siswa--</option>
                            <?php foreach ($siswa as $sw) : ?>
                            <option value="<?php echo $sw->id_siswa?>"><?php echo $sw->nama_siswa?></option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_siswa');?> </small>
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
                                    <label>Nilai Tugas</label>
                                    <input type="number" name="nilai_tugas" id="nilai_tugas" class="form-control" placeholder="Nilai Tugas" required>
                                </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nilai Ulangan</label>
                                    <input type="number" name="nilai_ulangan" id="nilai_ulangan" class="form-control" placeholder="Nilai Ulangan" required>
                                </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nilai UTS</label>
                                    <input type="number" name="nilai_uts" id="nilai_uts" class="form-control" placeholder="Nilai UTS" required>
                                </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nilai UAS</label>
                                    <input type="number" name="nilai_uas" id="nilai_uas" class="form-control" placeholder="Nilai UAS" required>
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