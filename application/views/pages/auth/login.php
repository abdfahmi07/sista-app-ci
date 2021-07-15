<!-- Login Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Login</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth') ?>" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email"
                                            aria-describedby="emailHelp" placeholder="Enter Email Address"
                                            value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger">' , '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger">' , '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="font-weight-bold small" href="<?= base_url('auth/registration') ?>">Create
                                        an Account!</a>
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>