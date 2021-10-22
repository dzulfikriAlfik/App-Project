<?php 
session_start();
$page = 'data penduduk';
$subPage = 'detail data penduduk';
$idPage = 'dp-1.2';
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
                  <li class="breadcrumb-item"><a href="penduduk_data">Data Penduduk</a></li>
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
                     <a href="penduduk_data" class="btn btn-sm btn-warning text-dark"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                     <div class="p-3 row">
                        <div class="col-md-4">
                           <div>
                              <strong><i class="mr-1 fas fa-user"></i> Nama</strong>
                              <p class="text-muted"><?= $pend['nama']; ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-book"></i> NIK</strong>
                              <p class="text-muted"><?= $pend['nik']; ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-book-reader"></i> Nomor Kartu Keluarga</strong>
                              <p class="text-muted"><?= $pend['no_kk'] ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-venus-mars"></i> Jenis Kelamin</strong>
                              <p class="text-muted"><?= ($pend['kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div>
                              <strong><i class="mr-1 fas fa-map-marker-alt"></i> Tempat Tanggal Lahir</strong>
                              <p class="text-muted"><?= $pend['tempat_lahir'] . ", " . date('d-m-Y', strtotime($pend['tanggal_lahir'])); ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-map-marked-alt"></i> Alamat</strong>
                              <p class="text-muted"><?= $pend['alamat']; ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-mosque"></i> Agama</strong>
                              <p class="text-muted"><?= getNama($pend['id_agama'], 'tbl_agama', 'id_agama', 'agama'); ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-flag"></i> Kewarganegaraan</strong>
                              <p class="text-muted"><?= $pend['kewarganegaraan'] ?></p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div>
                              <strong><i class="mr-1 fas fa-tint"></i> Golongan Darah</strong>
                              <p class="text-muted"><?= $pend['golongan_darah']; ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-user-md"></i> Pekerjaan</strong>
                              <p class="text-muted"><?= getNama($pend['id_pekerjaan'], 'tbl_pekerjaan', 'id_pekerjaan', 'pekerjaan'); ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-question-circle"></i> Status</strong>
                              <p class="text-muted"><?= getNama($pend['id_status'], 'tbl_status', 'id_status', 'status'); ?></p>
                           </div>
                           <div>
                              <strong><i class="mr-1 fas fa-suitcase-rolling"></i> Mutasi</strong>
                              <p class="text-muted"><?= getNama($pend['id_mutasi'], 'tbl_mutasi', 'id_mutasi', 'mutasi'); ?></p>
                           </div>
                        </div>
                     </div>
                     <div class="text-center row">
                        <div class="col-md-12">
                           <hr>
                           <a href="penduduk_edit?id=<?= $pend['id_penduduk']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                           <a href="../aksi/penduduk_delete?id=<?= $pend['id_penduduk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data <?= $pend['nama']; ?> ?\n NIK : <?= $pend['nik']; ?>')"><i class="fas fa-trash"></i> Hapus</a>
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