   <!-- Container Fluid-->
   <div class="container-fluid" id="container-wrapper">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Jadwal Seminar</h1>
           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Jadwal Seminar</li>
           </ol>
       </div>

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
                               <div class="h6 mb-0 text-gray-800 mb-3 text-capitalize">
                                   <?= $card->judul ?>
                               </div>
                               <div class="text-xs ">Mahasiswa seminar :
                                   <span class=""><?= $card->nama_mahasiswa ?></span>
                               </div>
                               <div class="text-xs">Jenis seminar :
                                   <span class=""> <?= $card->nama ?></span>
                               </div>
                               <a href="<?= base_url() ?>jadwal_seminar/daftar/<?= $card->id ?>"><button
                                       class="cta-button mt-3">Daftar</button></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <?php endforeach; ?>
       </div>