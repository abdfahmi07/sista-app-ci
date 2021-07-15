<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Penilaian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('penilaian') ?>"> Data Penilaian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Penilaian</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('penilaian/update') ?>">
                        <input type="hidden" name="id" id="id" value="<?= $penilaian->id ?>" />
                        <div class="form-group">
                            <label for="penilaian">Kategori Penilaian</label>
                            <select class="form-control" name="penilaian" id="penilaian">
                                <?php foreach($kategori_penilaian->result() as $row) : ?>
                                <option value="<?= $row->id ?>"
                                    <?= $row->id == $penilaian->penilaian_id ? 'selected' : '' ?>><?= $row->nama ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('penilaian', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="seminar">Seminar</label>
                            <select class="form-control" name="seminar" id="seminar">
                                <?php foreach($seminar->result() as $row) : ?>
                                <option value="<?= $row->id ?>"
                                    <?= $row->id == $penilaian->seminar_id ? 'selected' : '' ?>>
                                    <?= $row->nama_mahasiswa . ' - ' . $row->judul ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('seminar', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="dosen">Dosen Penilai</label>
                            <select class="form-control" name="dosen" id="dosen">
                                <?php foreach($dosen->result() as $row) : ?>
                                <option value="<?= $row->id ?>"
                                    <?= $row->id == $penilaian->dosen_id ? 'selected' : '' ?>><?= $row->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('dosen', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control col-md-6" name="nilai" id="nilai"
                                placeholder="Masukan Nilai" value="<?= $penilaian->nilai ?>">
                            <?= form_error('nilai', '<small class="text-danger">' , '</small>') ?>
                        </div>
                        <div class="form-footer ">
                            <button type="submit" class="btn btn-primary mt-3">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>