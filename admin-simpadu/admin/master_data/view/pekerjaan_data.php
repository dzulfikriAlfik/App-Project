<?php 
session_start();
$page = 'master data';
$subPage = 'pekerjaan';
$idPage = 'md-4';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/templates/header.php');

$pekerjaan = query("SELECT * FROM tbl_pekerjaan");
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Pekerjaan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Pekerjaan</a></li>
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
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-outline">
                  <div class="card-header">
                     <a href="pekerjaan_tambah" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
                  </div>
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Pekerjaan</th>
                              <th width="170px">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $no = 1;
                           foreach($pekerjaan as $job) : ?>
                           <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $job['pekerjaan']; ?></td>
                              <td class="text-center">
                                 <a href="pekerjaan_edit?id=<?= $job['id_pekerjaan']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                 <a href="../aksi/pekerjaan_delete?id=<?= $job['id_pekerjaan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?') "><i class="fas fa-trash"></i> Delete</a>
                              </td>
                           </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php require_once($baseUrl . '/templates/footer.php'); ?>