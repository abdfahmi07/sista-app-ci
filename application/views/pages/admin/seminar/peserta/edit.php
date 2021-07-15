<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Peserta Seminar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('seminar') ?>"> Data Seminar </a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Peserta Seminar</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('peserta/update') ?>">
                        <input type="hidden" name="id" id="id" value="<?= $peserta->id ?>" />
                        <div class="form-group">
                            <label for="status">Status Kehadiran</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">Ditolak</option>
                                <option value="1">Diterima</option>
                            </select>
                            <?= form_error('status', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>