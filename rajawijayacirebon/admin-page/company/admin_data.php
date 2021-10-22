<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
} 

$page = 'profile perusahaan';
$subPage = 'data admin';
$idPage = 'cd-2';
include_once "../templates/header.php";
// include_once "../../koneksi.php";
$nama_admin = $_SESSION['nama_admin'];
$id_admin = $_SESSION['id_admin'];
$admin = query("SELECT * FROM admin WHERE nama_admin !='$nama_admin' ");
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Data Admin</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/company_data">Profil Perusahaan</a></li>
                  <li class="breadcrumb-item text-muted"><a href="#">Data Admin</a></li>
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
                    <?php if($_SESSION['id_admin'] == 1) : ?>
                    <div class="card-header">
                        <a href="admin_tambah" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                    <?php else : ?>
                        
                    <?php endif; ?>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped my-table">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Nama Admin</th>
                              <th>Alamat</th>
                              <th>No. Telp.</th>
                              <th>Email</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            // var_dump($admin);die;
                            $no = 1;
                            foreach($admin as $value) :
                            ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $value['nama_admin'] ?></td>
                              <td><?= $value['alamat'] ?></td>
                              <td><?= $value['telp'] ?></td>
                              <td><?= $value['email'] ?></td>
                              <td class="text-center">
                                <?php if($id_admin != 1) : ?>
                                    anda bukan superadmin
                                <?php elseif($id_admin == 1) : ?>
                                    <a href="admin_edit?id=<?= $value['id_admin']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="admin_hapus?id=<?= $value['id_admin']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                <?php endif; ?>
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