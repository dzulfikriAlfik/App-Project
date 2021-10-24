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
               <h1 class="m-0 text-dark">Galery Kegiatan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Galery Kegiatan</a></li>
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
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-outline">

                  <div class="card-header">
                     <a href="tambah_galery" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
                  </div>

                  <div class="card-body">

                     <div class="row">
                        <?php
                        $kegiatan = query("SELECT * FROM kegiatan JOIN galery_kegiatan ON kegiatan.id_kegiatan = galery_kegiatan.id_kegiatan ORDER BY kegiatan.tanggal DESC");

                        foreach ($kegiatan as $galery) :
                        ?>
                        <div class="col-md-4">
                           <div class="card mb-4 shadow-sm">
                              <img class="rounded img-fluid img-thumbnail" style="width:100%; height:55vh;" src="<?= baseUrl('assets/img/kegiatan/') . $galery['foto'] ?>">
                              <div class="card-body">
                                 <p class="card-text"><?= $galery['keterangan'] ?></p>
                                 <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                       <a href="action/hapus_galery?id=<?= $galery['id_galery_kegiatan'] ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-sm btn-danger">Hapus</a>
                                    </div>
                                    <small class="text-muted"><?= tgl_indo($galery['tanggal']) ?></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../../templates/admin_footer.php"; ?>