<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Peserta Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('jadwal_seminar') ?>"> Jadwal Seminar </a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Peserta Seminar</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body detail-seminar">
                    <div class="left-side">
                        <h6>Mahasiswa Seminar </h6>
                        <h6>Judul </h6>
                        <h6>Tanggal </h6>
                        <h6>Waktu </h6>
                        <h6>Ruangan</h6>
                    </div>
                    <div class="right-side">
                        <h6>: <?= $seminar->nama_mahasiswa ?></h6>
                        <h6 class="text-capitalize">: <?= $seminar->judul ?></h6>
                        <h6>: <?= tanggal_indo($seminar->tanggal) ?></h6>
                        <h6>: <?= date("H:i", strtotime($seminar->jam)) . ' WIB ' ?></h6>
                        <h6>: <?= $seminar->ruangan ?></h6>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('peserta/tambah') ?>">
                        <input type="hidden" name="seminar_id" id="seminar_id" value="<?php echo $seminar->id; ?>" />
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" placeholder="Masukan NIM" name="nim"
                                required>
                            <?= form_error('nim', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name"
                                required>
                            <?= form_error('name', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi">
                                <option value="Teknik Informatika" selected>Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                            <?= form_error('prodi', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>