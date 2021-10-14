<?php 
$page = 'profile perusahaan';
$subPage = 'data';
$idPage = 'cd-1';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/rajawijaya/admin-page/templates/header.php');

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
         <div class="col-md-12">
            <div class="alert alert-<?= $typeAlert; ?> alert-dismissible fade show" role="alert">
               <strong><?= $message; ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
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
   $rows = query("SELECT * FROM company_profile");
   ?>
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-8 offset-md-2 col-xs-12">
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= baseUrl('admin-page/assets/img/logo/'.$rows['logo']); ?>" alt="User profile picture">
                     </div>
                     <h2 class="text-center my-3 company-name"><?= $rows['company_name']; ?></h2>
                     <ul class="list-group list-group-unbordered mb-3">
                        <form action="">
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
                                 <input type="file" name="logo" class="form-control col-md-12" id="logo" value="" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="services">Bidang yang dikerjakan</label>
                                 <input type="text" name="services" class="form-control col-md-12" id="services" placeholder="Masukan Bidang yang dikerjakan" value="" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="sejarah">Sejarah</label>
                                 <textarea disabled class="form-control col-md-12" name="sejarah" id="sejarah" rows="6" placeholder="Masukan Sejarah"><?= $rows['sejarah']; ?></textarea>
                              </div>
                           </li>
                        </form>
                     </ul>

                     <a href="#" class="btn btn-primary btn-block" id="btn-company"><b>Edit</b></a>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php require_once($baseUrl . '/admin-page/templates/footer.php'); ?>