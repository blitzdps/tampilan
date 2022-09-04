<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="mb-5 header-title"><i class="fas fa-list"></i> <?= $title ?>
                        <div class="float-right mr-1">
                            <a href="" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#exportData"><i class="fa fa-file-export"></i> Export</a>
                        </div>
                        <div class="float-right pr-1">
                            <a href="" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#importData"><i class="fa fa-file-import"></i> Import</a>
                        </div>
                    </h4>
                    <?= $this->session->flashdata('message') ?>
                    <form style="margin: 20px 0;" action="<?= base_url() . 'admin_siswa/tambah'; ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <a href="<?= base_url('admin_siswa/tambah'); ?>" class="btn btn-block btn-info"><i class="fa fa-plus-circle"></i> Tambah Data siswa</a>
                            </div>
                    </form>
                </div>


                <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($siswa as $d) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td width="200"><?= $d['nama_siswa'] ?></td>
                                    <td width="100"><?= $d['nisn'] ?></td>
                                    <td width="300"><?= $d['alamat'] ?></td>
                                    <td width="300"><?= $d['tgl_lahir'] ?></td>
                                    <td width="300"><?= $d['kode_kelas'] ?></td>
                                    <td>
                                    <a href="<?php echo base_url();?>Admin_siswa/ubah/<?php echo $d['id_siswa'];?>" class="badge badge-success">Edit</a>
                                        <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $d['id_siswa'] ?>">Hapus</a>

                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Data Hapus  -->

        <?php foreach ($siswa as $d) : ?>
            <!--delete Data-->
            <div class="modal fade" id="deleteData<?= $d['id_siswa'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewDataLabel">Hapus siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Anda yakin ingin menghapus data <?= $d['nama_siswa'] ?></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <a href="<?= base_url('admin_siswa/hapus?id_siswa=') ?><?= $d['id_siswa'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>


</div>
<!-- /.container-fluid -->
