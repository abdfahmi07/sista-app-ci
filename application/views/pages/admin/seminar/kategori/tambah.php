<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kategori_seminar') ?>"> Data Kategori Seminar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori Seminar</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('kategori_seminar/tambah') ?>">
                        <div class="form-group">
                            <label for="name">Nama Seminar</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukan Nama Seminar"
                                name="name" value="<?= set_value('name') ?>">
                            <?= form_error('name', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>