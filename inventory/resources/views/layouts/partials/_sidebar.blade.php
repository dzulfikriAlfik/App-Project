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
            <li class="nav-item">
               <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('suppliers.index') }}" class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}">
                  <i class="far fa-handshake nav-icon"></i>
                  <p> Suplier</p>
               </a>
            </li>
            @php
            $menu_data_barang = [
            'pembelian*',
            'produks*',
            'produk-masuk*',
            'produk-keluar*',
            'permintaan-produk*'
            ]
            @endphp
            <li class="nav-item {{ Request::is($menu_data_barang) ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is($menu_data_barang) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Data Barang
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('pembelian.index') }}" class="nav-link {{ Request::is('pembelian*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('produk-masuk.index') }}" class="nav-link {{ Request::is('produk-masuk*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penerimaan Barang</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('produks.index') }}" class="nav-link {{ Request::is('produks*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data barang</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('produk-keluar.index') }}" class="nav-link {{ Request::is('produk-keluar*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Barang Keluar</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
               </a>
            </li>
            <li class="nav-item">
               {{-- <a href="/logout" class="nav-link">
                  <i class="nav-icon fa fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a> --}}
               {{-- <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="nav-link d-flex" onclick="return confirm('Anda yakin ingin logout?')">
                     <i class="nav-icon fa fa-sign-out-alt"></i> Logout
                  </button>
               </form> --}}
            </li>
         </ul>
         <br><br><br><br>
      </nav>
   </div>
   <!-- /.sidebar -->
</aside>
