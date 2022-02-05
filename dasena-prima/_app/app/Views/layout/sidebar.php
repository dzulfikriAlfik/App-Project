<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
      <img src="<?= base_url('bootstrap/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dasena</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
         <div class="image">
            <img src="<?= base_url('bootstrap/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">Dzulfikri</a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Menu
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Active Page</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inactive Page</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="/" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>
         </ul>
      </nav>
   </div>
</aside>