<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Penilaian Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('seminar') ?>"> Data Seminar </a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Penilaian Seminar</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('seminar/input_nilai') ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo $seminar->id; ?>" />
                        <div class="form-group">
                            <label for="nilai_pembimbing">Nilai Pembimbing</label>
                            <input type="text" class="form-control" id="nilai_pembimbing"
                                placeholder="Masukan Nilai Pembimbing" name="nilai_pembimbing" value="">
                            <?= form_error('nilai_pembimbing', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="nilai_penguji1">Nilai Penguji 1</label>
                            <input type="text" class="form-control" id="nilai_penguji1"
                                placeholder="Masukan Nilai Penguji 1" name="nilai_penguji1" value="">
                            <?= form_error('nilai_penguji1', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="nilai_penguji2">Nilai Penguji 2</label>
                            <input type="text" class="form-control" id="nilai_penguji2"
                                placeholder="Masukan Nama Penguji 2" name="nilai_penguji2" value="">
                            <?= form_error('nilai_penguji2', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>