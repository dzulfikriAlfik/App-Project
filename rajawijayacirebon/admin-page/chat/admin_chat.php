<?php session_start();
if (!isset($_SESSION["login"])) {
   header("Location: ../../auth/login");
   exit();
}


$page = 'mitra';
$subPage = 'chat';
$idPage = 'md-2';
include_once "../../templates/admin_header.php";

// CONCAT (
//    TIMESTAMPDIFF(DAY,`tanggal`, NOW()),' Days ',
//    TIMESTAMPDIFF(HOUR, TIMESTAMPADD(DAY, TIMESTAMPDIFF(DAY, `tanggal`, NOW()), `tanggal`), NOW()),' Hours ',
//    TIMESTAMPDIFF(MINUTE, TIMESTAMPADD(HOUR, TIMESTAMPDIFF(HOUR, `tanggal`, NOW()), `tanggal`), NOW()), ' Minutes ',
//    TIMESTAMPDIFF(SECOND, TIMESTAMPADD(MINUTE, TIMESTAMPDIFF(MINUTE, `tanggal`, NOW()), `tanggal`), NOW()), ' Seconds '
//    ' ago' ) AS `ago` 

$mitras = query("SELECT * FROM mitra");

?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Chat Mitra</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Chat</a></li>
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
                     <a href="admin_kirim_chat" class="btn btn-sm btn-info"><i class="fas fa-paper-plane"></i> Kirim Pesan</a>
                  </div>

                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped my-table">
                        <thead>
                           <tr>
                              <th>Mitra</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($mitras as $chat) : ?>
                           <tr>
                              <td><?= $chat['mitra']; ?></td>
                              <td class="text-center">
                                 <a href="admin_chat_detail?id=<?= $chat['id_mitra']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Lihat</a>
                                 <!-- <a href="action/admin_hapus_chat?id=<?= $chat['id_mitra']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i> Hapus</a> -->
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