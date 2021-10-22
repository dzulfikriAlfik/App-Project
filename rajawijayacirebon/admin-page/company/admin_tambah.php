<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$page = 'profile perusahaan';
$subPage = 'data admin';
$idPage = 'cd-2';
include_once "../templates/header.php";
// include_once "../../koneksi.php";
$nama_admin = $_SESSION['nama_admin'];
$id_admin = $_SESSION['id_admin'];
$admin = query("SELECT * FROM admin WHERE nama_admin !='$nama_admin' ");
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Tambah Data Admin</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="company_data">Profil Perusahaan</a></li>
                  <li class="breadcrumb-item"><a href="admin_data">Data Admin</a></li>
                  <li class="breadcrumb-item active"><a href="#">Tambah Data Admin</a></li>
               </ol>
            </div>
         </div>
         <!-- alert -->
         <?php
         if (isset($_SESSION['alert'])) : 
         $message   = $_SESSION['message'];
         $typeAlert = $_SESSION['type'];
         ?>
         <div class="row">
             <div class="col-md-12">
                <div class="alert alert-<?= $typeAlert; ?> alert-dismissible fade show" role="alert">
                   <strong><?= $message; ?></strong>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
                </div>
             </div>
         </div>
         <?php 
         unset($_SESSION['alert']);
         endif; ?>
         <!-- EndAlert -->
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-outline">
                  
                    <div class="card-header">
                        <a href="admin_data" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                    </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                        <form action="admin_tambah_aksi" method="POST">
                            <div class="form-group">
                              <label for="nama_lengkap">Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <textarea class="form-control col-md-12" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat" required></textarea>
                              </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                              <label for="telp">No. Telp</label>
                              <input type="telp" class="form-control" name="telp" id="telp" placeholder="Masukkan No. Telp" required>
                            </div>
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                            </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" name="admin_tambah" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../templates/footer.php"; ?>