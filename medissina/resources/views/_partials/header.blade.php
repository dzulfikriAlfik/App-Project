@section("custom-header")
<style>
</style>
@endsection

<header class="header-nav-center no_blur header__workspace active-blue" id="myNavbar">
  <div class="container">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light px-sm-0">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img class="logo" src="{{ asset('assets/images/logo-medissina.png') }}" alt="logo" />
      </a>

      <button class="navbar-toggler menu ripplemenu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg viewBox="0 0 64 48">
          <path d="M19,15 L45,15 C70,15 58,-2 49.0177126,7 L19,37"></path>
          <path d="M19,24 L45,24 C61.2371586,24 57,49 41,33 L32,24"></path>
          <path d="M45,33 L19,33 C-8,33 6,-2 22,14 L45,37"></path>
        </svg>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto nav-pills">
          <li class="nav-item">
            <a class="nav-link {{ activeClass($active, "home-page") }}" href="{{ url('/') }}">Home</a>
          </li>

          <li class="nav-item dropdown dropdown-hover {{ activeGroupClass("profile") }}">
            <a class="nav-link dropdown-toggle dropdown_menu" href="{{ routeToSection('profile', 'index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Profil
              <div class="icon_arrow">
                <i class="tio chevron_right"></i>
              </div>
            </a>
            <div class="dropdown-menu single-drop sm_dropdown" aria-labelledby="navbarDropdown" style="margin-top: -20px">
              <ul class="dropdown_menu_nav" style="margin-top: 20px">
                <li>
                  <a class="dropdown-item dropdown-profile" onclick="goToSection(this)" href="{{ url(routeToSection('profile', 'tentang')) }}" data-active="tentang">Profil Lembaga</a>
                </li>
                <li>
                  <a class="dropdown-item dropdown-profile" onclick="goToSection(this)" href="{{ url(routeToSection('profile', 'sejarah')) }}" data-active="sejarah">Sejarah</a>
                </li>
                <li>
                  <a class="dropdown-item dropdown-profile" onclick="goToSection(this)" href="{{ url(routeToSection('profile', 'visi')) }}" data-active="visi">Visi Misi</a>
                </li>
                <li>
                  <a class="dropdown-item dropdown-profile" onclick="goToSection(this)" href="{{ url(routeToSection('profile', 'struktur')) }}" data-active="struktur">Struktur Organisasi</a>
                </li>
                <li>
                  <a class="dropdown-item dropdown-profile" onclick="goToSection(this)" href="{{ url(routeToSection('profile', 'staff')) }}" data-active="staff">Staff</a>
                </li>
              </ul>
            </div>
          </li>

          {{-- <li class="nav-item dropdown dropdown-hover {{ activeGroupClass("siswa") }}">
          <a class="nav-link dropdown-toggle dropdown_menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kesiswaan
            <div class="icon_arrow">
              <i class="tio chevron_right"></i>
            </div>
          </a>
          <div class="dropdown-menu single-drop sm_dropdown" aria-labelledby="navbarDropdown" style="margin-top: -20px">
            <ul class="dropdown_menu_nav" style="margin-top: 20px">
              <li><a class="dropdown-item {{ activeClass($active, "kurikulum") }}" href="{{ url('/siswa/kurikulum') }}">Kurikulum dan Pembelajaran</a></li>
              <li><a class="dropdown-item {{ activeClass($active, "ekskul") }}" href="{{ url('/siswa/ekskul') }}">Ekstrakulikuler</a></li>
            </ul>
          </div>
          </li> --}}

          {{-- <li class="nav-item dropdown dropdown-hover {{ activeGroupClass("info") }}">
          <a class="nav-link dropdown-toggle dropdown_menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Informasi
            <div class="icon_arrow">
              <i class="tio chevron_right"></i>
            </div>
          </a>
          <div class="dropdown-menu single-drop sm_dropdown" aria-labelledby="navbarDropdown" style="margin-top: -20px">
            <ul class="dropdown_menu_nav" style="margin-top: 20px">
              <li><a class="dropdown-item {{ activeClass($active, "kontak") }}" href="{{ url('/info/kontak') }}">Kontak</a></li>
              <li><a class="dropdown-item {{ activeClass($active, "beasiswa") }}" href="{{ url('/info/beasiswa') }}">Beasiswa</a></li>
              <li><a class="dropdown-item {{ activeClass($active, "layanan") }}" href="{{ url('/info/layanan') }}">Layanan dan Fasilitas</a></li>
            </ul>
          </div>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link {{ activeClass($active, "kontak") }}" href="{{ url('/info/kontak') }}">Kontak</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ activeClass($active, "berita") }}" href="{{ url('/berita') }}">Berita</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ activeClass($active, "galeri") }}" href="{{ url('/galery') }}">Galeri</a>
          </li>
        </ul>

        <div class="nav_account btn_demo3">
          <a href="{{ url('/login') }}" class="btn btn_sm_primary scale bg-blue c-white rounded-8">
            Admin
          </a>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <!-- end container -->
</header>

@section("jquery")
<script>
  $(function () {
    toggleClass(true)
  })

  function toggleClass(refresh) {
    let dropDown = $(".dropdown-profile");

    dropDown.map(index => {
      const item = dropDown[index];

      $(item).removeClass("active")

      const url = window.location.href;
      const section = url.split("#")[1];
      const dataActive = $(item).data('active');

      if (refresh && dataActive == section) {
        $(item).addClass("active")
      }
    });
  }

  function goToSection(element) {
    toggleClass(false)

    $(element).addClass("active")
  }

</script>
@endsection
