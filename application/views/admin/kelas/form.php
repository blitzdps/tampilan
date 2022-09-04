<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Tambah Kelas</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Tambah Data Kelas

                        <div class="float-right">
                            <a href="<?= base_url('admin_kelas') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Kelas</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('Admin_kelas/tambah') ?>" method="post">

                    <div class="col-md-6">
                            <div class="form-group">
                                    <label>Kode Kelas</label>
                                    <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" placeholder="Kode Kelas" required>
                                </div>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option value="">--Pilih Kelas--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('kelas');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Sub Kelas</label>
                        <select class="form-control" name="sub kelas" id="sub kelas" required>
                            <option value="">--Sub Kelas--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('kelas');?> </small>
                       </div>


                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Wali Kelas</label>
                        <select name="id_guru" id="id_guru" class="form-control" required>
                        <option value ="">--Pilih Guru--</option>
                            <?php foreach ($guru as $gr) : ?>
                            <option value="<?php echo $gr->id_guru?>"><?php echo $gr->nama_guru?></option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_guru');?> </small>
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