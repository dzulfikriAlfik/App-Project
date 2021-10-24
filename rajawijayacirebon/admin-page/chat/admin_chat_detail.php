<?php session_start();
if (!isset($_SESSION["login"])) {
   header("Location: ../../auth/login");
   exit();
}


$page = 'mitra';
$subPage = 'chat';
$idPage = 'md-2';
include_once "../../templates/admin_header.php";
$id_mitra = $_GET['id'];
$chatMitra = query("SELECT * FROM chat WHERE id_mitra = '$id_mitra' ORDER BY id_chat DESC ");

?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Detail Chat Mitra</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="admin_chat">Chat</a></li>
                  <li class="breadcrumb-item active"><a href="#">Detail Chat</a></li>
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
            <div class="col-md-8">
               <div class="card card-primary card-outline">

                  <div class="card-header">
                     <a href="admin_chat" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                     <a href="admin_chat_balas?id=<?= $_GET['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-comment"></i> Balas</a>
                  </div>

                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped my-table">
                        <thead>
                           <tr>
                              <th>#`</th>
                              <th>Pesan</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($chatMitra as $chat) : ?>
                           <tr>
                              <td width="120" class="text-center"><?= $chat['tanggal']; ?></td>
                              <td width="650"><?= $chat['chat']; ?></td>
                              <td width="40">
                                 <?php if ($chat['id_admin'] != null) : ?>
                                 <a href="action/admin_hapus_chat.php?id=<?= $chat['id_chat']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')"> Hapus</a>
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
<?php include_once "../../templates/admin_footer.php"; ?>