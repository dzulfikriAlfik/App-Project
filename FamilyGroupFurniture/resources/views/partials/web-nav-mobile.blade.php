<!-- Begin mobile main menu -->
<nav class="mmm">
  <div class="mmm-content">
    <ul class="mmm-list">
      <li><a href="{{ url('') }}">Home</a></li>
      <li><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
      <li><a href="{{ url('customer') }}">Customer</a></li>
      <li><a href="{{ url('kontak') }}">Kontak</a></li>
      @if (session('login') === true)
      <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
      @else
      <li><a href="{{ url('login') }}">Login/Daftar</a></li>
      @endif
    </ul>
  </div>
</nav><!-- End mobile main menu -->
