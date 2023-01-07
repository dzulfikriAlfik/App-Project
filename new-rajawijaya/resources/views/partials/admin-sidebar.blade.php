<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Rajawijaya</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="pb-3 mt-3 mb-3 user-panel d-flex">
      <div class="image">
        <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ $user->nama }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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

        <!-- MENU DATA PERUSAHAAN -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Data Perusahaan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/company-profile') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil Perusahaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/admin-data') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Admin</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- MENU MITRA -->
        {{-- kasih class menu-open di nav-item has-treeview --}}
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-handshake"></i>
            <p>Mitra
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/mitra/mitra-data') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Mitra</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/chat/admin_chat') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chat</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- MENU KEGIATAN -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-hard-hat"></i>
            <p>Kegiatan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/kegiatan/kegiatan-data') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Kegiatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/kegiatan/daftar_galery') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Galery</p>
              </a>
            </li>
          </ul>
        </li>
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
