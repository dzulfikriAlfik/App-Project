<?php session_start();
if (isset($_SESSION['login'])) {
   header("Location: dashboard");
   exit();
}
if (isset($_SESSION['login_mitra'])) {
   header("Location: dashboard_mitra");
   exit();
}
include_once "../koneksi.php";
$company = single_query("SELECT * FROM company_profile");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Raja Wijaya Cirebon | Log in</title>

   <link rel="icon" href="<?= baseUrl('assets/img/logo/') . $company['logo']; ?>" type="image/x-icon">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= baseUrl('assets/admin/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="#"><b>Login</b> Mitra</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
         <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php if (isset($_SESSION["alert"])) :
               $message   = $_SESSION["message"];
               $type      = $_SESSION["type"];
            ?>
            <div class="alert alert-<?= $type ?> alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h5><i class="icon fas fa-<?= ($type == "success") ? 'check' : 'ban' ?>"></i> <?= $message ?>!</h5>
            </div>
            <?php
               unset($_SESSION["alert"]);
            endif; ?>

            <form action="action/cek_login_mitra" method="post">
               <div class="mb-3 input-group">
                  <input type="text" class="form-control" name="username" placeholder="Username">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user-shield"></span>
                     </div>
                  </div>
               </div>
               <div class="mb-3 input-group">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12">
                     <button type="submit" value="login" name="login_mitra" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <p class="my-3 text-center">
               <a href="<?= baseUrl(''); ?>" class="text-center">Back to Homepage</a>
            </p>
            <p class="text-center">Mitra?<br>
               <a href="<?= baseUrl('auth/daftar_mitra'); ?>" class="text-center">Belum punya akun? Daftar</a><br>
            </p>
            <p class="text-center">Admin?<br>
               <a href="<?= baseUrl('auth/login'); ?>" class="text-center">Login</a>
            </p>
         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <!-- jQuery -->
   <script src="<?= baseUrl('assets/admin/plugins/jquery/jquery.min.js'); ?>"></script>
   <!-- Bootstrap 4 -->
   <script src="<?= baseUrl('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <!-- AdminLTE App -->
   <script src="<?= baseUrl('assets/admin/dist/js/adminlte.min.js'); ?>"></script>

</body>

</html>