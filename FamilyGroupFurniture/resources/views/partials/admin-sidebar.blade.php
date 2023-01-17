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
        @if (session('role') === 'admin' || session('role') === 'mitra')
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

        @if (session('role') === 'admin')
        <li class="nav-item">
          <a href="{{ url('customer/list') }}" class="nav-link {{ isActive('customer/list*') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Customers</p>
          </a>
        </li>
        @endif

        @if (session('role') === 'mitra')
        {{--  --}}
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
