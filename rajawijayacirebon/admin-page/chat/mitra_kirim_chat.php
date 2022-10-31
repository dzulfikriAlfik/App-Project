<?php session_start();
if (!isset($_SESSION["login_mitra"])) {
   header("Location: ../../auth/login_mitra");
   exit();
} elseif (isset($_SESSION['login'])) {
   header("Location: dashboard");
   exit();
}
$page = 'chat mitra';
$subPage = null;
$idPage = 'd-1';
include_once "../../templates/admin_header_mitra.php";
$id_mitra = $_SESSION['id_mitra'];
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Kirim Chat</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="mitra_chat"> Chat</a></li>
                  <li class="breadcrumb-item active"><a href="#">Kirim Chat</a></li>
               </ol>
            </div>
         </div>
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
                     <a href="mitra_chat" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                  </div>

                  <div class="card-body">
                     <form action="action/mitra_kirim_chat_aksi" method="POST">
                        <div class="form-group">
                           <label for="chat">Masukan isi pesan</label>
                           <textarea class="form-control col-md-12" name="chat" id="chat" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-primary" type="submit" name="kirim_chat"><i class="fas fa-paper-plane"></i> Kirim</button>
                        </div>
                     </form>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../../templates/admin_footer_mitra.php"; ?>