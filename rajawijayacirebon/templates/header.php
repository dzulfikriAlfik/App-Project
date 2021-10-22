<?php session_start();
include_once 'koneksi.php';

function baseUrl($url){
  return "http://rajawijayacirebon.site/$url";
}

$company = query("SELECT * FROM company_profile");
$services = query("SELECT * FROM services");
$socmed = query("SELECT * FROM socmed");
$mitra_kami = query('SELECT * FROM mitra');

(strlen($company['sejarah']) > 190) ? $sejarah = substr($company['sejarah'], 0, 190) . " ...... "  : $sejarah = $company['sejarah'];

?>

<!DOCTYPE html> 
<html lang="en">

<head>

   <meta charset="utf-8">

   <title>Raja Wijaya</title>

   <meta name="description" content="Description">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">

   <link rel="icon" href="admin-page/assets/img/logo/<?= $company['logo'] ?>" type="image/x-icon">

   <link rel="stylesheet" href="templates/assets/css/libs.css">
   <link rel="stylesheet" href="templates/assets/css/style.css">
   <link rel="preload" href="templates/assets/fonts/istok-web-v15-latin/istok-web-v15-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="templates/assets/fonts/istok-web-v15-latin/istok-web-v15-latin-700.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="templates/assets/fonts/montserrat-v15-latin/montserrat-v15-latin-700.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="templates/assets/fonts/montserrat-v15-latin/montserrat-v15-latin-600.woff2" as="font" type="font/woff2" crossorigin>

   <link rel="preload" href="templates/assets/fonts/material-icons/material-icons.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="templates/assets/fonts/material-icons/material-icons-outlined.woff2" as="font" type="font/woff2" crossorigin>
   <!-- myCustom CSS -->
   <link rel="stylesheet" href="templates/assets/css/custom.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-210286934-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-210286934-1');
    </script>

</head>


