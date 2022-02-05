<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark"><?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <?php if ($subMenu != '') : ?>
                     <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
                     <li class="breadcrumb-item active"><?= $subMenu; ?></li>
                  <?php else : ?>
                     <li class="breadcrumb-item active"><?= $menu; ?></li>
                  <?php endif; ?>
               </ol>
            </div>
         </div>
      </div>
   </div>