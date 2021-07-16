<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Seminar Peserta</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('facilitator') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('facilitator/list_seminar') ?>"> Data Seminar Peserta</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Detail Seminar</li>
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
                        <h6>Judul </h6>
                        <h6>Kategori Seminar</h6>
                        <h6>Tanggal </h6>
                        <h6>Waktu </h6>
                        <h6>Ruangan</h6>
                        <h6>Pembimbing</h6>
                        <h6>Penguji 1</h6>
                        <h6>Penguji 2</h6>

                    </div>
                    <div class="right-side">
                        <h6 class="text-capitalize">: &nbsp;<?= $seminar_with_pembimbing->judul ?></h6>
                        <h6>: &nbsp;<?= $seminar_with_kategori->nama ?></h6>
                        <h6>: &nbsp;<?= tanggal_indo($seminar_with_pembimbing->tanggal) ?></h6>
                        <h6>: &nbsp;<?= date("H:i", strtotime($seminar_with_pembimbing->jam)) . ' WIB ' ?></h6>
                        <h6>: &nbsp;<?= $seminar_with_pembimbing->ruangan ?></h6>
                        <h6>: &nbsp;<?= $seminar_with_pembimbing->nama ?></h6>
                        <h6>: &nbsp;<?= $seminar_with_penguji1->nama ?></h6>
                        <h6>: &nbsp;<?= $seminar_with_penguji2->nama ?></h6>

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
                        <h6>Nilai Pembimbing</h6>
                        <h6>Nilai Penguji 1</h6>
                        <h6>Nilai Penguji 2</h6>
                        <h6 style="color: red;">Nilai Akhir</h6>
                    </div>
                    <div class="right-side">
                        <h6>:
                            &nbsp;<?= $seminar_with_pembimbing->nilai_pembimbing != 0 ? $seminar_with_pembimbing->nilai_pembimbing : 'Belum Ada Nilai' ?>
                        </h6>
                        <h6>:
                            &nbsp;<?= $seminar_with_pembimbing->nilai_penguji1 != 0 ? $seminar_with_pembimbing->nilai_penguji1 : 'Belum Ada Nilai' ?>
                        </h6>
                        <h6>:
                            &nbsp;<?= $seminar_with_pembimbing->nilai_penguji2 != 0 ? $seminar_with_pembimbing->nilai_penguji2 : 'Belum Ada Nilai' ?>
                        </h6>
                        <h6 style="color: red;">:
                            &nbsp;<?= $seminar_with_pembimbing->nilai_akhir != 0 ? $seminar_with_pembimbing->nilai_akhir : 'Belum Ada Nilai' ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>