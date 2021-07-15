<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Seminar Peserta</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Seminar Peserta</li>
        </ol>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Seminar Peserta</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>Seminar</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Ruangan</th>
                                <th>Kehadiran</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($seminar->num_rows() < 1) : ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Maaf data tidak ada</td>
                            </tr>
                            <?php else: ?>

                            <?php 
                            // print_r($seminar->result());
                            $nomor = 1;
                            foreach($seminar->result() as $row) : ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td class="text-capitalize"><?= substr($row->judul, 0, 25).'....'?></td>
                                <td><?= tanggal_indo($row->tanggal)  ?></td>
                                <td><?= date("H:i", strtotime($row->jam)) ?></td>
                                <td><?= $row->ruangan  ?>
                                </td>
                                <?php if($row->kehadiran == 0) : ?>
                                <td><span class="badge badge-danger mx-1">Ditolak</span></td>
                                <?php elseif($row->kehadiran == 1): ?>
                                <td><span class="badge badge-success mx-1">Diterima</span></td>
                                <?php else: ?>
                                <td><span class="badge badge-warning mx-1">Pending</span></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= base_url() ?>jadwal_seminar/detail/<?= $row->id; ?>" class="mr-1">
                                        <button class="btn btn-sm btn-warning"> <i class="fas fa-eye"
                                                title="Lihat Detail" style="color: white;"></i></button></a>
                                    <?php if($row->kehadiran == 1) :?>
                                    <a href="<?= base_url(); ?>jadwal_seminar/viewTicket/<?= $row->id ?>" class=" mr-1"
                                        title="Lihat Tiket"> <button class="btn btn-sm btn-primary"><i
                                                class="fas fa-ticket-alt mr-2" style="color: white;"></i>Lihat
                                            Tiket</button></a>
                                    <?php else :?>
                                    <a href="#" class="mr-1" title="Lihat Tiket"> <button class="btn btn-sm btn-primary"
                                            disabled><i class="fas fa-ticket-alt mr-2" style="color: white;"></i>Lihat
                                            Tiket</button></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php 
                        $nomor++;
                        endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->