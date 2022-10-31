<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= ucfirst($page) . ($subPage ? " | " . ucfirst($subPage) : null); ?></title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/fontawesome-free/css/all.min.css'); ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/dist/css/adminlte.min.css'); ?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/daterangepicker/daterangepicker.css'); ?>">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/select2/css/select2.min.css'); ?>">
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
   <!-- Bootstrap4 Duallistbox -->
   <link rel="stylesheet" href="<?= baseUrl('assets/bootstrap/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">

      <?php 
      require_once($baseUrl . '/templates/navbar.php');
      require_once($baseUrl . '/templates/sidebar.php');
      ?>