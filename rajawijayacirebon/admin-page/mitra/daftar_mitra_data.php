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
               <h1 class="m-0 text-dark">Daftar Mitra</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Daftar Mitra</a></li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped my-table">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Mitra</th>
                              <th>Email</th>
                              <th>No. Telp.</th>
                              <th>Alamat</th>
                              <th>Setujui</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($mitra as $value) :
                            ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $value['mitra'] ?></td>
                              <td><?= $value['email'] ?></td>
                              <td><?= $value['telp'] ?></td>
                              <td><?= $value['alamat'] ?></td>
                              <td>
                                  <?php if($value['approve'] == 'no') : ?>
                                  <a href="approve_mitra?id=<?= $value['id_mitra']; ?>">Setujui</a>
                                  <?php else :?>
                                    Terdaftar
                                  <?php endif; ?>
                              </td>
                              <td class="text-center">
                                 <a href="detail_mitra?id=<?= $value['id_mitra'] ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Detail</a>
                                 <a href="hapus_mitra?id=<?= $value['id_mitra'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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