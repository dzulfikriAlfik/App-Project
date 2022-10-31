<?php 
$page = 'dashboard';
$subPage = null;
$idPage = 'd-1';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/rajawijaya/admin-page/templates/header.php');
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

                     <div class="card-body pad">
                        <div class="mb-3">
                           <textarea class="textarea"
                              placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                           </textarea>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php require_once($baseUrl . '/admin-page/templates/footer.php'); ?>