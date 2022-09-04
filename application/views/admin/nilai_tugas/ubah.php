<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Nilai Tugas</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data Nilai 

                        <div class="float-right">
                            <a href="<?= base_url('admin_nilai_tugas') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Tugas</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="" method="post">

                    <input type="hidden" name="id_nilai_tugas" id="id_nilai_tugas" value="<?php echo $nilai_tugas['id_nilai_tugas'];?>">
                    
                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Siswa</label>
                        <select name="id_siswa" id="id_siswa" class="form-control" required>
                        <option value ="">--Pilih Siswa--</option>
                            <?php foreach ($siswa as $sw) : ?>
                                <option value="<?php echo $sw->id_siswa?>"<?php if($sw->id_siswa == $nilai_tugas['id_siswa']){echo "selected";} ?>><?php echo $sw->nama_siswa?> </option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_siswa');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Tugas</label>
                        <select name="id_tugas" id="id_tugas" class="form-control" required>
                          <option value ="">--Pilih Tugas--</option>
                            <?php foreach ($tugas as $tgs) : ?>
                                <option value="<?php echo $tgs->id_tugas?>"<?php if($tgs->id_tugas == $nilai_tugas['id_tugas']){echo "selected";} ?>><?php echo $tgs->nama_tugas?> </option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_tugas');?> </small>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nilai</label>
                                    <input type="number" name="nilai_tugas" class="form-control" id="nilai_tugas" value="<?php echo $nilai_tugas['nilai_tugas'];?>" >
                                </div>
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