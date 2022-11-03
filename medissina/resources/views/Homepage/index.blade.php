@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start banner_about -->
  <section class="pt_banner_inner banner_about_two">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6">
          <div class="banner_title_inner">
            <div class="before_title" data-aos="fade-up" data-aos-delay="0">
              <span class="c-green2 font-w-500">Selamat Datang 🖐</span>
            </div>
            <h1 data-aos="fade-up" data-aos-delay="100">
              We're excited to help you on your journey!
            </h1>
            <p data-aos="fade-up" data-aos-delay="200">
              Leave us a little info, and we’ll be in touch.
            </p>
          </div>
        </div>

      </div>
    </div>
    <div class="container-fluid pl-0">

      <div class="row">
        <div class="col-lg-12">
          <div class="parallax_cover">
            <img class="cover-parallax" src="{{ asset('assets/homepage/assets/img/inner/12.jpg') }}" alt="image">
          </div>
        </div>
      </div>

    </div>

    <div class="container padding-t-6">
      <div class="row">
        <div class="col-lg-6">
          <p class="font-s-18 c-gray">
            We believe everyone deserves to have a website or online store. Innovation and simplicity makes us
            happy: our goal is to remove any technical or financial barriers that can prevent business owners from
            making their own website.
          </p>
        </div>
        <div class="col-lg-5 ml-auto">
          <p class="font-s-18 c-gray">
            Today, we're proud to empower individuals and small business owners around the world. Everyone
            deserves a website, and we're excited to see what you create.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner_about -->

  <!-- Start counter_about -->
  <section class="section__counter counter_about padding-t-12">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="item__number mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="0">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="13" viewBox="0 0 22 13">
                <g id="Group_6702" data-name="Group 6702" transform="translate(-1 -6)">
                  <path id="Combined-Shape" d="M5,6H19a1,1,0,0,1,1,1V17H4V7A1,1,0,0,1,5,6Z" fill="#0b2238" fill-rule="evenodd" />
                  <rect id="Rectangle" width="22" height="1" rx="0.5" transform="translate(1 18)" fill="#0b2238" opacity="0.3" />
                </g>
              </svg>
            </div>

            <div class="body__content">
              <h2><span class="counter">1</span>K</h2>
              <h3>Jumlah Siswa</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="item__number mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17.328" viewBox="0 0 18 17.328">
                <path id="Combined-Shape" d="M3.957,8.415l7.521-4.6a1,1,0,0,1,1.043,0l7.521,4.6A2,2,0,0,1,21,10.122V19a2,2,0,0,1-2,2H5a2,2,0,0,1-2-2V10.122A2,2,0,0,1,3.957,8.415ZM10,13a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1Z" transform="translate(-3 -3.672)" fill="#0b2238"
                  fill-rule="evenodd" />
              </svg>
            </div>
            <div class="body__content">
              <h2><span class="counter">12.5</span>M</h2>
              <h3>In-house designed <br>templates</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="item__number mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <g id="Group_6703" data-name="Group 6703" transform="translate(-3 -3)">
                  <path id="Mask" d="M12,11a4,4,0,1,1,4-4A4,4,0,0,1,12,11Z" fill="#0b2238" opacity="0.3" />
                  <path id="Mask-Copy" d="M3,20.2c.388-4.773,4.261-7.2,8.983-7.2C16.771,13,20.7,15.293,21,20.2a.687.687,0,0,1-.751.8H3.728A1.107,1.107,0,0,1,3,20.2Z" fill="#0b2238" />
                </g>
              </svg>

            </div>
            <div class="body__content">
              <h2>+ <span class="counter">10</span>K</h2>
              <h3>Jumlah siswa</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="item__number mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16.723" height="16.003" viewBox="0 0 16.723 16.003">
                <g id="Group_6704" data-name="Group 6704" transform="translate(-3.638 -4.259)">
                  <path id="Combined-Shape" d="M12,4.259a1,1,0,0,1,.9.558l2.042,4.138,4.566.664a1,1,0,0,1,.554,1.706l-3.3,3.221.78,4.548a1,1,0,0,1-1.451,1.054L12,18Z" fill="#ffce53" fill-rule="evenodd" opacity="0.3" />
                  <path id="Combined-Shape-2" data-name="Combined-Shape" d="M12,4.259V18L7.916,20.147a1,1,0,0,1-1.451-1.054l.78-4.548-3.3-3.221a1,1,0,0,1,.554-1.706l4.566-.664L11.1,4.817A1,1,0,0,1,12,4.259Z" fill="#ffce53" fill-rule="evenodd" />
                </g>
              </svg>

            </div>
            <div class="body__content">
              <h2>4.7 <span class="font-s-30">/ 5</span></h2>
              <h3>Star rating by <br>our users</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End. counter_about -->

  <!-- Start our_story -->
  <section class="software_web our_story margin-t-12" id="About">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 margin-t-8">
          <div class="item__section mb-4 mb-lg-0">
            <div class="media">
              <div class="icon_sec">
                <svg xmlns="http://www.w3.org/2000/svg" width="23.589" height="20.716" viewBox="0 0 23.589 20.716">
                  <path id="Combined-Shape"
                    d="M25.56,17.147l.029-.012v5.4a1.178,1.178,0,0,1-2.011.833l-2.7-2.7H5.534A3.534,3.534,0,0,1,2,17.136V6.534A3.534,3.534,0,0,1,5.534,3H22.026A3.534,3.534,0,0,1,25.56,6.534v10.6S25.56,17.143,25.56,17.147ZM6.91,11.9c1.778,2.667,4.1,4.058,6.87,4.058s5.092-1.391,6.87-4.058a1.178,1.178,0,1,0-1.96-1.307c-1.363,2.044-2.971,3.009-4.91,3.009s-3.547-.965-4.91-3.009A1.178,1.178,0,1,0,6.91,11.9Z"
                    transform="translate(-2 -3)" fill="#fff" fill-rule="evenodd" />
                </svg>
              </div>
              <div class="media-body">
                <div class="title_sections mb-0">
                  <div class="before_title">
                    <span class="c-green2">Lets's Go</span>
                  </div>
                  <h2>Our Story</h2>
                  <p>
                    began in 2005. After years in the web hosting industry, we realized that it was near
                    impossible for the average Jane or Joe to create their own website. Traditional web hosting
                    services were simply too complicated, time consuming, and expensive to manage.
                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0 ml-auto">
          <div class="image_grid">
            <img class="img-fluid img_one" src="{{ asset('assets/homepage/assets/img/inner/123.jpg') }}" alt="">
          </div>
        </div>
        <div class="w-100"></div>
        <div class="col-lg-5 mt-4 mt-lg-0 mx-auto">
          <div class="image_grid">
            <div class="before_line">
              <img class="img-fluid img_two" src="{{ asset('assets/homepage/assets/img/inner/231.jpg') }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0 ml-auto">
          <div class="image_grid">
            <img class="img-fluid img_three" src="{{ asset('assets/homepage/assets/img/inner/00.jpg') }}" alt="">
          </div>
        </div>
      </div>

      <div class="row margin-t-8">
        <div class="col-lg-6">
          <p class="font-s-18 c-gray">
            We believe everyone deserves to have a website or online store. Innovation and simplicity makes us
            happy: our goal is to remove any technical or financial barriers that can prevent business owners from
            making their own website.
          </p>
        </div>
        <div class="col-lg-5 ml-auto">
          <p class="font-s-18 c-gray">
            Today, we're proud to empower individuals and small business owners around the world. Everyone
            deserves a website, and we're excited to see what you create.
          </p>
        </div>
      </div>

    </div>
  </section>
  <!-- End.our_story -->

  <!-- Start team_overlay_style -->
  <section class="team_overlay_style team_default_style margin-b-7 padding-t-12" id="Team">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="title_sections_inner margin-b-5">
            <h2>Our Team</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="0">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/17.jpg') }}" alt="">

              <div class="content_txt left-side">
                <h3>Christopher L. Belle</h3>
                <p>Co-Founder & CEO</p>
              </div>
            </div>
            <div class="social_text">
              <a href="">
                Linkedin
              </a>
              <a href="">
                Twitter
              </a>
              <a href="">
                Github
              </a>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="100">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/20.jpg') }}" alt="">
              <div class="content_txt right-side">
                <h3>CLee Carter</h3>
                <p>Managing Partner </p>
              </div>
            </div>
            <div class="social_text">
              <a href="">
                Twitter
              </a>
              <a href="">
                Linkedin
              </a>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="200">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/19.jpg') }}" alt="">
              <div class="content_txt left-side">
                <h3>Mary Merrill</h3>
                <p>Operations Director</p>
              </div>
            </div>
            <div class="social_text">

              <a href="">
                Facebook
              </a>
              <a href="">
                Twitter
              </a>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="item_group" data-aos="fade-up" data-aos-delay="300">
            <div class="image_ps">
              <img src="{{ asset('assets/homepage/assets/img/persons/22.jpg') }}" alt="">
              <div class="content_txt right-side">
                <h3>John Myers</h3>
                <p>Chief Technology Officer</p>
              </div>
            </div>
            <div class="social_text">
              <a href="">
                Github
              </a>
              <a href="">
                Twitter
              </a>
              <a href="">
                Dribbble
              </a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End. team_overlay_style -->

</main>
@endsection

@section('jquery')
<!-- Custom JS -->
@endsection
