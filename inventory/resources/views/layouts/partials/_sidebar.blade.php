<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">
      <img src="{{ asset("assets/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Inventory</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
            <li class="nav-item">
               <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            {{-- <li class="nav-item menu-open"> --}}
            <li class="nav-item {{ Request::is('pembelian*') ? 'menu-open' : '' }}">
               {{-- <a href="#" class="nav-link active"> --}}
               <a href="#" class="nav-link {{ Request::is('pembelian*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Data Barang
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="/supliers" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Suplier</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     {{-- <a href="/pembelians" class="nav-link active"> --}}
                     <a href="{{ route('pembelian.index') }}" class="nav-link {{ Request::is('pembelian*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/data_barangs" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data barang</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/rcv_barang_masuks" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penerimaan Barang</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/barang_keluars" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Barang Keluar</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/permintaan_produksis" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Permintaan Produksi</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/users" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
         <br><br><br><br>
      </nav>
   </div>
   <!-- /.sidebar -->
</aside>
