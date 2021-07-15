<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
        </ol>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Email</th>
                                <th>Status Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($mahasiswa->num_rows() < 1) : ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Maaf data tidak ada</td>
                            </tr>
                            <?php else: ?>

                            <?php 
                            $nomor = 1;
                            foreach($mahasiswa->result() as $row) : ?>

                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $row->nim ?></td>
                                <td><?= $row->name  ?></td>
                                <td><?= $row->email  ?></td>
                                <td>
                                    <?php if($row->role_id == 3) : ?>
                                    <span class="badge badge-primary mx-1">
                                        <?= $row->role  ?>
                                    </span>
                                    <?php else: ?>
                                    <span class="badge badge-success mx-1">
                                        <?= $row->role  ?>
                                    </span>
                                    <?php endif; ?>
                                </td>
                                <td><a class="btn btn-sm btn-warning mr-2"
                                        href="<?= base_url(); ?>mahasiswa/edit/<?= $row->id; ?>" title="Edit">Edit
                                        Role</a>
                                    <a class="btn btn-sm btn-danger"
                                        href="<?= base_url(); ?>mahasiswa/delete/<?= $row->id; ?>" title="Delete"
                                        onclick="return confirm('Are u sure?')">Hapus Data</a>
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