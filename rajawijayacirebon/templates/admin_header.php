<?php
include_once('../../koneksi.php');
$row = single_query("SELECT * FROM company_profile");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= ucfirst($page) . ($subPage ? " | " . ucfirst($subPage) : null); ?></title>
   <link rel="icon" href="<?= baseUrl('assets/img/logo/') . $row['logo']; ?>" type="image/x-icon">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/dist/css/adminlte.min.css'); ?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/daterangepicker/daterangepicker.css'); ?>">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/select2/css/select2.min.css'); ?>">
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
   <!-- Bootstrap4 Duallistbox -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
   <link rel="stylesheet" href="<?= baseUrl('assets/custom/myStyle.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->

      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <a href="#" class="brand-link">
            <img src="<?= baseUrl('assets/admin/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Rajawijaya</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <div class="pb-3 mt-3 mb-3 user-panel d-flex">
               <div class="image">
                  <img src="<?= baseUrl('assets/admin/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block"><?= $_SESSION['nama_admin'] ?></a>
               </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                     <a href="<?= baseUrl(''); ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home Page</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= baseUrl('admin-page/dashboard/dashboard'); ?>" class="nav-link <?= addClass($page, 'dashboard', 'active') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                     </a>
                  </li>

                  <!-- MENU DATA PERUSAHAAN -->
                  <?php
                  $masterDataPage = null;
                  if (($subPage == 'data perusahaan' && $idPage == 'cd-1') || ($subPage == 'data admin' && $idPage == 'cd-2')) {
                     $masterDataPage = $page;
                  }
                  ?>
                  <li class="nav-item has-treeview <?= addClass($page, $masterDataPage, 'menu-open'); ?>">
                     <a href="#" class="nav-link <?= addClass($page, $masterDataPage, 'active'); ?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Data Perusahaan
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?= baseUrl('admin-page/company/company_profile'); ?>" class="nav-link <?= addClassDropDown($page, $masterDataPage, $idPage, 'cd-1', 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Profil Perusahaan</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= baseUrl('admin-page/company/admin_data'); ?>" class="nav-link <?= addClassDropDown($page, $masterDataPage, $idPage, 'cd-2', 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Data Admin</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <!-- MENU MITRA -->
                  <?php
                  $mitraPage = null;
                  if (($subPage == 'daftar mitra' && $idPage == 'md-1') || ($subPage == 'chat' && $idPage == 'md-2')) {
                     $mitraPage = $page;
                  }
                  ?>
                  <li class="nav-item has-treeview <?= addClass($page, $mitraPage, 'menu-open'); ?>">
                     <a href="#" class="nav-link <?= addClass($page, $mitraPage, 'active'); ?>">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Mitra
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?= baseUrl('admin-page/mitra/mitra_data'); ?>" class="nav-link <?= addClassDropDown($page, $mitraPage, $idPage, 'md-1', 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Daftar Mitra</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= baseUrl('admin-page/chat/admin_chat'); ?>" class="nav-link <?= addClassDropDown($page, $mitraPage, $idPage, 'md-2', 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Chat</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <!-- MENU KEGIATAN -->
                  <?php
                  $kegPage = null;
                  if (($subPage == 'daftar kegiatan' && $idPage == 'keg-1') || ($subPage == 'daftar galery' && $idPage == 'keg-2')) {
                     $kegPage = $page;
                  }
                  ?>
                  <li class="nav-item has-treeview <?= addClass($page, $kegPage, 'menu-open'); ?>">
                     <a href="#" class="nav-link <?= addClass($page, $kegPage, 'active'); ?>">
                        <i class="nav-icon fas fa-hard-hat"></i>
                        <p>Kegiatan
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?= baseUrl('admin-page/kegiatan/kegiatan_data'); ?>" class="nav-link <?= addClassDropDown($page, $kegPage, $idPage, 'keg-1', 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Daftar Kegiatan</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= baseUrl('admin-page/kegiatan/daftar_galery'); ?>" class="nav-link <?= addClassDropDown($page, $kegPage, $idPage, 'keg-2', 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Galery</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="<?= baseUrl('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                     </a>
                  </li>
               </ul>
            </nav>

      </aside>