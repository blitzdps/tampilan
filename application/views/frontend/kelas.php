<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li>Data Kelas</li>
            </ol>
            <h2>Data Kelas</h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Blog Section ======= -->
    
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2></h2>
                <p>Data Kelas</p>
            </header>
            <div style="width:100%; overflow-x:scroll">
                    <table class="table table-hover display" id="mytable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jumlah Siswa</th>
                                <th scope="col">Wali Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 1;
                                foreach ($kelas as $d) : ?>
                                    <tr>
                                        <th width="50"><?= $i ?></th>
                                        <td><?= $d['kode_kelas'] ?></td>
                                       
                                    </tr>
                                    
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                            </table>
                    </div>
                </div>

    
    <!-- End Blog Section -->

</main><!-- End #main -->