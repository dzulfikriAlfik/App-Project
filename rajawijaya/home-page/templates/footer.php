</div>

<!-- Begin footer -->
<footer class="footer">
   <div class="footer-main">
      <div class="container">
         <div class="row items">
            <div class="col-xl-3 col-lg-3 col-md-5 col-12 item">
               <!-- Begin company info -->
               <div class="footer-company-info">
                  <div class="footer-company-top">
                     <a href="#" class="logo" title="Logo">
                        <img src="admin-page/assets/img/logo/<?= $row['logo']; ?>" class="logo-footer" width="200" alt="Logo Raja Wijaya">
                     </a>
                     <div class="footer-company-desc">
                        <p><?= $row['sejarah']; ?></p>
                     </div>
                  </div>
                  <ul class="footer-social-links">
                     <li>
                        <a href="https://facebook.com/<?= $socmed['facebook']; ?>" title="Facebook">
                           <svg viewBox="0 0 320 512">
                              <use xlink:href="home-page/assets/img/sprite.svg#facebook-icon"></use>
                           </svg>
                        </a>
                     </li>
                     <li>
                        <a href="https://instagram.com/<?= $socmed['instagram']; ?>" title="Instagram">
                           <svg viewBox="0 0 448 512">
                              <use xlink:href="home-page/assets/img/sprite.svg#instagram-icon"></use>
                           </svg>
                        </a>
                     </li>
                     <li>
                        <a href="https://twitter.com/<?= $socmed['twitter']; ?>" title="Twitter">
                           <svg viewBox="0 0 512 512">
                              <use xlink:href="home-page/assets/img/sprite.svg#twitter-icon"></use>
                           </svg>
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- End company info -->
            </div>
            <div class="col-xl-2 offset-xl-1 col-md-3 col-5 col-lg-2 item">
               <div class="footer-item">
                  <p class="footer-item-heading">Menu</p>
                  <nav class="footer-nav">
                     <ul class="footer-mnu">
                        <li><a href="#" class="hover-link" data-title="Home"><span>Home</span></a></li>
                        <li><a href="#" class="hover-link" data-title="Tentang Kami"><span>Tentang Kami</span></a></li>
                        <li><a href="#" class="hover-link" data-title="Sejarah"><span>Sejarah</span></a></li>
                        <li><a href="#" class="hover-link" data-title="Kegiatan"><span>Kegiatan</span></a></li>
                        <li><a href="#" class="hover-link" data-title="Mitra"><span>Mitra</span></a></li>
                        <li><a href="#" class="hover-link" data-title="Kontak"><span>Kontak</span></a></li>
                        <li><a href="admin-page/auth/login" class="hover-link" data-title="Login/Daftar"><span>Login/Daftar</span></a></li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-12 item">
               <div class="footer-item">
                  <p class="footer-item-heading">Kontak Kami</p>
                  <ul class="footer-contacts">
                     <li>
                        <i class="material-icons md-22">location_on</i>
                        <div class="footer-contact-info">
                           <?= $row['address']; ?>
                        </div>
                     </li>
                     <li>
                        <i class="material-icons md-22 footer-contact-tel">smartphone</i>
                        <div class="footer-contact-info">
                           <a href="#!" class="formingHrefTel"><?= $row['telp']; ?></a>
                        </div>
                     </li>
                     <li>
                        <i class="material-icons md-22 footer-contact-email">email</i>
                        <div class="footer-contact-info">
                           <a href="mailto:<?= $row['email']; ?>"><?= $row['email']; ?></a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-bottom">
      <div class="container">
         <div class="row justify-content-center items">
            <div class="col-md-auto col-12 item">
               <div class="copyright">© 2021 Raja Wijaya</div>
            </div>
         </div>
      </div>
   </div>
</footer><!-- End footer -->

</main><!-- End main -->

<script src="home-page/assets/libs/jquery/jquery.min.js"></script>
<script src="home-page/assets/libs/lozad/lozad.min.js"></script>
<script src="home-page/assets/libs/device/device.js"></script>
<script src="home-page/assets/libs/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
<script src="home-page/assets/libs/spincrement/jquery.spincrement.min.js"></script>
<script src="home-page/assets/libs/jquery-validation-1.19.3/jquery.validate.min.js"></script>
<script src="home-page/assets/js/custom.js"></script>

</body>

</html>