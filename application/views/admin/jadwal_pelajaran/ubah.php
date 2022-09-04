<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Jadwal Pelajaran</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data Jadwal Pelajaran

                        <div class="float-right">
                            <a href="<?= base_url('admin_jadwal_pelajaran') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Jadwal Pelajaran</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="" method="post">

                    <input type="hidden" name="id_jadwal_pelajaran" id="id_jadwal_pelajaran" value="<?php echo $jadwal_pelajaran['id_jadwal_pelajaran'];?>">

                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Hari</label>
                        <select class="form-control" name="hari" id="hari" >
                        <option value="1" <?php if($jadwal_pelajaran['hari'] == '1'){echo "selected";} ?>>Senin</option>
                        <option value="2" <?php if($jadwal_pelajaran['hari'] == '2'){echo "selected";} ?>>Selasa</option>
                        <option value="3" <?php if($jadwal_pelajaran['hari'] == '3'){echo "selected";} ?>>Rabu</option>
                        <option value="4" <?php if($jadwal_pelajaran['hari'] == '4'){echo "selected";} ?>>Kamis</option>
                        <option value="5" <?php if($jadwal_pelajaran['hari'] == '5'){echo "selected";} ?>>Jumat</option>
                        <option value="6" <?php if($jadwal_pelajaran['hari'] == '6'){echo "selected";} ?>>Sabtu</option>
                      </select>
                          <!-- <input type="text" name="hari" id="hari" class="form-control" placeholder="Hari"/> -->
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('hari');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control" >
                            <?php foreach ($kelas as $kls) : ?>
                              <option value="<?php echo $kls->id_kelas?>"<?php if($kls->id_kelas == $jadwal_pelajaran['id_kelas']){echo "selected";} ?>><?php echo $kls->kode_kelas?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_kelas');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Pelajaran</label>
                        <select name="id_pelajaran" class="form-control" >
                            <?php foreach ($pelajaran as $pj) : ?>
                              <option value="<?php echo $pj->id_pelajaran?>"<?php if($pj->id_pelajaran == $jadwal_pelajaran['id_pelajaran']){echo "selected";} ?>><?php echo $pj->nama_pelajaran?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_pelajaran');?> </small>
                        </div>
                   

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Guru</label>
                        <select name="id_guru" class="form-control" >
                            <?php foreach ($guru as $gr) : ?>
                              <option value="<?php echo $gr->id_guru?>"<?php if($gr->id_guru == $jadwal_pelajaran['id_guru']){echo "selected";} ?>><?php echo $gr->nama_guru?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_guru');?> </small>
                       </div>


                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control" id="jam_mulai" value="<?php echo $jadwal_pelajaran['jam_mulai'];?>" >
                                </div>
                       </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                    <label>Jam Selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control" id="jam_selesai" value="<?php echo $jadwal_pelajaran['jam_selesai'];?>" >
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
