<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ketegori Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Seminar</li>
        </ol>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ketegori Seminar</h6>
                    <a class="btn btn-primary" href="<?= base_url('kategori_seminar/tambah') ?>">Tambah Ketegori
                        Baru</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Seminar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($kategori_seminar->num_rows() < 1) : ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Maaf data tidak ada</td>
                            </tr>
                            <?php else: ?>

                            <?php 
                            $nomor = 1;
                            foreach($kategori_seminar->result() as $row) : ?>

                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $row->nama ?></td>
                                <td><a href="<?= base_url(); ?>kategori_seminar/edit/<?= $row->id; ?>" class="mr-2"
                                        title="Edit"><i class="fas fa-edit" style="color: #3873cc"></i></a>
                                    <a href="<?= base_url(); ?>kategori_seminar/delete/<?= $row->id; ?>" title="Delete"
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
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->