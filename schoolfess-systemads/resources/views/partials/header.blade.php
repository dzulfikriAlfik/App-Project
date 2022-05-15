<header class="wrapper bg-light">
  <nav class="navbar classic transparent navbar-expand-lg navbar-light">
    <div class="container flex-lg-row flex-nowrap align-items-center">
      <div class="navbar-brand w-100"><a href="/"><img src="{{ asset('img/jdihn-logo.png') }}" srcset="{{ asset('img/jdihn-logo.png') }} 2x" alt="" width="250px" /></a></div>
      <div class="navbar-collapse offcanvas-nav">
        <div class="offcanvas-header d-lg-none d-xl-none">
          <a href="/"><img src="{{ asset('img/jdihn-logo-white.png') }}" srcset="{{ asset('img/jdihn-logo-white.png') }} 2x" alt="" width="250px" /></a>
          <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link {{ ($title === 'Beranda') ? 'active' : '' }}" href="/">Beranda</a></li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle {{ ($title === 'Profil') ? 'active' : '' }}" href="#!">Profil</a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a class="dropdown-item" href="/profil/selayang-pandang">Selayang Pandang</a></li>
              <li class="nav-item"><a class="dropdown-item" href="/profil/visi-misi">Visi & Misi</a></li>
              <li class="nav-item"><a class="dropdown-item" href="/profil/struktur-organisasi">Struktur Organisasi</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle {{ ($title === 'Dokumen') ? 'active' : '' }}" href="#!">Dokumen Hukum</a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a class="dropdown-item" href="/dokumen/peraturan-daerah">Peraturan Daerah</a></li>
              <li class="nav-item"><a class="dropdown-item" href="/dokumen/peraturan-gubernur">Peraturan Gubernur</a></li>
              <li class="nav-item"><a class="dropdown-item" href="/dokumen/peraturan-bersama-gubernur">Peraturan Bersama Gubernur</a></li>
              <li class="nav-item"><a class="dropdown-item" href="/dokumen/peraturan-dprd">Peraturan DPRD</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link {{ ($title === 'Galeri') ? 'active' : '' }}" href="/galeri">Galeri</a></li>
          <li class="nav-item"><a class="nav-link {{ ($title === 'Kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
          
        </ul>
        <!-- /.navbar-nav -->
      </div>            
      <!-- /.navbar-collapse -->
      <div class="navbar-other ms-lg-4">
        <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
          <li class="nav-item"><a class="nav-link" data-toggle="offcanvas-info"><i class="uil uil-info-circle"></i></a></li>
          @if (Session::has('login'))
            <li class="nav-item"><a class="nav-link active" href="/cms">Admin</a></li>
            <li class="nav-item d-none d-md-block">
              <a href="#" onclick="logout()" class="btn btn-sm btn-primary rounded">Logout</a>
            </li>
            <li class="nav-item ms-lg-0">
              <div class="navbar-hamburger d-lg-none d-xl-none ms-auto"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
            </li>
          @else
            <li class="nav-item"><a class="nav-link {{ ($title === 'Login') ? 'active' : '' }}" href="/login">Login</a></li>
            <li class="nav-item d-none d-md-block">
              <a href="/register" class="btn btn-sm btn-primary rounded">Register</a>
            </li>
            <li class="nav-item ms-lg-0">
              <div class="navbar-hamburger d-lg-none d-xl-none ms-auto"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
            </li>
          @endif
        </ul>
        <!-- /.navbar-nav -->
      </div>
      <!-- /.navbar-other -->
    </div>
    <!-- /.container -->
  </nav>
  <!-- /.navbar -->
  
</header>
<!-- /header -->  