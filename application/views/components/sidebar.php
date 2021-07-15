<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url() ?>public/assets/img/logo/icon.png" rel="icon">
    <title>SISTA NF - <?=$title?></title>
    <link href="<?= base_url() ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>public/assets/css/ruang-admin.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/assets/css/admin.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= $user['role_id'] == 1 ? base_url('dashboard') : ($user['role_id'] == 2 ?  base_url('facilitator') : base_url('home')) ?>">
                <i class="fa fa-book fa-lg"></i>
                <div class="sidebar-brand-text mx-2">Sista NF</div>
            </a>
            <?php if($user['role_id'] == 1) : ?>
            <hr class="sidebar-divider my-0">
            <div class="sidebar-heading mt-3 ">
                Administrator
            </div>

            <?php if($title == 'Dashboard') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("dashboard") ?>">
                    <i class=" fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if($title == 'Daftar Seminar Baru' || $title == 'Data Seminar' || $title == 'Ketegori Seminar' || $title == 'Tambah Kategori Seminar' || $title == 'Edit Kategori Seminar' || $title == 'Data Peserta Seminar' || $title == 'Edit Peserta Seminar' || $title == 'Detail Seminar' ) : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapAdmin"
                    aria-expanded="true" aria-controls="collapseBootstrapAdmin">
                    <i class="far fa-fw fa-calendar"></i>
                    <span>Seminar</span>
                </a>
                <div id="collapseBootstrapAdmin" class="collapse" aria-labelledby="headingBootstrap">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php if($title == 'Daftar Seminar Baru') : ?>
                        <a class="collapse-item active" href="<?= base_url("seminar/tambah") ?>">Daftar Seminar
                            Baru</a>
                        <?php else: ?>
                        <a class="collapse-item " href="<?= base_url("seminar/tambah") ?>">Daftar Seminar
                            Baru</a>
                        <?php endif; ?>

                        <?php if($title == 'Data Seminar') : ?>
                        <a class="collapse-item active" href="<?= base_url("seminar") ?>">Data Seminar</a>
                        <?php else: ?>
                        <a class="collapse-item " href="<?= base_url("seminar") ?>">Data Seminar</a>
                        <?php endif; ?>

                        <?php if($title == 'Ketegori Seminar' || $title == 'Tambah Kategori Seminar' || $title == 'Edit Kategori Seminar') : ?>
                        <a class="collapse-item active" href="<?= base_url("kategori_seminar") ?>">Kategori Seminar</a>
                        <?php else: ?>
                        <a class="collapse-item" href="<?= base_url("kategori_seminar") ?>">Kategori Seminar</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php if($title == 'Data Dosen' || $title == 'Tambah Data Dosen' || $title == 'Edit Data Dosen') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("dosen") ?>">
                    <i class=" fas fa-fw fa-users"></i>
                    <span>Data Dosen</span>
                </a>
            </li>
            <?php if($title == 'Data Mahasiswa' || $title == 'Edit Data Mahasiswa') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("mahasiswa") ?>">
                    <i class=" fas fa-fw fa-user-graduate"></i>
                    <span>Data Mahasiswa</span>
                </a>
            </li>
            <?php if($title == 'Data Penilaian' || $title == 'Detail Penilaian') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("penilaian") ?>">
                    <i class=" fas fa-fw fa-clipboard"></i>
                    <span>Data Penilaian</span>
                </a>
            </li>
            <hr class="sidebar-divider mt-3">
            <?php endif ?>

            <?php if($user['role_id'] == 2) : ?>
            <hr class="sidebar-divider my-0">
            <div class="sidebar-heading mt-3 ">
                Facilitator
            </div>

            <?php if($title == 'Facilitator - Dashboard') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("facilitator") ?>">
                    <i class=" fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if($title == 'Facilitator - Daftar Seminar Baru' || $title == 'Facilitator - Data Seminar' || $title == 'Facilitator - Data Peserta Seminar' || $title == 'Facilitator - Edit Peserta Seminar' || $title == 'Facilitator - Detail Seminar' ) : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapAdmin"
                    aria-expanded="true" aria-controls="collapseBootstrapAdmin">
                    <i class="far fa-fw fa-calendar"></i>
                    <span>Seminar</span>
                </a>
                <div id="collapseBootstrapAdmin" class="collapse" aria-labelledby="headingBootstrap">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php if($title == 'Facilitator - Daftar Seminar Baru') : ?>
                        <a class="collapse-item active" href="<?= base_url("facilitator/tambah_seminar") ?>">Daftar
                            Seminar
                            Baru</a>
                        <?php else: ?>
                        <a class="collapse-item " href="<?= base_url("facilitator/tambah_seminar") ?>">Daftar Seminar
                            Baru</a>
                        <?php endif; ?>

                        <?php if($title == 'Facilitator - Data Seminar') : ?>
                        <a class="collapse-item active" href="<?= base_url("facilitator/list_seminar") ?>">Data
                            Seminar</a>
                        <?php else: ?>
                        <a class="collapse-item " href="<?= base_url("facilitator/list_seminar") ?>">Data Seminar</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>

            <?php if($title == 'Facilitator - Data Penilaian' || $title == 'Facilitator - Detail Penilaian') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("facilitator/list_nilai") ?>">
                    <i class=" fas fa-fw fa-clipboard"></i>
                    <span>Data Penilaian</span>
                </a>
            </li>
            <hr class="sidebar-divider mt-3">
            <?php endif ?>

            <?php if($user['role_id'] == 3) : ?>
            <div class="sidebar-heading mt-3">
                Mahasiswa
            </div>
            <?php if($title == 'Home') : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url('home') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <?php if($title == 'Student - Jadwal Seminar' || $title == 'Student - Data Seminar Peserta' || $title == 'Student - Detail Seminar Peserta' ) : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapUser"
                    aria-expanded="true" aria-controls="collapseBootstrapUser">
                    <i class="far fa-fw fa-calendar"></i>
                    <span>Seminar</span>
                </a>
                </a>
                <div id="collapseBootstrapUser" class="collapse" aria-labelledby="headingBootstrap"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php if($title == 'Student - Jadwal Seminar') : ?>
                        <a class="collapse-item active" href="<?= base_url('jadwal_seminar') ?>">Jadwal Seminar</a>
                        <?php else: ?>
                        <a class="collapse-item" href="<?= base_url('jadwal_seminar') ?>">Jadwal Seminar</a>
                        <?php endif; ?>
                        <?php if($title == 'Student - Data Seminar Peserta') : ?>
                        <a class="collapse-item active" href="<?= base_url('jadwal_seminar/data') ?>">Data Seminar
                            Peserta</a>
                        <?php else: ?>
                        <a class="collapse-item" href="<?= base_url('jadwal_seminar/data') ?>">Data Seminar Peserta</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar -->