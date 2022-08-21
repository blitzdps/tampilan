<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li>Data Jadwal Pelajaran</li>
            </ol>
            <h2>Data Jadwal Pelajaran</h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Blog Section ======= -->
    
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2></h2>
                <p>Data Jadwal Pelajaran</p>
            </header>
            <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Hari</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 1;
                                foreach ($jadwal_pelajaran as $d) : ?>
                                    <tr>
                                        <th width="50"><?= $i ?></th>
                                        <td><?= $d['hari'] ?></td>
                                        <td><?= $d['id_kelas'] ?></td>
                                        <td><?= $d['id_pelajaran'] ?></td>
                                        <td><?= $d['id_guru'] ?></td>
                                        <td><?= $d['jam_mulai'] ?></td>
                                        <td><?= $d['jam_selesai'] ?></td>
                                       
                                    </tr>
                                    
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                            </table>
                    </div>
                </div>

    
    <!-- End Blog Section -->

</main><!-- End #main -->