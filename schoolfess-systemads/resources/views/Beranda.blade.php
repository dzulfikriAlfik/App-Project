<!-- Menghubungkan dengan view template -->
@extends('layouts/template')

<!-- Judul Halaman -->
@section('judul_halaman', 'Beranda')

{{-- Content --}}
@section('content')

    {{-- Breadcrumb --}}
    <div class="container pt-5 pb-5 pb-0">
        @include('layouts/logo')
        <h2 class="display-5 text-center mt-5 mb-5">Cari Peraturan yang Anda <span style="color:#FC0101">Butuhkan</span></h2>

	<!-- section -->
    <section class="wrapper bg-light wrapper-border">
      <div class="container mt-2">
        @include('layouts/search')

        {{-- Counter Bidang Urusan --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 mt-5">
            <div class="col mb-1">
                <div class="text-center">
                <div class="card" style="background-color: #ECF0F3;">
                    <div class="card-body">
                    <h3 class="counter">109</h3>
                    <img src="img/jdih-icons/pendidikan_icon.png" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />                    
                    <p>Pendidikan</p>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                </div>
            </div>
            <div class="col mb-1">
                <div class="text-center">
                <div class="card" style="background-color: #ECF0F3;">
                    <div class="card-body">
                    <h3 class="counter">80</h3>
                    <img src="img/jdih-icons/pemerintahan_icon.png" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                    <p>Pemerintahan Umum</p>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                </div>
            </div>
            <div class="col mb-1">
                <div class="text-center">
                <div class="card" style="background-color: #ECF0F3;">
                    <div class="card-body">
                        <h3 class="counter">57</h3>
                    <img src="img/jdih-icons/sosial_icon.png" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                    <p>Sosial</p>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                </div>
            </div>
            <div class="col mb-1">
                <div class="text-center">
                <div class="card" style="background-color: #ECF0F3;">
                    <div class="card-body">
                        <h3 class="counter">22</h3>
                    <img src="img/jdih-icons/kesehatan_icon.png" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                    <p>Kesehatan</p>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                </div>
            </div>
            <div class="col mb-1">
                <div class="text-center">
                <div class="card" style="background-color: #ECF0F3;">
                    <div class="card-body">
                        <h3 class="counter">19</h3>
                    <img src="img/jdih-icons/penanamanmodal_icon.png" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                    <p>Penanaman Modal</p>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                </div>
            </div>
            <div class="col mb-1">
                <div class="card card-block d-flex" style="height: 300px">
                    <div class="card-body align-items-center d-flex justify-content-center">
                        <a href="">Lihat semua Bidang Urusan</a>
                    </div>
                  </div>
                    
            </div>
        </div>
        {{-- End Counter Bidang Urusan --}}
        
        {{-- Peraturan Terbaru dan Dokumen Hukum Covid --}}
        <div class="container mt-5">
        <div class="row col row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2">
            {{-- Peraturan Terbaru --}}
            <div class="col-sm-9">
                <div class="card">
                <div class="card-header" style="background-color: #ECF0F3;">
                    <b>Blog</b>
                </div>
                <div class="card-body">
                    <div class="container">
                    <div id="blog" class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2">
                        {{-- Content Blog Filled by JQuery --}}
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-10">
                            <div class="d-grid gap-2">
                                <button class="btn btn-secondary"><a href="/beranda/blog">Show more Blog</a></button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">                
            </div>
            </div>
            <div class="col-sm-3">
            {{-- Dokumen Hukum Covid-9 --}}
            <div class="row">
                <div class="col">
                <div class="card">
                <div class="card-header" style="background-color: #ECF0F3;">
                    <b>Dokumen Hukum Covid 19</b>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <p class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</p>
                    </div>
                    <div class="mb-1">
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <p class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</p>
                    </div>
                    <div class="mb-1">
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <p class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</p>
                    </div>
                </div>
                </div>
                </div>
            </div>
            {{-- Dokumen Hukum Terbaru --}}
            <div class="row mt-2">
                <div class="col">
                <div class="card">
                <div class="card-header" style="background-color: #ECF0F3;">
                    <b>Dokumen Hukum</b>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <span class="badge bg-red rounded-pill">Tidak Berlaku</span> <br>
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <p class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</p>
                    </div>
                    <div class="mb-1">
                        <span class="badge bg-green rounded-pill">Berlaku</span> <br>
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <p class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</p>
                    </div>
                    <div class="mb-1">
                        <span class="badge bg-green rounded-pill">Berlaku</span> <br>
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <p class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</p>
                    </div>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        {{-- Peraturan Terbaru dan Dokumen Hukum Covid --}}

        {{-- Anggota JDIH Kab / Kota dan Agenda Kegiatan --}}
        <div class="container mt-5">
        <div class="row col row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2">
            {{-- Anggota JDIH Kab / Kota --}}
            <div class="col-sm-9">
                <div class="row">
                <div class="card">
                <div class="card-header" style="background-color: #ECF0F3;">
                    <b>Anggota JDIH Kab / Kota</b>
                </div>
                <div class="card-body">
                    <div class="container">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2">
                        <div class="col mb-1">
                            <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('img/map-point.png') }}" alt="" width="250px" />
                            </div>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <div class="card">
                            <div class="card-body">
                                <b>Informasi Anggota</b>
                                <p>JDIH Kota Bandung</p>
                                <a href="#">jdih.bandung.go.id</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 mt-5">
                        <div class="col mb-1">
                            <div class="text-center">
                            <div class="card" style="background-color: #ECF0F3;">
                                <div class="card-body">
                                <img src="{{ asset('img/jdih-icons/jdih.png') }}" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />                    
                                <p>JDHIN</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                            </div>
                        </div>
                        <div class="col mb-1">
                            <div class="text-center">
                            <div class="card" style="background-color: #ECF0F3;">
                                <div class="card-body">
                                <img src="{{ asset('img/jdih-icons/aksespasti.png') }}" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                                <p>AKSES PASTI (Publikasi Rancangan)</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                            </div>
                        </div>
                        <div class="col mb-1">
                            <div class="text-center">
                            <div class="card" style="background-color: #ECF0F3;">
                                <div class="card-body">
                                <img src="{{ asset('img/jdih-icons/jabarprov.png') }}" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                                <p>JDIH DPRD Provinsi</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                            </div>
                        </div>
                        <div class="col mb-1">
                            <div class="text-center">
                            <div class="card" style="background-color: #ECF0F3;">
                                <div class="card-body">
                                <img src="{{ asset('img/jdih-icons/hukumham.png') }}" class="svg-inject icon-svg icon-svg-lg mb-3" alt="" />
                                <p>Biro Hukum dan HAM</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-3">
            {{-- Agenda Kegiatan --}}
                <div class="card">
                <div class="card-header" style="background-color: #ECF0F3;">
                    <b>Agenda Kegiatan</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <span class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</span> <br>
                        <span class="badge bg-red rounded-pill">30 September 2021</span>
                    </div>
                    <div class="mb-2">
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <span class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</span>
                        <br>
                        <span class="badge bg-green rounded-pill">30 September 2021</span>
                    </div>
                    <div class="mb-2">
                        <a href="#" class="card-link">Keputusan Gubernur 443/Kep.490-Hukham/2021</a> <br>
                        <span class="card-link">PERPANJANGAN KETIGA PEMBERLAKUAN PEMBATASAN KEGIATAN MASYAR...</span>
                        <br>
                        <span class="badge bg-red rounded-pill">30 September 2021</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        {{-- Anggota JDIH Kab / Kota dan Agenda Kegiatan --}}

      </div>
      <!-- /.container -->
    </section>
    {{-- End Section --}}

@endsection