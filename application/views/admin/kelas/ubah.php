<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Ubah Kelas</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Ubah Data Kelas

                        <div class="float-right">
                            <a href="<?= base_url('admin_kelas') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Kelas</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="" method="post">

                    <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $kelas['id_kelas'];?>">

                    <div class="col-md-6">
                            <div class="form-group">
                                    <label>Kode Kelas</label>
                                    <input type="text" name="kode_kelas" class="form-control" id="kode_kelas" value="<?php echo $kelas['kode_kelas'];?>" >
                                </div>
                       </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" id="kelas" >
                        <option value="1" <?php if($kelas['kelas'] == '1'){echo "selected";} ?>>1</option>
                        <option value="2" <?php if($kelas['kelas'] == '2'){echo "selected";} ?>>2</option>
                        <option value="3" <?php if($kelas['kelas'] == '3'){echo "selected";} ?>>3</option>
                        <option value="4" <?php if($kelas['kelas'] == '4'){echo "selected";} ?>>4</option>
                        <option value="5" <?php if($kelas['kelas'] == '5'){echo "selected";} ?>>5</option>
                        <option value="6" <?php if($kelas['kelas'] == '6'){echo "selected";} ?>>6</option>
                      </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('kelas');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Sub Kelas</label>
                        <select class="form-control" name="sub_kelas" id="sub_kelas" >
                        <option value="A" <?php if($kelas['sub_kelas'] == 'A'){echo "selected";} ?>>A</option>
                        <option value="B" <?php if($kelas['sub_kelas'] == 'B'){echo "selected";} ?>>B</option>
                        <option value="C" <?php if($kelas['sub_kelas'] == 'C'){echo "selected";} ?>>C</option>
                        <option value="D" <?php if($kelas['sub_kelas'] == 'D'){echo "selected";} ?>>D</option>
                        <option value="E" <?php if($kelas['sub_kelas'] == 'E'){echo "selected";} ?>>E</option>
                      </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('sub_kelas');?> </small>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group">
                        <label>Wali Kelas</label>
                        <select name="id_guru" class="form-control" >
                            <?php foreach ($guru as $gr) : ?>
                              <option value="<?php echo $gr->id_guru?>"<?php if($gr->id_guru == $kelas['id_guru']){echo "selected";} ?>><?php echo $gr->nama_guru?> </option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <small class="form-text text-danger"> <?php echo form_error('id_guru');?> </small>
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
