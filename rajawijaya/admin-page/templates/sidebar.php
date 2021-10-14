<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="#" class="brand-link">
      <img src="<?= baseUrl('admin-page/assets/bootstrap/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIMPADU</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
         <div class="image">
            <img src="<?= baseUrl('admin-page/assets/bootstrap/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">Nama Admin</a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?= checkLink($page, 'dashboard', 'admin-page/dashboard') ?>" class="nav-link <?= addClass($page, 'dashboard', 'active') ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <?php 
               $masterDataPage = null;
               if(($subPage == 'data' && $idPage == 'cd-1') || $subPage == 'admin') {
                  $masterDataPage = $page;
               }
            ?>
            <li class="nav-item has-treeview <?= addClass($page, $masterDataPage, 'menu-open'); ?>">
               <a href="#" class="nav-link <?= addClass($page, $masterDataPage, 'active'); ?>">
                  <i class="nav-icon fas fa-building"></i>
                  <p>Data Perusahaan
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= checkLink($page, 'profile perusahaan', 'admin-page/company/company_data'); ?>" class="nav-link <?= addClassDropDown($page, $masterDataPage, $idPage, 'cd-1', 'active'); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profil Perusahaan</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Admin</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview <?= addClass($page, 'data penduduk', 'menu-open'); ?>">
               <a href="#" class="nav-link <?= addClass($page, 'data penduduk', 'active'); ?>">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>Mitra
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= checkLink($page, 'data penduduk', 'admin/penduduk/view/penduduk_data'); ?>" class="nav-link <?= addClass($page, 'data penduduk', 'active'); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profil Mitra</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Chat</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="<?= checkLink($page, 'manajemen akses', 'admin-page/kegiatan') ?>" class="nav-link <?= addClass($page, 'manajemen akses', 'active') ?>">
                  <i class="nav-icon fas fa-hard-hat"></i>
                  <p>Data Kegiatan</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?= baseUrl('admin-page/auth/logout'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>
         </ul>
      </nav>

</aside>