<body>

   <main class="main">

      <div class="main-inner">

         <!-- Begin mobile main menu -->
         <nav class="mmm">
            <div class="mmm-content">
               <ul class="mmm-list">
                  <li><a href="index">Home</a></li>
                  <li><a href="tentang-kami">Tentang Kami</a></li>
                  <li><a href="kegiatan">Kegiatan</a></li>
                  <li><a href="mitra">Mitra</a></li>
                  <li><a href="kontak">Kontak</a></li>
                  <?php if(isset($_SESSION['login'])) : ?>
                  <li><a href="dashboard">Dashboard</a></li>
                  <?php elseif(isset($_SESSION['login_mitra'])) : ?>
                  <li><a href="dashboard_mitra">Dashboard</a></li>
                  <?php else : ?>
                  <li><a href="login">Login/Daftar</a></li>
                  <?php endif; ?>
               </ul>
            </div>
         </nav><!-- End mobile main menu -->

         <!-- Begin header -->
         <header class="header">
            <!-- Begin header top -->
            <nav class="header-top">
               <div class="container">
                  <div class="row align-items-center justify-content-between">
                     <div class="col-auto">
                        <!-- Begin header top info -->
                        <ul class="header-top-info">
                           <li>
                              <a href="mailto:<?= $company['email'] ?>">
                                 <i class="material-icons md-18">mail_outline</i>
                                 <span><?= $company['email'] ?></span>
                              </a>
                           </li>
                           <li>
                              <a href="mailto:<?= $company['telp'] ?>" class="formingHrefTel">
                                 <i class="material-icons md-18">phone_in_talk</i>
                                 <span><?= $company['telp'] ?></span>
                              </a>
                           </li>
                        </ul><!-- Ennd header top info -->
                     </div>
                     <div class="col-auto">
                        <div class="header-top-links">
                           <!-- Begin social links -->
                           <ul class="social-links">
                              <li>
                                 <a href="https://facebook.com/<?= $socmed['facebook'] ?>" target="_blank" title="Facebook">
                                    <svg viewBox="0 0 320 512">
                                       <use xlink:href="templates/assets/img/sprite.svg#facebook-icon"></use>
                                    </svg>
                                 </a>
                              </li>
                              <li>
                                 <a href="https://instagram.com/<?= $socmed['instagram'] ?>" target="_blank" title="Instagram">
                                    <svg viewBox="0 0 448 512">
                                       <use xlink:href="templates/assets/img/sprite.svg#instagram-icon"></use>
                                    </svg>
                                 </a>
                              </li>
                              <li>
                                 <a href="https://twitter.com/<?= $socmed['twitter'] ?>" target="_blank" title="Twitter">
                                    <svg viewBox="0 0 512 512">
                                       <use xlink:href="templates/assets/img/sprite.svg#twitter-icon"></use>
                                    </svg>
                                 </a>
                              </li>
                           </ul><!-- End social links -->
                        </div>
                     </div>
                  </div>
               </div>
            </nav><!-- End header top -->

            <!-- Begin header fixed -->
            <nav class="header-fixed">
               <div class="container">
                  <div class="row flex-nowrap align-items-center justify-content-between">
                     <div class="col-auto d-block d-lg-none header-fixed-col">
                        <div class="main-mnu-btn">
                           <span class="bar bar-1"></span>
                           <span class="bar bar-2"></span>
                           <span class="bar bar-3"></span>
                           <span class="bar bar-4"></span>
                        </div>
                     </div>
                     <div class="col-auto header-fixed-col">
                        <!-- Begin logo -->
                        <a href="#" class="logo ml-md-5" title="Logo Raja Wijaya">
                           <img src="admin-page/assets/img/logo/<?= $company['logo'] ?>" width="200" alt="Logo Raja Wijaya">
                        </a><!-- End logo -->
                     </div>
                     <div class="col-auto header-fixed-col d-none d-lg-block col-static">
                        <!-- Begin main menu -->
                        <nav class="main-mnu">
                           <ul class="main-mnu-list">
                              <li>
                                 <a href="index" data-title="Home"><span>Home</span></a>
                              </li>
                              <li>
                                 <a href="tentang-kami" data-title="Tentang Kami"><span>Tentang Kami</span></a>
                              </li>
                              <li>
                                 <a href="kegiatan" data-title="Kegiatan"><span>Kegiatan</span></a>
                              </li>
                              <li>
                                 <a href="mitra" data-title="Mitra"><span>Mitra</span></a>
                              </li>
                              <li>
                                 <a href="kontak" data-title="Kontak"><span>Kontak</span></a>
                              </li>
                              <?php if(isset($_SESSION['login'])) : ?>
                              <li><a href="dashboard" data-title="Dashboard"><span>Dashboard</span></a></li>
                              <?php elseif(isset($_SESSION['login_mitra'])) : ?>
                              <li><a href="dashboard_mitra" data-title="Dashboard"><span>Dashboard</span></a></li>
                              <?php else : ?>
                              <li><a href="login" data-title="Login/Daftar"><span>Login/Daftar</span></a></li>
                              <?php endif; ?>
                           </ul>
                        </nav><!-- End main menu -->
                     </div>
                     <div class="col-auto header-fixed-col col-static">
                        <!-- Begin header actions -->
                        <ul class="header-actions">
                           <!-- Begin header navbar -->
                           <li class="d-block d-lg-none">
                              <div class="header-navbar">
                                 <div class="header-navbar-btn">
                                    <i class="material-icons md-24">more_vert</i>
                                 </div>
                                 <ul class="header-navbar-content">
                                    <li>
                                       <a href="mailto:<?= $company['email'] ?>">
                                          <i class="material-icons md-20">mail_outline</i>
                                          <span><?= $company['email'] ?></span>
                                       </a>
                                    </li>
                                    <li>
                                       <a href="mailto:<?= $company['telp'] ?>" class="formingHrefTel">
                                          <i class="material-icons md-20">support_agent</i>
                                          <span><?= $company['telp'] ?></span>
                                       </a>
                                    </li>
                                    <li>
                                       <!-- Begin social links -->
                                       <ul class="social-links">
                                          <li>
                                             <a href="https://facebook.com/<?= $socmed['facebook'] ?>" target="_blank" title="Facebook">
                                                <svg viewBox="0 0 320 512">
                                                   <use xlink:href="templates/assets/img/sprite.svg#facebook-icon"></use>
                                                </svg>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="https://instagram.com/<?= $socmed['instagram'] ?>" target="_blank" title="Instagram">
                                                <svg viewBox="0 0 448 512">
                                                   <use xlink:href="templates/assets/img/sprite.svg#instagram-icon"></use>
                                                </svg>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="https://twitter.com/<?= $socmed['twitter'] ?>" target="_blank" title="Twitter">
                                                <svg viewBox="0 0 512 512">
                                                   <use xlink:href="templates/assets/img/sprite.svg#twitter-icon"></use>
                                                </svg>
                                             </a>
                                          </li>
                                       </ul><!-- End social links -->
                                    </li>
                                 </ul>
                              </div>
                           </li><!-- End header navbar -->
                        </ul><!-- End header actions -->
                     </div>
                  </div>
               </div>
            </nav><!-- End header fixed -->
         </header><!-- End header -->