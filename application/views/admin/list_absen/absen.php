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
                    <!-- <form style="margin: 20px 0;" action="<?= base_url() . 'list_absen'; ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <a href="<?= base_url('list_absen'); ?>" class="btn btn-block btn-info"><i class="fa fa-plus-circle"></i> Tambah Data siswa</a>
                            </div>
                    </form> -->
                </div>


                <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($absen as $d) : ?>
                                <tr>
                                    <th width="50"><?= $i ?></th>
                                    <td><?= $d['nama_siswa'] ?></td>
                                    <td><?= $d['status'] ?></td>
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


    </div>


</div>
<!-- /.container-fluid -->
