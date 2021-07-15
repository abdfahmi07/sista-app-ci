<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seminar Tugas Akhir</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Seminar</li>
        </ol>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Seminar</h6>
                    <a class="btn btn-primary" href="<?= base_url('seminar/tambah') ?>">Tambah Seminar</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>NIM</th>
                                <th>Mahasiswa/i</th>
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
                                <td><?= $row->nim ?></td>
                                <td><?= $row->nama_mahasiswa  ?></td>
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
                                <td class="more-actions d-flex">
                                    <?php 
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = date_create($row->tanggal . $row->jam); 
                                        date_add($date, date_interval_create_from_date_string('2 hours'));
                                        $time_now = date_format($date, 'H:i:s');
                                    ?>
                                    <?php if(($time_now >= date("H:i:s")) || ($row->tanggal != date("Y-m-d"))) : ?>
                                    <button class="btn btn-sm btn-success mr-2" disabled>Beri Nilai</button>
                                    <?php else: ?>
                                    <a href="<?= base_url(); ?>seminar/penilaian/<?= $row->id; ?>"><button
                                            class="btn btn-sm btn-success mr-2">Beri Nilai</button></a>
                                    <?php endif; ?>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-lg fa-fw text-gray-400 mt-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a href="<?= base_url() ?>seminar/peserta/<?= $row->id; ?>"
                                                class="dropdown-item mr-1"><i class="fas fa-user mr-2"></i>Lihat
                                                Peserta</a>
                                            <a href="<?= base_url(); ?>seminar/detail/<?= $row->id; ?>"
                                                class="dropdown-item mr-1" title="Edit"><i class="fas fa-eye mr-2"
                                                    style="color: #da9310"></i>Detail</a>
                                            <a href="<?= base_url(); ?>seminar/edit/<?= $row->id; ?>"
                                                class="dropdown-item mr-1" title="Edit"><i class="fas fa-edit mr-2"
                                                    style="color: #3873cc"></i>Edit</a>
                                            <a href="<?= base_url(); ?>seminar/delete/<?= $row->id; ?>"
                                                class="dropdown-item mr-1" title="Delete"
                                                onclick="return confirm('Are u sure?')"><i class="fas fa-trash mr-2"
                                                    style="color: #f54646"></i>Delete</a>
                                        </div>
                                    </div>
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