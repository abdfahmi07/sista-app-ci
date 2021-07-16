<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Dosen</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('dosen') ?>"> Data Dosen</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Dosen</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('dosen/tambah') ?>">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="Masukan NIDN" name="nidn"
                                value="<?= set_value('nidn') ?>">
                            <?= form_error('nidn', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Dosen</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?= set_value('name') ?>" placeholder="Masukan Nama Dosen">
                            <?= form_error('name', '<small class="text-danger">' , '</small>') ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>