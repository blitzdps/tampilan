<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li>Data Siswa</li>
            </ol>
            <h2>Data Siswa</h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2></h2>
                <p>Data Siswa</p>
            </header>
            <div class="row gy-4">

                <?php foreach ($siswa as $d) : ?>

                    <div class="col-md-4 entries">

                        <article class="entry">

                            <div class="entry-img">
                                <img style="height: 250px;width: 250px;" src="<?= base_url('assets/'); ?>img/murid.png" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?= base_url('detail_siswa?id_siswa=' . $d['id_siswa']); ?>"><?= nl2br(substr($d['nama_siswa'], 0, 50)); ?></a>
                            </h2>

                        </article><!-- End blog entry -->

                    </div>

                <?php endforeach ?>

                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li class="disabled" aria-disabled="true"><a>Total data: <?= $total; ?></a></li>
                        <?php echo $pagination; ?>
                    </ul>
                </div>


            </div>
        </div>

    </section><!-- End Blog Section -->

</main><!-- End #main -->