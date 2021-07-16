   <!-- Container Fluid-->
   <div class="container-fluid " id="container-wrapper">
       <div id="hero-wrapper" class="card col-md p-0">
           <div class="card-img">
               <img src="<?= base_url() ?>public/assets/img/seminar.jpg" class="img-fluid" alt="">
           </div>
           <div class="card-description">
               <h1 class="h3 text-gray-800">Daftarkan Dirimu Segera</h1>
               <p>
                   Tersedia beberapa seminar tugas akhir yang bisa kamu ikuti, segera daftarkan diri kamu dan jadilah
                   peserta.
               </p>
               <a href="<?= base_url('jadwal_seminar') ?>"><button class="cta-button">Daftar Sekarang</button></a>
           </div>
       </div>

       <h2 class="col-md seminar-schedule mb-3">
           Jadwal Seminar
       </h2>
       <div class="row mb-3">
           <?php if($seminar->num_rows() < 1) : ?>
           <h6 class="col-lg text-center">Maaf belum ada seminar untuk saat ini</h6>
           <?php endif;?>
           <?php foreach($seminar->result() as $card) : ?>
           <div class="col-xl-4 col-md-6 mb-4">
               <div class="card card-seminar">
                   <div class="card-body">
                       <div class="row align-items-center">
                           <div class="col mr-2">
                               <div class="h6 mb-0  text-gray-800 mb-3 text-capitalize">
                                   <?= $card->judul ?>
                               </div>
                               <div class="text-xs ">Mahasiswa seminar :
                                   <span class=""><?= $card->nama_mahasiswa ?></span>
                               </div>
                               <div class="text-xs">Jenis seminar :
                                   <span class=""> <?= $card->nama ?></span>
                               </div>
                               <a href="<?= base_url() ?>jadwal_seminar/daftar/<?= $card->id ?>"><button
                                       class="btn btn-sm btn-outline-primary mt-3">Daftar</button></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <?php endforeach; ?>
       </div>

       <div class="row mb-3">
           <div class="col-xl-3 col-md-6 mb-4 m-auto">
               <a href="<?= base_url('jadwal_seminar') ?>"><button class="btn btn-outline-primary mt-0 mb-5"> Lihat
                       seminar
                       lain...</button></a>
           </div>
       </div>