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
                    <form style="margin: 20px 0;" action="<?= base_url() . 'list_absen'; ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                            <a href="<?= base_url('list_absen/tambah'); ?>" class="btn btn-block btn-sm btn-info" ><i class="fa fa-plus-circle"></i> Tambah Data List Absen</a>
                            </div>
                    </form>
                </div>


                <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status absen</th>
                                <th scope="col">Hadir</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 1;
                                foreach ($list_absen as $key => $list_absen) : ?>

                                    <?php $kam = $this->db->get_where('tbl_kelas', ['id_kelas' => $list_absen['id_kelas']])->row_array(); ?>
                                    <?php $hadir = $this->db->get_where('absen', ['role_absen' => $list_absen['id_list_absen'], 'status' => 'Hadir'])->num_rows(); ?>
                                    <tr>
                                        <th width="50"><?= $i ?></th>
                                        <td><?= $list_absen['kode_kelas'] ?></td>
                                        <td><?= mediumdate_indo(date($list_absen['tgl'])) ?></td>
                                        <td><?php if ($list_absen['status'] == 'Selesai') : ?>
                                                <span class="badge badge-success"><?= $list_absen['status'] ?></span>
                                            <?php elseif ($list_absen['status'] == 'Belum Selesai') : ?>
                                                <span class="badge badge-danger"><?= $list_absen['status'] ?></span>
                                            <?php endif ?>
                                        </td>
                                        <td><?= $hadir ?></td>
                                        <td><?php if ($list_absen['status'] == 'Selesai') : ?>
                                                <a href="" class="badge badge-info" data-toggle="modal" data-target="#printData<?= $list_absen['id_list_absen'] ?>"><i class="fa fa-print"></i> Print</a>
                                                <a href="<?= base_url('list_absen/') ?><?= $list_absen['tgl'] ?>?id_absen=<?= $list_absen['id_list_absen'] ?>" class="badge badge-success"><i class="fa fa-eye"></i> View</a>
                                            <?php endif ?>
                                            <?php if ($list_absen['status'] == 'Belum Selesai') : ?>
                                                <a href="<?= base_url('list_absen/') ?><?= $list_absen['tgl'] ?>?id_list_absen=<?= $list_absen['id_list_absen'] ?>" class="badge badge-primary">Absen</a>
                                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#tutupData<?= $list_absen['id_list_absen'] ?>">Tutup Absen</a>
                                            <?php endif ?>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $list_absen['id_list_absen'] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            <a href="<?php echo base_url();?>List_absen/ubah/<?php echo $list_absen['id_list_absen'];?>" class="badge badge-success">Edit</a>
                                        </td>
                                    </tr>
                                   
                                    <!--delete Data-->
                                    <div class="modal fade" id="deleteData<?= $list_absen['id_list_absen'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDataLabel">Hapus Data List Absen</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus data ini ?</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('List_absen/hapus?id_list_absen=') ?><?= $list_absen['id_list_absen'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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