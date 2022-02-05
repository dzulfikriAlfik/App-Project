<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= $title; ?></title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="<?= base_url('bootstrap/plugins/fontawesome-free/css/all.min.css'); ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url('bootstrap/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->

      <?= $this->include('layout/sidebar'); ?>
      <?= $this->include('layout/breadcrumb'); ?>

      <!-- Main content -->
      <div class="content">
         <div class="container-fluid">

            <?= $this->renderSection('content'); ?>

         </div>
      </div>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <!-- Main Footer -->
   <footer class="main-footer">
      <strong>Copyright &copy; 2022 Dasena Prima</strong> All rights reserved.
   </footer>
   </div>

   <!-- jQuery -->
   <script src="<?= base_url('bootstrap/plugins/jquery/jquery.min.js'); ?>"></script>
   <!-- Bootstrap 4 -->
   <script src="<?= base_url('bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url('bootstrap/dist/js/adminlte.min.js'); ?>"></script>
</body>

</html>