<?php session_start();
if (!isset($_SESSION["login"])) {
   header("Location: ../../auth/login");
   exit();
}
// elseif (isset($_SESSION['login_mitra'])) {
//     header("Location: dashboard_mitra");
//     exit();
// }
$page = 'dashboard';
$subPage = null;
$idPage = 'd-1';
include_once "../../templates/admin_header.php";
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                  <div class="card-body">



                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../../templates/admin_footer.php"; ?>