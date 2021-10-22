<?php session_start();
if(isset($_SESSION['login'])) {
    header("Location: dashboard");
    exit();
} elseif (isset($_SESSION['login_mitra'])) {
    header("Location: dashboard_mitra");
    exit();
}
include_once "../../koneksi.php";
$company = query("SELECT * FROM company_profile");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Raja Wijaya Cirebon | Daftar mitra</title>

   <link rel="icon" href="../../admin-page/assets/img/logo/<?= $company['logo'] ?>" type="image/x-icon">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="admin-page/assets/bootstrap/plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="admin-page/assets/bootstrap/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="admin-page/assets/bootstrap/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="#"><b>Daftar</b> Mitra</a>
      </div>
      
         <?php if(isset($_SESSION["alert"])) :
         $message   = $_SESSION["message"];
         $type   = $_SESSION["type"];
        ?>
        <div class="alert alert-<?= $type ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-<?= ($type == "success") ? 'check' : 'ban' ?>"></i> <?= $message ?>!</h5>
        </div>
        <?php
        unset($_SESSION["alert"]); 
        endif; ?>
      
      <!-- /.login-logo -->
      <div class="card">
         <div class="card-body login-card-body">
            <p class="login-box-msg">Daftar untuk mendapatkan akun login</p>

            <form action="daftar_mitra_aksi" method="post" enctype="multipart/form-data">
               <div class="mb-3 input-group">
                  <input type="text" name="nama_mitra" class="form-control" placeholder="Nama Mitra" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="mb-3 input-group">
                   <textarea class="form-control col-md-12" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat" required></textarea>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-location-arrow"></span>
                     </div>
                  </div>
               </div>
               <div class="mb-3 input-group">
                  <input type="text" name="telp" class="form-control" placeholder="No. Telp" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                     </div>
                  </div>
               </div>
               <div class="mb-3 input-group">
                  <input type="text" class="form-control" name="email" placeholder="Email" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="mb-3 input-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user-shield"></span>
                     </div>
                  </div>
               </div>
               <div class="mb-3 input-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                 <label for="logo">Logo</label>
                 <br>
                 <input type="file" name="logo" class="form-control col-md-12" id="logo">
              </div>
               <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12">
                     <button type="submit" value="daftar_mitra" name="daftar_mitra" class="btn btn-primary btn-block">Daftar</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <p class="my-3 text-center">
               <a href="http://rajawijayacirebon.site" class="text-center">Back to Homepage</a>
            </p>
            <p class="text-center">Sudah punya akun?
               <a href="http://rajawijayacirebon.site/login_mitra" class="text-center">Login</a>
            </p>
         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <!-- jQuery -->
   <script src="admin-page/assets/bootstrap/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="admin-page/assets/bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="admin-page/assets/bootstrap/dist/js/adminlte.min.js"></script>

</body>

</html>