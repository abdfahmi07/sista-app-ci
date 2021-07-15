<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dosen</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dosen</li>
        </ol>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
                    <a class="btn btn-primary" href="<?= base_url('dosen/tambah') ?>">Tambah Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>NIDN</th>
                                <th>Nama Dosen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $nomor = 1;
                        foreach($dosen->result() as $row) : ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $row->nidn ?></td>
                                <td><?= $row->nama  ?></td>
                                <td><a href="<?= base_url(); ?>dosen/edit/<?= $row->id; ?>" class="mr-2" title="Edit"><i
                                            class="fas fa-edit" style="color: #3873cc"></i></a>
                                    <a href="<?= base_url(); ?>dosen/delete/<?= $row->id; ?>" title="Delete"
                                        onclick="return confirm('Are u sure?')"><i class="fas fa-trash"
                                            style="color: #f54646"></i></a>
                                </td>
                            </tr>
                            <?php 
                        $nomor++;
                        endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->