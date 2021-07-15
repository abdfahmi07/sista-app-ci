<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </div>


    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('public/assets/img/') . $user['image_url'] ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text"><?= $user['nim'] == 0 ? '' : $user['nim'] ?> </p>
                    <p class="card-text"><?= $user['email'] ?> </p>
                    <p class="card-text"><strong>Role : </strong> <span class="badge badge-primary mx-1">
                            <?= $user['role'] ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>