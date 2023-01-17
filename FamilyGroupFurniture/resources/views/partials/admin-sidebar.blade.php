<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">Family Group Furniture</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="pb-3 mt-3 mb-3 user-panel d-flex">
      <div class="image">
        <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (session('role') === 'admin' || session('role') === 'customer' || session('role') === 'pemilik')
        <li class="nav-item">
          <a href="{{ url('') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Home Page</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('dashboard') }}" class="nav-link {{ isActive('dashboard') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @endif

        @if (session('role') === 'admin' || session('role') === 'pemilik')
        {{-- Data Customers --}}
        <li class="nav-item">
          <a href="{{ url('customer/list') }}" class="nav-link {{ isActive('customer/list*') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Customers</p>
          </a>
        </li>

        {{-- Data Produk --}}
        <li class="nav-item has-treeview {{ isMenuOpen("produk*") }}">
          <a href="#" class="nav-link {{ isActive("produk*") }}">
            <i class="nav-icon fas fa-file"></i>
            <p>Produk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive("produk/categories*") }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive("produk/unit*") }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Units</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link  {{ isActive("produk/item*") }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Items</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Data Transaksi --}}
        <li class="nav-item has-treeview {{ isMenuOpen('transaksi*') }}">
          <a href="#" class="nav-link {{ isActive('transaksi*') }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive('transaksi/penjualan*') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Penjualan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive('transaksi/stock-in*') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock In</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive('transaksi/stock-out*') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock Out</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Data Laporan --}}
        <li class="nav-item has-treeview {{ isMenuOpen('laporan*') }}">
          <a href="#" class="nav-link {{ isActive('laporan*') }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive('laporan/penjualan*') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Penjualan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ isActive('laporan/stok*') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock</p>
              </a>
            </li>
          </ul>
        </li>
        @endif

        @if (session('role') === 'customer')
        {{--  --}}
        @endif

        @if (session('role') === 'pemilik')
        <li class="nav-header">SETTING</li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ isActive('admin*') }}">
            <i class="nav-icon fas fa-user text-info"></i>
            <p>Admin</p>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a href="{{ url('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
