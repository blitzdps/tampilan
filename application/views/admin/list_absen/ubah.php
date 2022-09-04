<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah List Absen</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data List Absen

                        <div class="float-right">
                            <a href="<?= base_url('list_absen') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data List Absen</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="" method="post">

                    <input type="hidden" name="id_list_absen" id="id_list_absen" value="<?php echo $list_absen['id_list_absen'];?>">

                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control" >
                            <?php foreach ($kelas as $kls) : ?>
                              <option value="<?php echo $kls->id_kelas?>"<?php if($kls->id_kelas == $list_absen['id_kelas']){echo "selected";} ?>><?php echo $kls->kode_kelas?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_kelas');?> </small>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl" id="tgl" class="form-control" value="<?php echo $list_absen['tgl'];?>" >
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