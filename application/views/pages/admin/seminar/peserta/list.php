<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peserta</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('seminar') ?>"> Data Seminar </a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Peserta</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body detail-peserta-seminar">
                    <div class="left-side">
                        <h6>Mahasiswa Seminar </h6>
                        <h6>Judul </h6>
                        <h6>Tanggal </h6>
                        <h6>Waktu </h6>
                        <h6>Ruangan </h6>
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
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nomor</th>
                                    <th>NIM</th>
                                    <th>Mahasiswa</th>
                                    <th>Prodi</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            if($peserta->num_rows() < 1) : ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Maaf data tidak ada</td>
                                </tr>
                                <?php else: ?>

                                <?php 
                            $nomor = 1;
                            foreach($peserta->result() as $row) : ?>

                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $row->nim ?></td>
                                    <td><?= $row->nama  ?></td>
                                    <td><?= $row->prodi  ?></td>
                                    <td>
                                        <?php if($row->kehadiran == 0) : ?>
                                        <span class="badge badge-danger mx-1">
                                            Ditolak
                                        </span>
                                        <?php elseif($row->kehadiran == 1): ?>
                                        <span class="badge badge-success mx-1">
                                            Diterima
                                        </span>
                                        <?php else: ?>
                                        <span class="badge badge-warning mx-1">
                                            Pending
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?= base_url(); ?>peserta/edit/<?= $row->id; ?>" class="mr-2"
                                            title="Edit"><i class="fas fa-edit" style="color: #3873cc"></i></a>
                                        <a href="<?= base_url(); ?>peserta/delete/<?= $row->id; ?>" title="Delete"
                                            onclick="return confirm('Are u sure?')"><i class="fas fa-trash"
                                                style="color: #f54646"></i></a>
                                    </td>
                                </tr>
                                <?php 
                        $nomor++;
                        endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>