<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penilaian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('penilaian') ?>"> Data Penilaian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Penilaian</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-1 font-weight-bold">Info Seminar</h6>
                    <hr class="mt-2">
                </div>
                <div class="card-body pt-0 detail-peserta-seminar">
                    <div class="left-side">
                        <h6>Mahasiswa Seminar </h6>
                        <h6>Judul </h6>
                        <h6>Tanggal </h6>
                        <h6>Waktu </h6>
                        <h6>Ruangan</h6>
                    </div>
                    <div class="right-side">
                        <h6>: &nbsp;<?= $penilaian_with_kategori->nama_mahasiswa ?></h6>
                        <h6 class="text-capitalize">: &nbsp;<?= $penilaian_with_kategori->judul ?></h6>
                        <h6>: &nbsp;<?= tanggal_indo($penilaian_with_kategori->tanggal) ?></h6>
                        <h6>: &nbsp;<?= date("H:i", strtotime($penilaian_with_kategori->jam)) . ' WIB ' ?>
                        </h6>
                        <h6>: &nbsp;<?= $penilaian_with_kategori->ruangan ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card mb-5">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-1 font-weight-bold">Info Nilai</h6>
                    <hr class="mt-2">
                </div>
                <div class="card-body pt-0 detail-peserta-seminar">
                    <div class="left-side">
                        <h6>Dosen Penilai</h6>
                        <h6>Kategori Penilaian</h6>
                        <h6>Nilai</h6>
                    </div>

                    <div class="right-side">
                        <h6>: &nbsp;<?= $penilaian_with_dosen->nama ?></h6>
                        <h6>: &nbsp;<?= $penilaian_with_kategori->nama ?></h6>
                        <h6>: &nbsp;<?= $penilaian_with_kategori->nilai ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>