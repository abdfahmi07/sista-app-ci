<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tiket Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('jadwal_seminar/data') ?>"> Data Seminar Peserta</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Ticket</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="alert alert-warning" role="alert">
                Tunjukan informasi seminar dan kode tiket kepada petugas atau panitia seminar
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-body col-lg detail-wrapper">
                    <div class="detail-ticket">
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
                    <div class="code-ticket text-uppercase" style="text-align: center;">
                        <h5>Kode Tiket</h5>

                        <h6 class="font-weight-bold"><i class="fas fa-ticket-alt mr-2"></i><?= generate_ticket(5) ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>