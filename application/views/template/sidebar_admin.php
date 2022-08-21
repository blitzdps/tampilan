<?php
$notif_izin      = $this->db->get_where('perizinan', ['status' => 'Pending'])->num_rows();
$notif_konseling = $this->db->get_where('konseling', ['status' => 'Pending'])->num_rows();
$notif_ppdb = $this->db->get_where('ppdb', ['status' => '0'])->num_rows();
$notif_kontak = $this->db->get_where('kontak', ['status' => 1])->num_rows();
$notif_daftar_ulang = $this->db->get_where('siswa', ['status' => '2'])->num_rows();
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if ($menu == 'menu-1') : ?>
        <li class="nav-item">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Siswa</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih menu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/daftar_siswa'); ?>">
                <span>Data siswa </span> &nbsp;
                <?php if ($notif_daftar_ulang) : ?>
                    <span class="badge badge-danger" style="font-size: 10px;"><?= $notif_daftar_ulang ?></span>
                <?php endif ?>
                </a>
                <a class="collapse-item" href="<?= base_url('admin/tambah_siswa'); ?>">Pendaftaran siswa</a>
            </div>
        </div>
        </li>

    <?php if ($menu == 'menu-1') : ?>
        <li class="nav-item">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGuru" aria-expanded="true" aria-controls="collapseGuru">
            <i class="fas fa-fw fa-users"></i>
            <span>Guru</span>
        </a>
        <div id="collapseGuru" class="collapse" aria-labelledby="headingGuru" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih menu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/daftar_guru'); ?>">Data Guru</a>
                <a class="collapse-item" href="<?= base_url('admin/tambah_guru'); ?>">Pendaftaran Guru</a>
            </div>
        </div>
        </li>

    <?php if ($menu == 'menu-1') : ?>
        <li class="nav-item">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKaryawan" aria-expanded="true" aria-controls="collapseKaryawan">
            <i class="fas fa-fw fa-users"></i>
            <span>Karyawan</span>
        </a>
        <div id="collapseKaryawan" class="collapse" aria-labelledby="headingKaryawan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih menu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/daftar_karyawan'); ?>">Data Karyawan</a>
                <a class="collapse-item" href="<?= base_url('admin/tambah_karyawan'); ?>">Pendaftaran Karyawan</a>
            </div>
        </div>
        </li>

        <?php if ($menu == 'ppdb') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('admin/ppdb'); ?>">
                <i class="fas fa-fw fa-address-card"></i>
                <span>PPDB </span> &nbsp;
                <?php if ($notif_ppdb) : ?>
                    <span class="badge badge-danger" style="font-size: 10px;"><?= $notif_ppdb ?></span>
                <?php endif ?>
            </a>
            </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Data KBM
    </div>

                <!-- Nav Item - Utilities Collapse Menu -->
                

                    <?php if ($menu == 'kbm') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities12" aria-expanded="true" aria-controls="collapseUtilities12">
                            <i class="fas fa-fw fa-qrcode"></i>
                            <span>Data KBM</span>
                        </a>
                        <div id="collapseUtilities12" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pilih Menu:</h6>
                                <a class="collapse-item" href="<?= base_url('admin/pelajaran'); ?>">Pelajaran</a>
                                <a class="collapse-item" href="<?= base_url('admin/kelas'); ?>">Kelas</a>
                                <a class="collapse-item" href="<?= base_url('admin/jadwal_pelajaran'); ?>">Jadwal Pelajaran</a>
                                <a class="collapse-item" href="<?= base_url('admin/jadwal_ujian'); ?>">Jadwal Ujian</a>
                                <a class="collapse-item" href="<?= base_url('admin/absensi'); ?>">Absensi</a>
                                <a class="collapse-item" href="<?= base_url('admin/nilai'); ?>">Nilai</a>
                                <a class="collapse-item" href="<?= base_url('admin/materi'); ?>">Materi</a>
                                <a class="collapse-item" href="<?= base_url('admin/tugas'); ?>">Tugas</a>
                            </div>
                        </div>
                        </li>
                                 <!-- Divider -->
                                <hr class="sidebar-divider">
                                <!-- Heading -->
                                <div class="sidebar-heading">
                                    Informasi
                                </div>

                                <?php if ($menu == 'acara') : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcara" aria-expanded="true" aria-controls="collapseAcara">
                                        <i class="fas fa-fw fa-calendar-day"></i>
                                        <span>Acara</span>
                                    </a>
                                    <div id="collapseAcara" class="collapse" aria-labelledby="headingAcara" data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <h6 class="collapse-header">Pilih Menu:</h6>
                                            <a class="collapse-item" href="<?= base_url('admin/tambah_acara'); ?>">Tambah Acara</a>
                                            <a class="collapse-item" href="<?= base_url('admin/acara'); ?>">Data Acara</a>
                                            <a class="collapse-item" href="<?= base_url('admin/kategori_acara'); ?>">Data Kategori</a>
                                        </div>
                                    </div>
                                    </li>

                                <?php if ($menu == 'pengumuman') : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengumuman" aria-expanded="true" aria-controls="collapsePengumuman">
                                        <i class="fas fa-fw fa-calendar-day"></i>
                                        <span>Pengumuman</span>
                                    </a>
                                    <div id="collapsePengumuman" class="collapse" aria-labelledby="headingPengumuman" data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <h6 class="collapse-header">Pilih Menu:</h6>
                                            <a class="collapse-item" href="<?= base_url('admin/tambah_pengumuman'); ?>">Tambah Pengumuman</a>
                                            <a class="collapse-item" href="<?= base_url('admin/pengumuman'); ?>">Data Pengumuman</a>
                                            <a class="collapse-item" href="<?= base_url('admin/kategori_pengumuman'); ?>">Data Kategori</a>
                                        </div>
                                    </div>
                                    </li>

                                <?php if ($menu == 'artikel') : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArtikel" aria-expanded="true" aria-controls="collapseArtikel">
                                        <i class="fas fa-fw fa-calendar-day"></i>
                                        <span>Artikel</span>
                                    </a>
                                    <div id="collapseArtikel" class="collapse" aria-labelledby="headingArtikel" data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <h6 class="collapse-header">Pilih Menu:</h6>
                                            <a class="collapse-item" href="<?= base_url('admin/tambah_aartikel'); ?>">Tambah Artikel</a>
                                            <a class="collapse-item" href="<?= base_url('admin/aartikel'); ?>">Data Artikel</a>
                                            <a class="collapse-item" href="<?= base_url('admin/kategori_aartikel'); ?>">Data Kategori</a>
                                        </div>
                                    </div>
                                    </li>

                                <!-- Divider -->
                                <hr class="sidebar-divider">
                                <!-- Heading -->
                                <div class="sidebar-heading">
                                    Profil
                                </div>
                                
                                 <!-- Nav Item - Pages Collapse Menu -->
                                 <?php if ($menu == 'profil') : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfil" aria-expanded="true" aria-controls="collapseProfil">
                                        <i class="fas fa-fw fa-calendar-day"></i>
                                        <span>Profil</span>
                                    </a>
                                    <div id="collapseProfil" class="collapse" aria-labelledby="headingProfil" data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <h6 class="collapse-header">Pilih Menu:</h6>
                                            <a class="collapse-item" href="<?= base_url('admin/sejarah'); ?>">Sejarah</a>
                                            <a class="collapse-item" href="<?= base_url('admin/visi'); ?>">Visi & Misi</a>
                                            <a class="collapse-item" href="<?= base_url('admin/struktur'); ?>">Struktur Organisasi</a>
                                        </div>
                                    </div>
                                    </li>

                                <!-- Divider -->
                                <hr class="sidebar-divider">

                                <!-- Heading -->
                                <div class="sidebar-heading">
                                    Website
                                </div>



                                <!-- Nav Item - Pages Collapse Menu -->

                                        <?php if ($menu == 'kontak') : ?>
                                            <li class="nav-item active">
                                            <?php else : ?>
                                            <li class="nav-item">
                                            <?php endif; ?>
                                            <a class="nav-link" href="<?= base_url('admin/kontak'); ?>">
                                                <i class="fas fa-fw fa-address-book"></i>
                                                <span>Kontak</span>
                                                <?php $notif_kontak; ?>
                                                <?php if ($notif_kontak) : ?>
                                                    <span class="badge badge-danger" style="font-size: 10px;"> <?= $notif_kontak ?></span>
                                                <?php endif ?>
                                            </a>
                                            </li>


                                            <!-- Nav Item - Pages Collapse Menu -->
                                            <?php if ($menu == 'home') : ?>
                                                <li class="nav-item active">
                                                <?php else : ?>
                                                <li class="nav-item">
                                                <?php endif; ?>
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHome" aria-expanded="true" aria-controls="collapseHome">
                                                    <i class="fas fa-fw fa-home"></i>
                                                    <span>Home</span>
                                                </a>
                                                <div id="collapseHome" class="collapse" aria-labelledby="headingHome" data-parent="#accordionSidebar">
                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                        <h6 class="collapse-header">Pilih Menu:</h6>
                                                        <a class="collapse-item" href="<?= base_url('admin/utama'); ?>">Utama</a>
                                                        <a class="collapse-item" href="<?= base_url('admin/tagline'); ?>">Tagline</a>
                                                    </div>
                                                </div>
                                                </li>


                                                <!-- Nav Item - Pages Collapse Menu -->
                                                <?php if ($menu == 'website') : ?>
                                                    <li class="nav-item active">
                                                    <?php else : ?>
                                                    <li class="nav-item">
                                                    <?php endif; ?>
                                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                                                        <i class="fas fa-fw fa-cogs"></i>
                                                        <span>Website</span>
                                                    </a>
                                                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                                        <div class="bg-white py-2 collapse-inner rounded">
                                                            <h6 class="collapse-header">Pilih Menu:</h6>
                                                            <a class="collapse-item" href="<?= base_url('admin/about'); ?>">About</a>
                                                            <a class="collapse-item" href="<?= base_url('admin/website'); ?>">Settings</a>
                                                            <a class="collapse-item" href="<?= base_url('admin/email_sender'); ?>">Email Sender</a>
                                                        </div>
                                                    </div>
                                                    </li>

                                                    <!-- Divider -->
                                                    <hr class="sidebar-divider">

                                                    <!-- Heading -->
                                                    <div class="sidebar-heading">
                                                        Pengaturan
                                                    </div>


                                                    <?php if ($menu == 'menu-5') : ?>
                                                        <li class="nav-item active">
                                                        <?php else : ?>
                                                        <li class="nav-item">
                                                        <?php endif; ?>
                                                        <a class="nav-link" href="<?= base_url('admin/setting'); ?>">
                                                            <i class="fas fa-fw fa-cog"></i>
                                                            <span>Setting Akun</span>
                                                        </a>
                                                        </li>

                                                        <!-- Nav Item - Tables -->
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                                                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                                                <span>Keluar</span>
                                                            </a>
                                                        </li>

                                                        <!-- Divider -->
                                                        <hr class="sidebar-divider d-none d-md-block">

                                                        <!-- Sidebar Toggler (Sidebar) -->
                                                        <div class="text-center d-none d-md-inline">
                                                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                                        </div>

</ul>
<!-- End of Sidebar -->