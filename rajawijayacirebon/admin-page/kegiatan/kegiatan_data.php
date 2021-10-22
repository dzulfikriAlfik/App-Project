<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}


$page = 'data kegiatan';
$subPage = 'daftar kegiatan';
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
               <h1 class="m-0 text-dark">Daftar Kegiatan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Daftar Kegiatan</a></li>
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
                        <a href="tambah_kegiatan" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped my-table">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Nama Kegiatan</th>
                              <th>Kegiatan</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kegiatan = query("SELECT * FROM kegiatan");
                            foreach($kegiatan as $value) :
                            ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $value['nama_kegiatan'] ?></td>
                              <td><?= $value['keterangan'] ?></td>
                              <td><?= tgl_indo($value['tanggal']); ?></td>
                              <td class="text-center">
                                 <a href="edit_kegiatan?id=<?= $value['id_kegiatan'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                 <a href="hapus_kegiatan?id=<?= $value['id_kegiatan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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
<?php include_once "../templates/footer.php"; ?>