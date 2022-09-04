<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Ulangan</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data Ulangan

                        <div class="float-right">
                            <a href="<?= base_url('admin_ulangan') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Ulangan</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="" method="post">

                    <input type="hidden" name="id_ulangan" id="id_ulangan" value="<?php echo $ulangan['id_ulangan'];?>">

                    
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Pelajaran</label>
                        <select name="id_pelajaran" class="form-control" >
                            <?php foreach ($pelajaran as $pj) : ?>
                              <option value="<?php echo $pj->id_pelajaran?>"<?php if($pj->id_pelajaran == $ulangan['id_pelajaran']){echo "selected";} ?>><?php echo $pj->nama_pelajaran?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_pelajaran');?> </small>
                        </div>

                        <div class="col-md-6">
                       <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control" >
                            <?php foreach ($kelas as $kls) : ?>
                              <option value="<?php echo $kls->id_kelas?>"<?php if($kls->id_kelas == $ulangan['id_kelas']){echo "selected";} ?>><?php echo $kls->kode_kelas?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_kelas');?> </small>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Nama Ulangan</label>
                                    <input type="text" name="nama_ulangan" class="form-control" id="nama_ulangan" value="<?php echo $ulangan['nama_ulangan'];?>" >
                                </div>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl" class="form-control" id="tgl" value="<?php echo $ulangan['tgl'];?>" >
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