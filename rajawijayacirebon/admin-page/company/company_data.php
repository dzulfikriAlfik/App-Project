<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$page = 'profile perusahaan';
$subPage = 'data perusahaan';
$idPage = 'cd-1';
include_once "../templates/header.php";
// require "../../koneksi.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Profile Perusahaan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Profile Perusahaan</a></li>
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

   <!-- Main content -->
   <?php 
   $companies = query("SELECT * FROM company_profile");
   ?>
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <?php foreach($companies as $rows) : ?>
            <div class="col-md-8 offset-md-2 col-xs-12">
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-thumbnail rounded w-50" src="<?= baseUrl('admin-page/assets/img/logo/'.$rows['logo']); ?>" alt="User profile picture">
                     </div>
                     <h2 class="text-center my-3 company-name"><?= $rows['company_name']; ?></h2>
                     <ul class="list-group list-group-unbordered mb-3">
                        <form action="company_ubah_data" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="logoLama" value="<?= $rows["logo"]; ?>">
                           <li class="list-group-item">
                              <div class="form-group">
                                 <label for="nama_company">Nama Perusahaan</label>
                                 <input type="text" name="nama_company" class="form-control col-md-12" id="nama_company" placeholder="Masukan Nama Perusahaan" value="<?= $rows['company_name']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <textarea disabled class="form-control col-md-12" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat"><?= $rows['address']; ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="telp">No. Telp</label>
                                 <input type="text" name="telp" class="form-control col-md-12" id="telp" placeholder="Masukan No. Telp" value="<?= $rows['telp']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="text" name="email" class="form-control col-md-12" id="email" placeholder="Masukan Email" value="<?= $rows['email']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="logo">Logo</label>
                                 <br>
                                 <img class="profile-user-img img-fluid img-circle mb-3" src="<?= baseUrl('admin-page/assets/img/logo/'.$rows['logo']); ?>" alt="Logo">
                                 <input type="file" name="logo" class="form-control col-md-12" id="logo" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="sejarah">Sejarah</label>
                                 <textarea disabled class="form-control col-md-12" name="sejarah" id="sejarah" rows="6" placeholder="Masukan Sejarah"><?= $rows['sejarah']; ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="visi">Visi</label>
                                 <textarea disabled class="form-control col-md-12" name="visi" id="visi" rows="6" placeholder="Masukan Sejarah"><?= $rows['visi']; ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="misi">Misi</label>
                                 <textarea disabled class="form-control col-md-12" name="misi" id="misi" rows="6" placeholder="Masukan Sejarah"><?= $rows['misi']; ?></textarea>
                              </div>
                           </li>
                            <button id="btn-simpan" class="btn btn-success mt-3 col-md-12 hide" value="submit" name="edit">Simpan</button>
                        </form>
                     </ul>

                     <a href="#" class="btn btn-primary btn-block" id="btn-company"><b>Edit</b></a>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../templates/footer.php"; ?>