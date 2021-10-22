<?php 
session_start();
$page = 'data penduduk';
$subPage = 'tambah data penduduk';
$idPage = 'md-4';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/templates/header.php');
$id_pekerjaan = $_GET['id'];
$job   = query("SELECT * FROM tbl_pekerjaan WHERE id_pekerjaan = $id_pekerjaan");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Tambah Data Pekerjaan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="penduduk_data">Data Jenis Pekerjaan</a></li>
                  <li class="breadcrumb-item">Tambah Data Pekerjaan</li>
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
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row d-flex justify-content-center">
            <div class="col-md-6">
               <div class="card card-primary">
                  <div class="card-header">
                     <a href="pekerjaan_data" class="btn btn-sm btn-warning text-dark"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="pekerjaanValidator" method="post" action="<?= baseUrl('admin/master_data/aksi/pekerjaan_update'); ?>">
                     <input class="form-control" type="hidden" name="id_pekerjaan" value="<?= $job['id_pekerjaan']; ?>">
                     <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-12">
                              <label for="pekerjaan">Jenis Pekerjaan</label>
                              <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Masukan Jenis Pekerjaan" value="<?= $job['pekerjaan']; ?>">
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- /.content-wrapper -->
<?php require_once($baseUrl . '/templates/footer.php'); ?>