<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="#" class="brand-link">
      <img src="<?= baseUrl('assets/bootstrap/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIMPADU</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
         <div class="image">
            <img src="<?= baseUrl('assets/bootstrap/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">Nama Admin</a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?= checkLink($page, 'dashboard', 'admin/dashboard.php') ?>" class="nav-link <?= addClass($page, 'dashboard', 'active') ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item has-treeview <?= addClass($page, 'data penduduk', 'menu-open'); ?>">
               <a href="#" class="nav-link <?= addClass($page, 'data penduduk', 'active'); ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Penduduk
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= checkLink($page, 'data penduduk', 'admin/penduduk/view/penduduk_data.php'); ?>" class="nav-link <?= addClass($page, 'data penduduk', 'active'); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Penduduk</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Kelahiran</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Kematian</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview <?= addClass($page, 'agama', 'menu-open'); ?>">
               <a href="#" class="nav-link <?= addClass($page, 'agama', 'active'); ?>">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Master Data
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= checkLink($page, 'agama', 'admin/data_agama.php'); ?>" class="nav-link <?= addClass($page, 'agama', 'active'); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Agama</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Klasifikasi</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="<?= checkLink($page, 'manajemen akses', 'admin/manajemen_akses.php') ?>" class="nav-link <?= addClass($page, 'manajemen akses', 'active') ?>">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>Manajemen Akses</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?= checkLink($page, 'profil desa', 'admin/profil_desa.php') ?>" class="nav-link <?= addClass($page, 'profil desa', 'active') ?>">
                  <i class="nav-icon fas fa-id-card"></i>
                  <p>Profil Desa</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?= baseUrl('logout.php'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>
         </ul>
      </nav>

</aside>