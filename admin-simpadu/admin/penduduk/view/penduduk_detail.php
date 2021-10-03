<?php 
session_start();
$page = 'data penduduk';
$subPage = ' | Detail penduduk';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/templates/header.php');

$id_penduduk = $_GET['id'];
$pend = query("SELECT * FROM tbl_penduduk WHERE id_penduduk = $id_penduduk");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Detail Data Penduduk</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="penduduk_data.php">Data Penduduk</a></li>
                  <li class="breadcrumb-item">Detail Data Penduduk</li>
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
               <div class="card card-primary">
                  <div class="card-header">
                     <a href="penduduk_data.php" class="btn btn-sm btn-warning text-dark"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                     <div class="row p-3">
                        <div class="col-md-4">
                           <div>
                              <strong><i class="fas fa-book mr-1"></i> NIK</strong>
                              <p class="text-muted"><?= $pend['nik']; ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-book-reader mr-1"></i> Nomor Kartu Keluarga</strong>
                              <p class="text-muted"><?= $pend['no_kk'] ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-user mr-1"></i> Nama</strong>
                              <p class="text-muted"><?= $pend['nama']; ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
                              <p class="text-muted"><?= ($pend['kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div>
                              <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                              <p class="text-muted"><?= $pend['tempat_lahir']; ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-map-marked-alt mr-1"></i> Alamat</strong>
                              <p class="text-muted"><?= $pend['alamat']; ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-mosque mr-1"></i> Agama</strong>
                              <p class="text-muted"><?= getNama($pend['id_agama'], 'tbl_agama', 'id_agama', 'agama'); ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-flag mr-1"></i> Kewarganegaraan</strong>
                              <p class="text-muted"><?= $pend['kewarganegaraan'] ?></p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div>
                              <strong><i class="fas fa-tint mr-1"></i> Golongan Darah</strong>
                              <p class="text-muted"><?= $pend['golongan_darah']; ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-user-md mr-1"></i> Pekerjaan</strong>
                              <p class="text-muted"><?= $pend['pekerjaan']; ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-question-circle mr-1"></i> Status</strong>
                              <p class="text-muted"><?= getNama($pend['id_status'], 'tbl_status', 'id_status', 'status'); ?></p>
                           </div>
                           <div>
                              <strong><i class="fas fa-suitcase-rolling mr-1"></i> Mutasi</strong>
                              <p class="text-muted"><?= getNama($pend['id_mutasi'], 'tbl_mutasi', 'id_mutasi', 'mutasi'); ?></p>
                           </div>
                        </div>
                     </div>
                     <div class="row text-center">
                        <div class="col-md-12">
                           <hr>
                           <a href="penduduk_edit.php?id=<?= $pend['id_penduduk']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                           <a href="../aksi/delete.php?id=<?= $pend['id_penduduk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data <?= $pend['nama']; ?> ?\n NIK : <?= $pend['nik']; ?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- /.content-wrapper -->

<?php require_once($baseUrl . '/templates/footer.php'); ?>