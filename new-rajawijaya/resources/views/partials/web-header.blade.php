<!-- Begin header -->
<header class="header">
  <!-- Begin header top -->
  <nav class="header-top">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-auto">
          <!-- Begin header top info -->
          <ul class="header-top-info">
            <li>
              <a href="mailto:{{ $company->email }}">
                <i class="material-icons md-18">mail_outline</i>
                <span>{{ $company->email }}</span>
              </a>
            </li>
            <li>
              <a href="mailto:{{ $company->telp }}" class="formingHrefTel">
                <i class="material-icons md-18">phone_in_talk</i>
                <span>{{ $company->telp }}</span>
              </a>
            </li>
          </ul><!-- Ennd header top info -->
        </div>
        <div class="col-auto">
          <div class="header-top-links">
            <!-- Begin social links -->
            <ul class="social-links">
              <li>
                <a href="https://facebook.com/{{ $company->facebook }}" target="_blank" title="Facebook">
                  <svg viewBox="0 0 320 512">
                    <use xlink:href="{{ asset('assets/web/img/sprite.svg#facebook-icon') }}"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://instagram.com/{{ $company->instagram }}" target="_blank" title="Instagram">
                  <svg viewBox="0 0 448 512">
                    <use xlink:href="{{ asset('assets/web/img/sprite.svg#instagram-icon') }}"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/{{ $company->twitter }}" target="_blank" title="Twitter">
                  <svg viewBox="0 0 512 512">
                    <use xlink:href="{{ asset('assets/web/img/sprite.svg#twitter-icon') }}"></use>
                  </svg>
                </a>
              </li>
            </ul><!-- End social links -->
          </div>
        </div>
      </div>
    </div>
  </nav><!-- End header top -->

  <!-- Begin header fixed -->
  <nav class="header-fixed">
    <div class="container">
      <div class="row flex-nowrap align-items-center justify-content-between">
        <div class="col-auto d-block d-lg-none header-fixed-col">
          <div class="main-mnu-btn">
            <span class="bar bar-1"></span>
            <span class="bar bar-2"></span>
            <span class="bar bar-3"></span>
            <span class="bar bar-4"></span>
          </div>
        </div>
        <div class="col-auto header-fixed-col">
          <!-- Begin logo -->
          <a href="#" class="logo ml-md-5" title="Logo Raja Wijaya">
            <img src="assets/img/logo/{{ $company->logo }}" width="200" alt="Logo Raja Wijaya">
          </a><!-- End logo -->
        </div>
        <div class="col-auto header-fixed-col d-none d-lg-block col-static">
          <!-- Begin main menu -->
          <nav class="main-mnu">
            <ul class="main-mnu-list">
              <li>
                <a href="{{ url("/") }}" data-title="Home"><span>Home</span></a>
              </li>
              <li>
                <a href="{{ url("tentang-kami") }}" data-title="Tentang Kami"><span>Tentang Kami</span></a>
              </li>
              <li>
                <a href="{{ url("kegiatan") }}" data-title="Kegiatan"><span>Kegiatan</span></a>
              </li>
              <li>
                <a href="{{ url("mitra") }}" data-title="Mitra"><span>Mitra</span></a>
              </li>
              <li>
                <a href="{{ url("kontak") }}" data-title="Kontak"><span>Kontak</span></a>
              </li>
              @if (session('login') === true)
              <li><a href="{{ url("dashboard") }}" data-title="Dashboard"><span>Dashboard</span></a></li>
              @else
              <li><a href="{{ url('login') }}" data-title="Login/Daftar"><span>Login/Daftar</span></a></li>
              @endif
            </ul>
          </nav><!-- End main menu -->
        </div>
        <div class="col-auto header-fixed-col col-static">
          <!-- Begin header actions -->
          <ul class="header-actions">
            <!-- Begin header navbar -->
            <li class="d-block d-lg-none">
              <div class="header-navbar">
                <div class="header-navbar-btn">
                  <i class="material-icons md-24">more_vert</i>
                </div>
                <ul class="header-navbar-content">
                  <li>
                    <a href="mailto:{{ $company->email }}">
                      <i class="material-icons md-20">mail_outline</i>
                      <span>{{ $company->email }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="mailto:{{ $company->telp }}" class="formingHrefTel">
                      <i class="material-icons md-20">support_agent</i>
                      <span>{{ $company->telp }}</span>
                    </a>
                  </li>
                  <li>
                    <!-- Begin social links -->
                    <ul class="social-links">
                      <li>
                        <a href="https://facebook.com/{{ $company->facebook }}" target="_blank" title="Facebook">
                          <svg viewBox="0 0 320 512">
                            <use xlink:href="{{ asset('assets/web/img/sprite.svg#facebook-icon') }}"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="https://instagram.com/{{ $company->instagram }}" target="_blank" title="Instagram">
                          <svg viewBox="0 0 448 512">
                            <use xlink:href="{{ asset('assets/web/img/sprite.svg#instagram-icon') }}"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="https://twitter.com/{{ $company->twitter }}" target="_blank" title="Twitter">
                          <svg viewBox="0 0 512 512">
                            <use xlink:href="{{ asset('assets/web/img/sprite.svg#twitter-icon') }}"></use>
                          </svg>
                        </a>
                      </li>
                    </ul><!-- End social links -->
                  </li>
                </ul>
              </div>
            </li><!-- End header navbar -->
          </ul><!-- End header actions -->
        </div>
      </div>
    </div>
  </nav><!-- End header fixed -->
</header><!-- End header -->
