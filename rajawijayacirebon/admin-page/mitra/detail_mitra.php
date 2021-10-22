<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
} elseif (isset($_SESSION['login_mitra'])) {
    header("Location: dashboard_mitra");
    exit();
}


$page = 'mitra';
$subPage = 'daftar mitra';
$idPage = 'md-1';
include_once "../templates/header.php";
// include_once '../../koneksi.php';

$mitra = query("SELECT * FROM mitra");

?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Detail Mitra</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="daftar_mitra_data">Daftar Mitra</a></li>
                  <li class="breadcrumb-item"><a href="#">Detail Mitra</a></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="card-header">
        <a href="daftar_mitra_data" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
    </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <?php 
   $id_mitra = $_GET['id'];
   $mitras = query("SELECT * FROM mitra WHERE id_mitra = '$id_mitra' ");
   ?>
   <div class="content">
      <div class="container-fluid">
        <div class="row">
            <?php foreach($mitras as $mitra) : ?>
            <div class="col-md-8 offset-md-2 col-xs-12">
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-thumbnail rounded w-50" src="<?= baseUrl('admin-page/assets/img/mitra/'.$mitra['logo']); ?>" alt="User profile picture">
                     </div>
                     <h2 class="text-center my-3 company-name"><?= $mitra['mitra']; ?></h2>
                     <ul class="list-group list-group-unbordered mb-3">
                        <form action="edit_mitra_aksi" method="POST" enctype="multipart/form-data">
                           <li class="list-group-item">
                              <div class="form-group">
                                 <label for="nama_mitra">Nama Mitra</label>
                                 <input type="text" name="nama_mitra" class="form-control col-md-12" id="nama_mitra" placeholder="Masukan Nama Mitra" value="<?= $mitra['mitra']; ?>" disabled>
                                 <input type="hidden" name="id_mitra" class="form-control col-md-12" id="id_mitra" value="<?= $mitra['id_mitra']; ?>" disabled>
                                 <input type="hidden" name="logoLama" class="form-control col-md-12" id="logoLama" value="<?= $mitra['logo']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <textarea disabled class="form-control col-md-12" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat"><?= $mitra['alamat']; ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="telp">No. Telp</label>
                                 <input type="text" name="telp" class="form-control col-md-12" id="telp" placeholder="Masukan No. Telp" value="<?= $mitra['telp']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="text" name="email" class="form-control col-md-12" id="email" placeholder="Masukan Email" value="<?= $mitra['email']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="logo">Logo</label>
                                 <br>
                                 <img class="profile-user-img img-fluid img-circle mb-3" src="<?= baseUrl('admin-page/assets/img/mitra/'.$mitra['logo']); ?>" alt="Logo">
                                 <input type="file" name="logo" class="form-control col-md-12" id="logo" value="" disabled>
                              </div>
                           </li>
                            <button id="btn-simpan" class="btn btn-success mt-3 col-md-12 hide" value="submit" name="edit_mitra">Simpan</button>
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