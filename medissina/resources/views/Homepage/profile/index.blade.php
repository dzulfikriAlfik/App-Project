@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start profile index -->
  <section class="pt_banner_inner banner_px_image" id="index">
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
  </section>
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
            <h2>We're Rakon, a creative studio that loves to learn, collaborate, and create.</h2>
          </div>
        </div>
        <div class="col-lg-6 ml-auto">
          <div class="title_sections_inner mb-0">
            <p>Hi! We Are Annette Collier And Francis Ericksen, Two Individuals With A Passion For Creativity —
              Creativity Makes Us Happy. We Truly Believe In The Transformative Power Of Illustration And Design
              And Their Ability To Simplify Communications, Elevate Experiences, Engage And Inspire People
              Everywhere.
              <br>
              <br>
              Good Design And Good Relationships Come From Collaboration. We're Excited To Start A Visual
              Dialogue, Learn About You, And Make Something Beautiful Together.</p>
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
                        Tahun 2005 - 2010
                      </button>
                    </h3>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="mb-0">
                        Serenity Is Multi-Faceted Blockchain Based
                        Ecosystem, Energy Retailer For The People,
                        Focusing On The Promotion Of Sustainable Living,
                        Renewable Energy Production And Smart Energy
                        Grid Utility Services.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="100">
                  <div class="card-header" id="headingTwo">
                    <h3 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Tahun 2011 - 2016
                      </button>
                    </h3>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <p>
                        Serenity Is Multi-Faceted Blockchain Based
                        Ecosystem, Energy Retailer For The People,
                        Focusing On The Promotion Of Sustainable Living,
                        Renewable Energy Production And Smart Energy
                        Grid Utility Services.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="200">
                  <div class="card-header" id="headingThree">
                    <h3 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Tahun 2017 - 2019
                      </button>
                    </h3>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <p>
                        We Aim To Become The Incubator For New Renewable
                        Energy-Related Projects By Using The Power Of
                        Crowd.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="300">
                  <div class="card-header" id="headingFour">
                    <h3 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Tahun 2020 - Sekarang
                      </button>
                    </h3>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                      <p>
                        We Aim To Become The Incubator For New Renewable
                        Energy-Related Projects By Using The Power Of
                        Crowd.
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
                  <p>
                    In cursus turpis massa tincidunt. Eu nisl nunc mi ipsum faucibus. Viverra vitae congue eu
                    consequat.
                    Enim ut tellus elementum sagittis vitae et leo duis ut. Eget felis eget nunc lobortis.
                  </p>
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
                  <p>
                    In cursus turpis massa tincidunt. Eu nisl nunc mi ipsum faucibus. Viverra vitae congue eu
                    consequat.
                    Enim ut tellus elementum sagittis vitae et leo duis ut. Eget felis eget nunc lobortis.
                  </p>
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
  <section class="team_static_style" id="struktur">
    <div class="container">

      <div class="row justify-content-center text-center">
        <div class="col-lg-5">
          <div class="title_sections_inner margin-b-5">
            <h2>Struktur Organisasi</h2>
          </div>
        </div>
      </div>

      <div class="row justify-content-lg-center">

        <div class="col-md-6 col-lg-3 item">
          <div class="item_group">
            <div class="img_group">
              <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
            </div>
            <div class="personal_info">
              <h3>Rifa Muhammad</h3>
              <p>Ketuan Yayasan</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 item text-center mx-auto my-auto">
          <div class="title_sections_inner">
            <h2>Our team brings a wealth of experience.</h2>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 item">
          <div class="item_group">
            <div class="img_group">
              <img src="{{ asset('assets/homepage/assets/img/persons/22.jpg') }}" alt="">
            </div>
            <div class="personal_info">
              <h3>Aim Patimah</h3>
              <p>Kepala sekolah</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 item">
          <div class="item_group">
            <div class="img_group">
              <img src="{{ asset('assets/homepage/assets/img/persons/19.jpg') }}" alt="">
            </div>
            <div class="personal_info">
              <h3>Mary Merrill</h3>
              <p>Managing Partner</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 item mx-auto">
          <div class="item_group">
            <div class="img_group">
              <img src="{{ asset('assets/homepage/assets/img/persons/16.png') }}" alt="">
            </div>
            <div class="personal_info">
              <h3>Christopher L. Belle</h3>
              <p>Co-Founder & CEO</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 item">
          <div class="item_group">
            <div class="img_group">
              <img src="{{ asset('assets/homepage/assets/img/persons/21.jpg') }}" alt="">
            </div>
            <div class="personal_info">
              <h3>Christopher L. Belle</h3>
              <p>Co-Founder & CEO</p>
            </div>
          </div>
        </div>

        <div class="w-100 d-none d-md-block"></div>
        <div class="col-md-6 col-lg-3 item">
          <div class="item_group">
            <div class="img_group">
              <img src="{{ asset('assets/homepage/assets/img/persons/20.jpg') }}" alt="">
            </div>
            <div class="personal_info">
              <h3>CLee Carter</h3>
              <p>Managing Partner</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End. Struktur -->

  <!-- Start staff -->
  <section class="team_overlay_style margin-b-7" id="staff" style="margin-top: 150px">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="title_sections_inner margin-b-5">
            <h2>People who work at Rakon share the vision of our community.</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="0">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/17.jpg') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>Christopher L. Belle</h3>
              <p>Co-Founder & CEO</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="100">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/20.jpg') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>CLee Carter </h3>
              <p>Managing Partner</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="200">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/19.jpg') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>Mary Merrill </h3>
              <p>Operations Director</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="300">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/22.jpg') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>John Myers </h3>
              <p>Operations Director</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="0">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/16.png') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>Christopher L. Belle</h3>
              <p>Co-Founder & CEO</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="100">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/18.png') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>CLee Carter </h3>
              <p>Managing Partner</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="200">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
            </div>
            <div class="share_soisal">
              <a href="">
                <i class="tio instagram"></i>
              </a>
              <a href="">
                <i class="tio twitter"></i>
              </a>
              <a href="">
                <i class="tio messenger_outlined"></i>
              </a>
            </div>
            <div class="content_txt">
              <h3>Mary Merrill </h3>
              <p>Operations Director</p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 my-auto mx-auto" data-aos="fade-up" data-aos-delay="200">
          <p class="font-s-20 c-dark font-w-600">You’ll work with creative people.</p>
          <a href="" class="btn btn_md_primary sweep_top sweep_letter bg-orange-red c-white rounded-8">
            <div class="inside_item">
              <span data-hover="Welcome !">Join us now</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- End. staff -->

</main>
@endsection
