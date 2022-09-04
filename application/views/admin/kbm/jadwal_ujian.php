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
                    <form style="margin: 20px 0;" action="<?= base_url() . 'admin_jadwal_ujian'; ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                            <a href="" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#addNewData"><i class="fa fa-plus-circle"></i> Tambah Data Jadwal Ujian</a>
                            </div>
                    </form>
                </div>


                <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Selesai</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 1;
                                foreach ($jadwal_ujian as $d) : ?>
                                    <tr>
                                        <th width="50"><?= $i ?></th>
                                        <td><?= $d['tanggal'] ?></td>
                                        <td><?= $d['nama_pelajaran'] ?></td>
                                        <td><?= $d['jam_mulai'] ?></td>
                                        <td><?= $d['jam_selesai'] ?></td>
                                        <td><?= $d['keterangan'] ?></td>
                                        <td width="50">
                                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateData<?= $d['id_jadwal_ujian'] ?>">Edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $d['id_jadwal_ujian'] ?>">Hapus</a>

                                            </td>
                                    </tr>
                                    <!--update Data-->
                                    <div class="modal fade" id="updateData<?= $d['id_jadwal_ujian'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDataLabel">Ubah Data Jadwal Ujian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin_jadwal_ujian/ubah') ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                        <input type="hidden" name="id_jadwal_ujian" id="id_jadwal_ujian" value="<?= $d['id_jadwal_ujian'] ?>">


                                                            <input type="hidden" name="tanggal" id="tanggal" value="<?= $d['tanggal'] ?>">
                                                            <label for="">Tanggal</label>
                                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $d['tanggal'] ?>" placeholder="Tanggal">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_pelajaran" id="id_pelajaran" value="<?= $d['id_pelajaran'] ?>">
                                                            
                                                            <label for="">Pelajaran</label>
                                                            <input type="text" class="form-control" id="id_pelajaran" name="id_pelajaran" value="<?= $d['id_pelajaran'] ?>" placeholder="Pelajaran">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="hidden" name="jam_mulai" id="jam_mulai" value="<?= $d['jam_mulai'] ?>">
                                                            <label for="">Jam Mulai</label>
                                                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?= $d['jam_mulai'] ?>" placeholder="Jam Mulai">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="jam_selesai" id="jam_selesai" value="<?= $d['jam_selesai'] ?>">
                                                            <label for="">Jam Selesai</label>
                                                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?= $d['jam_selesai'] ?>" placeholder="Jam Selesai">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="keterangan" id="keterangan" value="<?= $d['keterangan'] ?>">
                                                            <label for="">Keterangan</label>
                                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $d['keterangan'] ?>" placeholder="Keterangan">
                                                        </div>
                                                        

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--delete Data-->
                                    <div class="modal fade" id="deleteData<?= $d['id_jadwal_ujian'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDataLabel">Hapus Data Jadwal Ujian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus data ini ?</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('admin_jadwal_ujian/hapus?id_jadwal_ujian=') ?><?= $d['id_jadwal_ujian'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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

    </div>

    <div class="modal fade" id="importData" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewDataLabel">Import Data Jadwal Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?= form_open_multipart(); ?>

                    <div class="form-group files">
                        <label>Upload File Excel</label>
                        <input type="file" class="form-control" multiple="" name="excel">
                    </div>


                    <label>Contoh data excel
                        <a href="<?= base_url('assets/contoh/Contoh_data_jadwal_ujian.xlsx') ?>" class="badge badge-pill badge-success" download>Download</a></label>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" value="upload" class="btn btn-success"><i class="fa fa-file-import"></i> Import</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exportData" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewDataLabel">Export Jadwal Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mengexport data semua jadwal ujian</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('admin/export_data') ?>" class="btn btn-success"><i class="fa fa-file-export"></i> Export</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="addNewData" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDataLabel">Tambah Data Jadwal Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin_jadwal_ujian/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?= set_value('tanggal') ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Pelajaran</label>
                        <input type="text" class="form-control" id="id_pelajaran" name="id_pelajaran" placeholder="Pelajaran" value="<?= set_value('id_pelajaran') ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Mulai</label>
                        <input type="text" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Jam Mulai" value="<?= set_value('jam_mulai') ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Selesai</label>
                        <input type="text" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="Jam Selesai" value="<?= set_value('jam_selesai') ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan') ?>">
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </form>
        </div>
    </div>
</div>

</div>