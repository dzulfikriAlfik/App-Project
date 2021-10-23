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
   <!-- summernote -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/summernote/summernote-bs4.min.css'); ?>">
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
                  <a href="#" class="d-block"><?= $_SESSION['nama_mitra'] ?></a>
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
                     <a href="<?= baseUrl('admin-page/dashboard/dashboard_mitra'); ?>" class="nav-link <?= addClass($page, 'dashboard mitra', 'active') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= baseUrl('admin-page/chat/mitra_chat'); ?>" class="nav-link <?= addClass($page, 'chat mitra', 'active') ?>">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Chat</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= baseUrl('auth/logout_mitra'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                     </a>
                  </li>
               </ul>
            </nav>

      </aside>