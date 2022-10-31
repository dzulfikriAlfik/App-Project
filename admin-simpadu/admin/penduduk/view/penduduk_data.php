<?php 
session_start();
$page = 'data penduduk';
$subPage = 'tabel data penduduk';
$idPage = 'dp-1.1';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/templates/header.php');

$penduduk = query("SELECT * FROM tbl_penduduk");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Data Penduduk</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Data Penduduk</a></li>
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
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <a href="penduduk_tambah" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Status</th>
                              <th>Mutasi</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $no = 1;
                           foreach($penduduk as $pend) : ?>
                           <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $pend['nik']; ?></td>
                              <td><?= $pend['nama']; ?></td>
                              <td><?= ($pend['kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
                              <td><?= ($pend['id_status'] == 1 ? 'Hidup' : 'Meninggal'); ?></td>
                              <td><?= checkMutasi($pend['id_mutasi']); ?></td>
                              <td>
                                 <a href="penduduk_detail?id=<?= $pend['id_penduduk']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-info-circle"></i> Detail</a>
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

<?php require_once($baseUrl . '/templates/footer.php'); ?>