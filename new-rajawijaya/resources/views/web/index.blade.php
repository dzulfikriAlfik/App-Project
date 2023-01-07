<!-- Menghubungkan dengan layouts -->
@extends('layouts/web')

@section("content")

<!-- Begin intro -->
<div class="section-bgc intro">
  <div class="intro-slider">
    <div class="intro-item" style="background-image: url({{ asset('assets/web/img/fo2.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col offset-xs-4 offset-sm-1 offset-md-3 offset-lg-0">
            <div class="intro-content bg-hero">
              <div class="section-heading shm-none">
                <h1>Sekilas <br> Tentang Kami</h1>
                <p class="section-desc">{{ $company->sejarah }}</p>
              </div>
              <div class="ml-4 wrap-btn intro-btns">
                <a href="tentang-kami" class="btn btn-with-icon btn-border btn-small ripple">
                  <span>Selengkapnya tentang kami ...</span>
                  <svg class="btn-icon-right" viewBox="0 0 13 9" width="13" height="9">
                    <use xlink:href="{{ asset('assets/web/img/sprite.svg#arrow-right') }}"></use>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- End intro -->

<!-- Begin services -->
<section class="section services">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading heading-center">
          <div class="section-subheading">Areas what we serv</div>
          <h2>Bidang yang kami kerjakan</h2>
        </div>
      </div>

      <?php foreach ($services as $service) : ?>
      <div class="col-lg-4 col-md-6 col-12 item">
        <a href="single-services.html" class="iitem item-style">
          <div class="iitem-icon">
            <i class="material-icons material-icons-outlined md-48">corporate_fare</i>
          </div>
          <div class="iitem-icon-bg">
            <i class="material-icons material-icons-outlined">corporate_fare</i>
          </div>
          <h3 class="iitem-heading item-heading-large"><?= $service->service; ?></h3>
          <div class="iitem-desc"><?= $service->keterangan; ?></div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section><!-- End services -->

<!-- Begin counter section -->
<section class="section section-bgc">
  <div class="container">
    <div class="row spincrement-container">
      <div class="col-xl-5 offset-xl-2 col-lg-6 offset-lg-1 col-12">
        <div class="main-counter">
          <div class="main-counter-item">
            <div class="main-counter-item-center">
              <div>
                <?php
                  $now   = date("Y");
                  $last  = date("Y") - 5;
                  $since = $now - $last;
                ?>
                <div class="main-counter-numb spincrement" data-from="0" data-to="<?= $since; ?>">0</div>
                <div class="main-counter-heading">Years <br> Of Experience</div>
              </div>
            </div>
            <div class="main-counter-item-circ"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 offset-xl-1 col-lg-3 offset-lg-1 col-12 counter-items items">
        <div class="counter-item item">
          <div class="counter-item-numb"><span class="spincrement" data-from="0" data-to="20">0</span>+</div>
          <p class="counter-item-heading">Project terselesaikan</p>
        </div>
        <div class="counter-item item">
          <div class="counter-item-numb"><span class="spincrement" data-from="0" data-to="10">0</span>+</div>
          <p class="counter-item-heading">Jumlah Mitra</p>
        </div>
        <div class="counter-item item">
          <div class="counter-item-numb"><span class="spincrement" data-from="0" data-to="50">0</span>+</div>
          <p class="counter-item-heading">Jumlah Karyawan</p>
        </div>
      </div>
    </div>
  </div>
</section><!-- End counter section -->

<!-- Begin latest news -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading heading-center">
          <div class="section-subheading">More info about</div>
          <h2>Foto Progress Pekerjaan</h2>
        </div>
      </div>

      <?php foreach ($kegiatan as $galery) : ?>
      <div class="col-lg-4 col-md-6 col-12 item">
        <!-- Begin news item -->
        <article class="news-item item-style">
          <a href="#" class="news-item-img">
            <img data-src="assets/img/kegiatan/{{ $galery->foto }}" class="lazy" src="assets/img/kegiatan/{{ $galery->foto }}" alt="">
          </a>
          <div class="news-item-info">
            <div class="news-item-date">{{ tgl_indo($galery->tanggal) }}</div>
            <h3 class="news-item-heading item-heading">
              <a href="#" title="{{ $galery->nama_kegiatan }}">{{ $galery->nama_kegiatan }}</a>
            </h3>
            <div class="news-item-desc">
              <p>{{ $galery->keterangan }}</p>
            </div>
          </div>
        </article><!-- End news item -->
      </div>
      <?php endforeach; ?>

      <div class="col-12">
        <div class="section-btns justify-content-center">
          <a href="kegiatan" class="btn btn-with-icon btn-w240 ripple">
            <span>Selengkapnya</span>
            <svg class="btn-icon-right" viewBox="0 0 13 9" width="13" height="9">
              <use xlink:href="home-page/assets/img/sprite.svg#arrow-right"></use>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section><!-- End latest news -->
@endsection
