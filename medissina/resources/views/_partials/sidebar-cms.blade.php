<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Admin
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Homepage</li>
      <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Homepage</span>
        </a>
      </li>
      <li class="nav-item nav-category">Menu</li>
      <li class="nav-item">
        <a href="{{ url('/cms/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/cms/profile_lembaga') }}" class="nav-link">
          <i class="link-icon" data-feather="airplay"></i>
          <span class="link-title">Profil Lembaga</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/cms/gallery') }}" class="nav-link">
          <i class="link-icon" data-feather="camera"></i>
          <span class="link-title">Foto kegiatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/cms/users') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Users</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
