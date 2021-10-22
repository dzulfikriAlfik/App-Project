<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}


$page = 'data kegiatan';
$subPage = null;
$idPage = 'keg-1';
include_once "../templates/header.php";
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Detail Kegiatan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="daftar_kegiatan_data">Daftar Kegiatan</a></li>
                  <li class="breadcrumb-item"><a href="#" class="text-muted">Detail Kegiatan</a></li>
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
                  <div class="card-body">

                    
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../templates/footer.php"; ?>