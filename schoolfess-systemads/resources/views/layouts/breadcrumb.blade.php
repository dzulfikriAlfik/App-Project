{{-- Breadcrumb --}}
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
        <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('judul_halaman')</li>
            </ol>
        </nav>
        <!-- /nav -->
        {{-- Title Page --}}
        <h2 class="display-5" style="margin-top: -10px; margin-bottom: 20px;">@yield('judul_halaman')</h2>
        </div>
        <!-- /column -->
    </div>
<!-- /.row -->
</div>