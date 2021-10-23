<?php include_once 'templates/home_header.php'; ?>

<!-- Begin bread crumbs -->
<nav class="bread-crumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <ul class="bread-crumbs-list">
               <li>
                  <a href="<?= baseUrl(''); ?>">Home</a>
                  <i class="material-icons md-18">chevron_right</i>
               </li>
               <li><a href="#!">Galery Kegiatan Proyek</a></li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<!-- End bread crumbs -->

<!-- Begin latest news -->
<section class="section">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="section-heading heading-center">
               <div class="section-subheading">More info about</div>
               <h2>Foto Progress Pekerjaan</h2>
            </div>
         </div>
         <?php
         $kegiatan = query("SELECT * FROM kegiatan JOIN galery_kegiatan ON kegiatan.id_kegiatan = galery_kegiatan.id_kegiatan ORDER BY kegiatan.tanggal DESC");

         foreach ($kegiatan as $galery) :
         ?>
         <div class="col-lg-4 col-md-6 col-12 item">
            <!-- Begin news item -->
            <article class="news-item item-style">
               <a href="#" class="news-item-img">
                  <img data-src="admin-page/assets/img/kegiatan/<?= $galery['foto']; ?>" class="lazy" src="admin-page/assets/img/kegiatan/<?= $galery['foto']; ?>" alt="">
               </a>
               <div class="news-item-info">
                  <div class="news-item-date"><?= tgl_indo($galery['tanggal']); ?></div>
                  <h3 class="news-item-heading item-heading">
                     <a href="#" title="<?= $galery['nama_kegiatan']; ?>"><?= $galery['nama_kegiatan']; ?></a>
                  </h3>
                  <div class="news-item-desc">
                     <p><?= $galery['keterangan']; ?></p>
                  </div>
               </div>
            </article><!-- End news item -->
         </div>
         <?php endforeach; ?>

      </div>
   </div>
</section><!-- End latest news -->

<?php include_once 'templates/home_footer.php'; ?>