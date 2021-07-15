<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Seminar Baru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('seminar') ?>"> Data Seminar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Seminar Baru</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('seminar/tambah') ?>">
                        <div class="form-wrapper">
                            <div class="left-side flex-grow-1 mr-5">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" placeholder="Masukan NIM"
                                        name="nim" value="<?= set_value('nim') ?>">
                                    <?= form_error('nim', '<small class="text-danger">' , '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?= set_value('name') ?>" placeholder="Masukan Nama Mahasiswa">
                                    <?= form_error('name', '<small class="text-danger">' , '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <select class="form-control" id="prodi" name="prodi">
                                        <option value="Teknik Informatika" selected>Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                    </select>
                                    <?= form_error('prodi', '<small class="text-danger">' , '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <input type="number" min="1" max="10" class="form-control col-lg-6" id="semester"
                                        name="semester" value="<?= set_value('semester') ?>"
                                        placeholder="Masukan Semester">
                                    <?= form_error('semester', '<small class="text-danger">' , '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="date-of-seminar">Tanggal Seminar</label>
                                    <input type="date" class="form-control" id="date-of-seminar" name="date_of_seminar"
                                        value="<?= date("Y-m-d") ?>" placeholder="Masukan Tanggal Seminar">
                                    <?= form_error('date_of_seminar', '<small class="text-danger">' , '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="time-of-seminar">Waktu Seminar</label>
                                    <input type="time" class="form-control" id="time-of-seminar" name="time_of_seminar"
                                        value="<?= set_value('time_of_seminar') ?>" placeholder="Masukan Waktu Seminar">
                                    <?= form_error('time_of_seminar', '<small class="text-danger">' , '</small>') ?>
                                </div>
                            </div>

                            <div class="right-side flex-grow-1">
                                <div class="form-group">
                                    <label for="ruangan">Ruangan</label>
                                    <input type="text" class="form-control" id="ruangan" name="ruangan"
                                        value="<?= set_value('ruangan') ?>" placeholder="Masukan Ruangan">
                                    <?= form_error('ruangan', '<small class="text-danger">' , '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul TA</label>
                                    <textarea class="form-control" id="title" rows="3" name="title"
                                        placeholder="Masukan Judul TA"></textarea>
                                    <?= form_error('title', '<small class="text-danger">' , '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="seminar">Seminar</label>
                                    <select class="form-control" id="seminar" name="seminar">
                                        <?php foreach($kategori->result() as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('seminar', '<small class="text-danger">' , '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="pembimbing">Pembimbing</label>
                                    <select class="form-control" id="pembimbing" name="pembimbing">
                                        <?php foreach($dosen->result() as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('pembimbing', '<small class="text-danger">' , '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="penguji1">Penguji 1</label>
                                    <select class="form-control" id="penguji1" name="penguji1">
                                        <?php foreach($dosen->result() as $row) : ?>
                                        <option value="<?= $row->nidn ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('penguji1', '<small class="text-danger">' , '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="penguji2">Penguji 2</label>
                                    <select class="form-control" id="penguji2" name="penguji2">
                                        <?php foreach($dosen->result() as $row) : ?>
                                        <option value="<?= $row->nidn ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('penguji2', '<small class="text-danger">' , '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>