<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/rajawijaya/home-page/templates/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/rajawijaya/functions/function.php');

$row = query("SELECT * FROM company_profile");
$services = query("SELECT * FROM services");

?>

<!-- Begin bread crumbs -->
<nav class="bread-crumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <ul class="bread-crumbs-list">
               <li>
                  <a href="<?= baseUrl(''); ?>">Home</a>
                  <i class="material-icons md-18">chevron_right</i>
               </li>
               <li><a href="#!">Kontak</a></li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<!-- End bread crumbs -->

<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/rajawijaya/home-page/templates/footer.php'); ?>