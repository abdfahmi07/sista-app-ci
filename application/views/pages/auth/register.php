 <!-- Register Content -->
 <div class="container-login">
     <div class="row justify-content-center">
         <div class="col-lg-6">
             <div class="card shadow-sm my-5">
                 <div class="card-body p-0">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="login-form">
                                 <div class="text-center">
                                     <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Register</h1>
                                 </div>
                                 <form method="POST" action="<?= base_url('auth/registration') ?>">
                                     <div class="form-group">
                                         <label>Nama Mahasiswa</label>
                                         <input type="text" class="form-control" id="name" name="name"
                                             placeholder="Masukan nama mahasiwa" value="<?= set_value('name') ?>">
                                         <?= form_error('name', '<small class="text-danger">' , '</small>') ?>
                                     </div>
                                     <div class="form-group">
                                         <label>NIM</label>
                                         <input type="text" class="form-control" id="nim" name="nim"
                                             placeholder="Masukan NIM" value="<?= set_value('nim') ?>">
                                         <?= form_error('nim', '<small class="text-danger">' , '</small>') ?>
                                     </div>
                                     <div class="form-group">
                                         <label>Email</label>
                                         <input type="text" class="form-control" id="email" name="email"
                                             aria-describedby="emailHelp" placeholder="Masukan email"
                                             value="<?= set_value('email') ?>">
                                         <?= form_error('email', '<small class="text-danger">' , '</small>') ?>
                                     </div>
                                     <div class="form-group">
                                         <label>Password</label>
                                         <input type="password" class="form-control" id="password1" name="password1"
                                             placeholder="Masukan password">
                                         <?= form_error('password1', '<small class="text-danger">' , '</small>') ?>
                                     </div>
                                     <div class="form-group">
                                         <label>Repeat Password</label>
                                         <input type="password" class="form-control" id="password2" name="password2"
                                             placeholder="Ketik ulang password">
                                     </div>
                                     <div class="form-group">
                                         <button type="submit" class="btn btn-primary btn-block">Register
                                             Account</button>
                                     </div>
                                 </form>
                                 <hr>
                                 <div class="text-center">
                                     <a class="font-weight-bold small" href="<?= base_url('auth') ?>">Already have an
                                         account?</a>
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