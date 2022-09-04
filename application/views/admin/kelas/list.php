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
                    <form style="margin: 20px 0;" action="<?= base_url() . 'admin_kelas'; ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                            <a href="<?= base_url('admin_kelas/tambah'); ?>" class="btn btn-block btn-sm btn-info" ><i class="fa fa-plus-circle"></i> Tambah Data Kelas</a>
                            </div>
                    </form>
                </div>


                <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Kode Kelas</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Sub Kelas</th>
                                <th scope="col">Wali Kelas</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 1;
                                foreach ($kelas as $key => $kelas) : ?>
                                    <tr>
                                        <th width="50"><?= $i ?></th>
                                        <td><?= $kelas['kode_kelas'] ?></td>
                                        <td><?= $kelas['kelas'] ?></td>
                                        <td><?= $kelas['sub_kelas'] ?></td>
                                        <td><?= $kelas['nama_guru'] ?></td>
                                        <td width="50">
                                            <a href="<?php echo base_url();?>Admin_kelas/ubah/<?php echo $kelas['id_kelas'];?>" class="badge badge-success">Edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $kelas['id_kelas'] ?>">Hapus</a>

                                            </td>
                                    </tr>
                                   
                                    <!--delete Data-->
                                    <div class="modal fade" id="deleteData<?= $kelas['id_kelas'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDataLabel">Hapus Data Kelas</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus data ini ?</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('Admin_kelas/hapus?id_kelas=') ?><?= $kelas['id_kelas'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>