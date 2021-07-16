<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seminar Tugas Akhir</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('facilitator') ?> ">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Seminar</li>
        </ol>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Seminar</h6>
                    <a class="btn btn-primary" href="<?= base_url('facilitator/tambah_seminar') ?>">Daftar Seminar</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>Judul</th>
                                <th>Seminar</th>
                                <th>Waktu</th>
                                <th>Ruangan</th>
                                <th>Status</th>
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
                            $nomor = 1;
                            foreach($seminar->result() as $row) : ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td class="text-capitalize"><?= substr($row->judul, 0, 25) . '....' ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= date("H:i", strtotime($row->jam)) . ' ' . date("d-m-Y", strtotime($row->tanggal))  ?>
                                </td>
                                <td><?= $row->ruangan  ?></td>
                                <td>
                                    <?php if($row->nilai_pembimbing != 0 && $row->nilai_penguji1 != 0 && $row->nilai_penguji2 != 0) : ?>
                                    <span class="badge badge-success mx-1">Sudah Dinilai</span>
                                    <?php else : ?>
                                    <span class="badge badge-danger mx-1">Belum Dinilai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>facilitator/detail_seminar/<?= $row->id; ?>"
                                        title="Edit">
                                        <button class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye mr-2"></i>Detail</button></a>
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