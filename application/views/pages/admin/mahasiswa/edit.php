<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>"> Data Mahasiswa </a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Mahasiswa</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('mahasiswa/update') ?>">
                        <input type="hidden" name="id" id="id" value="<?= $mahasiswa->id ?>" />
                        <div class="form-group">
                            <label for="role">Status Role</label>
                            <select class="form-control" name="role" id="role">
                                <?php foreach ($roles->result() as $row) : ?>
                                <option value="<?= $row->id ?>"
                                    <?= $row->id == $mahasiswa->role_id ? 'selected' : '' ?>>
                                    <?= $row->role ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('role', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>