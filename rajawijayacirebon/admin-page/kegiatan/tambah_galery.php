<?php session_start();
if (!isset($_SESSION["login"])) {
   header("Location: ../../auth/login");
   exit();
}

$page = 'data kegiatan';
$subPage = 'daftar galery';
$idPage = 'keg-2';
include_once "../../templates/admin_header.php";
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Tambah Galery</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="daftar_galery">Daftar Galery</a></li>
                  <li class="breadcrumb-item active"><a href="#">Tambah Galery</a></li>
               </ol>
            </div>
         </div>
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
                     <a href="daftar_galery" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                     <form action="action/tambah_galery_aksi" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Pilih Kegiatan</label>
                           <select class="form-control select2bs4" name="id_kegiatan" id="id_kegiatan">
                              <option value="-">-</option>
                              <?php
                              $kegiatan = query("SELECT * FROM kegiatan");
                              foreach ($kegiatan as $value) :
                              ?>
                              <option value="<?= $value['id_kegiatan'] ?>"><?= $value['nama_kegiatan'] ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="foto">Foto</label>
                           <input type="file" name="foto" class="form-control col-md-12" id="foto">
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                           <button type="submit" name="tambah_galery" class="btn btn-primary">Submit</button>
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
<?php include_once "../../templates/admin_footer.php"; ?>