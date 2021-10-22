<?php include_once 'templates/header.php'; ?>

<!-- Begin bread crumbs -->
<nav class="bread-crumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <ul class="bread-crumbs-list">
               <li>
                  <a href="index.php">Home</a>
                  <i class="material-icons md-18">chevron_right</i>
               </li>
               <li><a href="#">About us</a></li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<!-- End bread crumbs -->

<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="section-heading heading-center">
               <div class="section-subheading">MORE INFO</div>
               <h1>Tentang Kami</h1>
            </div>
            <div class="content">
               <div class="img-style">
                  <img src="templates/assets/img/galian.jpg" alt="" />
               </div>
               <!-- Sejarah -->
               <h2>Sejarah</h2>
               <p><?= $company['sejarah']; ?></p>
               <!-- Visi -->
               <h3>Visi</h3>
               <p><?= $company['visi']; ?></p>
               <!-- Misi -->
               <h3>Misi</h3>
               <p><?= $company['misi']; ?></p>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Begin our customers -->
<section class="section section-bgc">
   <div class="container">
      <div class="row items">
         <div class="col-12">
            <div class="section-heading heading-center">
               <div class="section-subheading">The best</div>
               <h2>Mitra Kami</h2>
               <p class="section-desc">
                  Our customers have disrupted industries, opened
                  new markets, and made countless lives better. We
                  are privileged to work with hundreds of
                  future-thinking businesses, including many of the
                  world’s top hardware, software, and consumer
                  brands.
               </p>
            </div>
         </div>
         <?php foreach($mitra_kami as $mitra) : ?>
         <div class="col-lg-3 col-md-4 col-sm-4 col-6 item">
            <!-- Begin brands item -->
            <div class="brands-item item-style">
               <img data-src="admin-page/assets/img/mitra/<?= $mitra['logo']; ?>" class="lazy" src="admin-page/assets/img/mitra/<?= $mitra['logo']; ?>" alt="" />
            </div>
            <!-- End brands item -->
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>
<!-- End our customers -->


<?php include_once 'templates/footer.php'; ?>