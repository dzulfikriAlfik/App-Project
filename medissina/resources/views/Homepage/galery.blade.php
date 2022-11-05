@extends('_layouts/home')

@section('content')
<!-- Start blog_slider -->
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">

  <!-- Start banner_about -->
  <section class="pt_banner_inner no-before banner_px_image blog-banner_without_image">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6">
          <div class="banner_title_inner margin-b-3">
            <h1 data-aos="fade-up" data-aos-delay="0">
              Galeri Kegiatan
            </h1>
            <p data-aos="fade-up" data-aos-delay="100">
              Kumpulan Foto kegiatan di TK Islam Medissina
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner_about -->

  <!-- Start blog_masonry -->
  <section class="blog_masonry two_column">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card-columns">

            @foreach ($galleries as $gallery)
            <div class="card">
              <a href="#" class="link_poet">
                <div class="cover_link">
                  <img class="main_img" src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}">
                  <div class="auther_post">
                    <div class="media">
                      <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
                      <div class="media-body my-auto">
                        <div class="txt">
                          <h4>{{ $gallery->user_name }}</h4>
                          <p>{{ labelPosted($gallery->created_date, $gallery->updated_date) }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="card-body">
                <div class="about_post">
                  <time>{{ dateTimeFormat($gallery->gallery_date) }}</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">{{ $gallery->title }}</h5>
                  <p class="card-text">{{ $gallery->description }}</p>
                </a>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End. blog_masonry -->
</main>
<!-- End. blog_slider -->
@endsection
