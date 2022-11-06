@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start profile index -->
  {{-- <section class="pt_banner_inner banner_px_image" id="index">
    <div class="parallax_cover">
      <img class="cover-parallax" src="{{ asset('assets/homepage/assets/img/inner/about.jpg') }}" alt="image">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-6">
        <div class="banner_title_inner">
          <h1 data-aos="fade-up" data-aos-delay="0">
            Tentang kami
          </h1>
          <p data-aos="fade-up" data-aos-delay="100">
            Leave us a little info, and we’ll be in touch.
          </p>
          <div data-aos="fade-up" data-aos-delay="200">
            <a href="/info/kontak" class="btn btn_sm_primary bg-orange-red c-white rounded-8">Kontak kami</a>
          </div>

        </div>
      </div>

    </div>
  </div>
  </section> --}}
  <!-- End profile index -->

  <!-- Start tentang -->
  <section class="about_cc_grid padding-py-12" id="tentang">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="title_sections_inner mb-0">
            <div class="before_title">
              <span class="c-orange-red">Tentang kami</span>
            </div>
            <h2>Medissina siap mendidik anak untuk menghadapi zamannya</h2>
          </div>
        </div>
        <div class="col-lg-6 ml-auto">
          <div class="title_sections_inner mb-0">
            {!! $lembaga->tentang_kami !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End. tentang -->

  <!-- Start sejarah -->
  <section class="faq_one_inner mt-0 w-100" id="sejarah">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="features_points mb-4 mb-lg-0">
            <div class="title_sections_inner">
              <h2 class="text-center">Sejarah</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-12 ml-auto">
          <!-- block Collapse -->
          <div class="faq_section faq_demo3 faq_with_icon">
            <div class="block_faq">
              <div class="accordion" id="accordionExample">
                <div class="card" data-aos="fade-up" data-aos-delay="0">
                  <div class="card-header active" id="headingOne">
                    <h3 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Tahun 2004 - Sekarang
                      </button>
                    </h3>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="mb-0">
                        {!! $lembaga->sejarah !!}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End. sejarah -->

  <!-- Start Visi misi -->
  <section class="software_web margin-b-6" id="visi">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-12">
          <div class="title_sections_inner margin-b-5">
            <h2>Visi dan Misi TK Islam Medissina</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 my-auto">
          <div class="item__section mb-4 mb-lg-0">
            <div class="media">
              <div class="media-body">
                <div class="title_sections mb-0">
                  <h2>Visi</h2>
                  {!! $lembaga->visi !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 my-auto">
          <div class="item__section mb-4 mb-lg-0">
            <div class="media">
              <div class="media-body">
                <div class="title_sections mb-0">
                  <h2>Misi</h2>
                  {!! $lembaga->misi !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End. Visi misi -->

  <!-- Start Struktur -->
  <section class="team_overlay_style team_default_style margin-b-7 padding-t-12" id="struktur">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="title_sections_inner margin-b-5">
            <h2>Struktur Organisasi</h2>
          </div>
        </div>
      </div>
      <div class="row">

        @foreach ($strukturs as $struktur)
        <div class="col-md-6 col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="0">
            <div class="image_ps">
              <img src="{{ asset('/storage') . "/" . $struktur->user_image }}" alt="">
              <div class="content_txt left-side">
                <h3>{{ $struktur->user_name }}</h3>
                <p>{{ jabatan($struktur->user_role) }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- End. Struktur -->

  <!-- Start staff -->
  <section class="team_overlay_style team_default_style margin-b-7 padding-t-12" id="staff">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="title_sections_inner margin-b-5">
            <h2>Staff</h2>
          </div>
        </div>
      </div>
      <div class="row">

        @foreach ($staffs as $staff)
        <div class="col-md-6 col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="0">
            <div class="image_ps">
              <img src="{{ asset('/storage') . "/" . $staff->user_image }}" alt="">
              <div class="content_txt left-side">
                <h3>{{ $staff->user_name }}</h3>
                <p>{{ jabatan($staff->user_role) }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- End. staff -->

</main>
@endsection
