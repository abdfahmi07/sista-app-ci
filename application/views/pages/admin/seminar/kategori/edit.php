<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kategori Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kategori_seminar') ?>"> Data Kategori Seminar </a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori Seminar</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('kategori_seminar/update') ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo $kategori_seminar->id; ?>" />
                        <div class="form-group">
                            <label for="name">Nama Seminar</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukan Nama Seminar"
                                name="name" value="<?= $kategori_seminar->nama ?>">
                            <?= form_error('name', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>