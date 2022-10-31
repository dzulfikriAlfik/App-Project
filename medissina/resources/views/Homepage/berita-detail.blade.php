@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start Banner Section -->
  <section class="pt_banner_inner banner_Sblog_default">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-8 col-lg-7 my-auto">
          <div class="banner_title_inner margin-b-8">
            <div class="icon_c six">
              <svg id="Stockholm-icons-_-Home-_-Deer" data-name="Stockholm-icons-/-Home-/-Deer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <rect id="bound" width="24" height="24" fill="none" />
                <path id="Combined-Shape"
                  d="M21.982,8.189a.993.993,0,0,1-.467.668l-5,3A1,1,0,0,1,16,12H8a1,1,0,0,1-.514-.143l-5-3a.993.993,0,0,1-.467-.668l-1-4.993A1,1,0,0,1,2.981,2.8l.634,3.168L6.293,3.293A1,1,0,0,1,7.707,4.707L4.613,7.8,8.277,10h7.446l3.664-2.2L16.293,4.707a1,1,0,0,1,1.414-1.414l2.679,2.679L21.019,2.8a1,1,0,0,1,1.961.392Zm-6.929.705a1,1,0,1,1,.894-1.789l3,1.5a1,1,0,0,1,.067,1.752l-2.5,1.5A1,1,0,0,1,16,12H8a1,1,0,0,1-.514-.143l-2.5-1.5a1,1,0,0,1,0-1.715l2.5-1.5A1,1,0,1,1,8.514,8.857L7.444,9.5l.833.5h7.446l.7-.42Z"
                  fill="#fff" opacity="0.3" />
                <path id="Rectangle-192" d="M9.855,10h4.289a2,2,0,0,1,1.88,2.683L13.342,20.06A1.428,1.428,0,0,1,12,21h0a1.428,1.428,0,0,1-1.342-.94L7.976,12.683A2,2,0,0,1,9.855,10Z" fill="#fff" fill-rule="evenodd" />
              </svg>
            </div>
            <h1>
              Pandemic crippling small-scale fishing worldwide, study finds
            </h1>
          </div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb default justify-content-center">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">How under-screen cameras could change UI for
                the better</li>
            </ol>
          </nav>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="cover_Sblog">
            <img class="cover-parallax" src="{{ asset('assets/homepage/assets/img/inner/04984.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Banner -->

  <section class="content-Sblog" data-sticky-container>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="fixSide_scroll" data-sticky-for="1023" data-margin-top="100">
            <div class="item">
              <div class="profile_user">
                <img src="{{ asset('assets/homepage/assets/img/persons/26.jpg') }}" alt="">
                <div class="txt">
                  <h4>
                    Chad Faircloth
                  </h4>
                  <time>30 Sep, 2020</time>
                </div>
                <a href="#" class="btn btn_profile c-white sweep_top sweep_letter rounded-pill bg-lightgreen">
                  <div class="inside_item">
                    <span data-hover="Profile">Profile</span>
                    <span></span>
                  </div>
                </a>
              </div>
            </div>
            <div class="share_socail">
              <div class="title">Share</div>

              <button class="btn icon" data-toggle="tooltip" data-placement="right" title="Facebook" data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                <i class="tio facebook"></i>
              </button>

              <button class="btn icon" data-toggle="tooltip" data-placement="right" title="Twitter" data-sharer="twitter" data-title="Checkout Sharer.js!" data-hashtags="awesome, sharer.js" data-url="https://ellisonleao.github.io/sharer.js/">
                <i class="tio twitter"></i>
              </button>

              <button class="btn icon" data-toggle="tooltip" data-placement="right" title="Whatsapp" data-sharer="whatsapp" data-title="Checkout Sharer.js!" data-url="https://ellisonleao.github.io/sharer.js/">
                <i class="tio whatsapp_outlined"></i>
              </button>

              <button class="btn icon" data-toggle="tooltip" data-placement="right" title="Telegram" data-sharer="telegram" data-title="Checkout Sharer.js!" data-url="https://ellisonleao.github.io/sharer.js/" data-to="+44555-03564">
                <i class="tio telegram"></i>
              </button>

              <button class="btn icon" data-toggle="tooltip" data-placement="right" title="Pinterest" data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                <i class="tio pinterest_circle"></i>
              </button>

              <button class="btn icon" data-toggle="tooltip" data-placement="right" title="skype" data-sharer="skype" data-url="https://ellisonleao.github.io/sharer.js/" data-title="Checkout Sharer.js!">
                <i class="tio skype"></i>
              </button>

            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="body_content">
            <p class="margin-b-3">Many people don’t really know the difference between software architecture and
              software design.
              Even for developers, the line is often blurry and they might mix up elements of software
              architecture patterns and design patterns. </p>
            <h3>The Definition of Software Architecture</h3>
            <p class="margin-b-3">In simple words, software architecture is the process of converting software
              characteristics such
              as flexibility, scalability, feasibility, reusability, and <mark>security into a structured
                solution</mark> that
              meets the technical and the business expectations. </p>
            <h3>The Characteristics of Software Architecture</h3>
            <p>
              As explained, software characteristics describe the requirements and the expectations of a software
              in operational and technical levels. Thus, when a product owner says they are competing in a rapidly
              changing markets, and they should adapt their business model quickly. The software should be
              “extendable, modular and <strong>maintainable</strong>” if a business deals with urgent requests
              that need to be
              completed successfully in the matter of time. As a software architect, you should note that the
              performance and low fault tolerance, <u>scalability and reliability</u> are your key
              characteristics. Now,
              after defining the previous characteristics the business owner tells you that they have a limited
              budget for that project, another characteristic
            </p>
            <p>comes up here which is <b>“the feasibility.”</b></p>
            <p>Here you can find a full list of software characteristics, also known as “quality attributes,”
              <a href="#">here.</a>
            </p>

            <img class="img_md" src="{{ asset('assets/homepage/assets/img/inner/0654.png') }}" alt="">
            <p class="margin-b-3"><b>SOLID</b> refers to Single Responsibility, <mark>Open Closed</mark>, Liskov
              substitution,
              Interface
              Segregation and
              Dependency Inversion Principles.
            </p>
            <h3>Software Design</h3>
            <p>While software architecture is responsible for the skeleton and the high-level
              infrastructure of a
              software, the software design is responsible for the code level design such as, what each module is
              doing, the classes scope, and the functions purposes, etc.</p>
            <ul>
              <li>
                <span class="c-dark">Single Responsibility Principle</span> means that each class has to have one
                single purpose, a
                responsibility and a reason to change.
              </li>
              <li>
                <span class="c-dark">Open Closed Principle:</span>
                a class should be open for extension, but closed for modification. In simple words, you should
                be able to add more functionality to the class but do not edit current functions in a way that
                breaks existing code that uses it
              </li>
            </ul>
            <div class="cover_video">
              <img src="{{ asset('assets/homepage/assets/img/inner/16387156.png') }}" alt="">
              <div class="icon_played">
                <button type="button" class="btn btn_video" data-toggle="modal" data-src="https://www.youtube.com/embed/VvHoHw5AWTk" data-target="#mdllVideo">
                  <div class="scale rounded-circle b play_video">
                    <i class="tio play"></i>
                  </div>
                </button>
              </div>
            </div>
            <p class="margin-b-3"><b>SOLID</b> refers to Single Responsibility, <mark>Open Closed</mark>, Liskov
              substitution,
              Interface
              Segregation and
              Dependency Inversion Principles.
            </p>
            <p class="txt_quotation">
              Thanks for reading! If you are interested in machine learning (or just want to understand what it
              is), check out my Machine Learning is Fun! series too.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Start section__stories -->
  <section class="section__stories blog_slider padding-t-12">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="swip__stories">
            <!-- Swiper -->
            <div class="swiper-container blog-slider">
              <div class="title_sections_inner">
                <h2>Other articles</h2>
              </div>
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="grid_blog_avatar">
                    <div class="cover_blog">
                      <img src="{{ asset('assets/homepage/assets/img/charity/002.jpg') }}" alt="">
                    </div>
                    <div class="body_blog">
                      <a href="#">
                        <div class="person media">
                          <img src="{{ asset('assets/homepage/assets/img/persons/01.png') }}" alt="">
                          <div class="media-body">
                            <div class="txt">
                              <h3>Olivia DeSmit</h3>
                              <time>27 Sep, 2020</time>
                            </div>
                          </div>
                        </div>
                      </a>
                      <a href="single-blog.html" class="link_blog">
                        <h4 class="title_blog">
                          As climate warms, Ecuador fights fires with forecasts
                        </h4>
                        <p class="short_desc">
                          Vitae semper quis lectus nulla at volutpat diam. Sed viverra ipsum
                          nunc aliquet .
                        </p>
                      </a>
                    </div>
                  </div>
                  <!-- End grid_blog_avatar -->
                </div>

                <div class="swiper-slide">
                  <div class="grid_blog_avatar">
                    <div class="cover_blog">
                      <img src="{{ asset('assets/homepage/assets/img/inner/0654.png') }}" alt="">
                    </div>
                    <div class="body_blog">
                      <a href="#">
                        <div class="person media">
                          <img src="{{ asset('assets/homepage/assets/img/persons/01.png') }}" alt="">
                          <div class="media-body">
                            <div class="txt">
                              <h3>Paul Brasseur</h3>
                              <time>30 Sep, 2020</time>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a href="single-blog.html" class="link_blog">
                        <h4 class="title_blog">
                          Funds adding fuel in tech’s climate race
                        </h4>
                        <p class="short_desc">
                          Vitae semper quis lectus nulla at volutpat diam. Sed viverra ipsum nunc aliquet .
                        </p>
                      </a>

                    </div>
                  </div>
                  <!-- End grid_blog_avatar -->
                </div>

                <div class="swiper-slide">
                  <div class="grid_blog_avatar">
                    <div class="cover_blog">
                      <img src="{{ asset('assets/homepage/assets/img/inner/0654.jpg') }}" alt="">
                    </div>
                    <div class="body_blog">
                      <a href="#">
                        <div class="person media">
                          <img src="{{ asset('assets/homepage/assets/img/persons/01.png') }}" alt="">
                          <div class="media-body">
                            <div class="txt">
                              <h3>Merlin Roux</h3>
                              <time>24 Sep, 2020</time>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a href="single-blog.html" class="link_blog">
                        <h4 class="title_blog">
                          Satellite tags shed light on sea turtle treks
                        </h4>
                        <p class="short_desc">
                          Vitae semper quis lectus nulla at volutpat diam. Sed viverra ipsum nunc aliquet .
                        </p>
                      </a>

                    </div>
                  </div>
                  <!-- End grid_blog_avatar -->
                </div>

                <div class="swiper-slide">
                  <div class="grid_blog_avatar">
                    <div class="cover_blog">
                      <img src="{{ asset('assets/homepage/assets/img/inner/069874.jpg') }}" alt="">
                    </div>
                    <div class="body_blog">
                      <a href="#">
                        <div class="person media">
                          <img src="{{ asset('assets/homepage/assets/img/persons/01.png') }}" alt="">
                          <div class="media-body">
                            <div class="txt">
                              <h3>Olivia DeSmit</h3>
                              <time>27 Sep, 2020</time>
                            </div>
                          </div>
                        </div>
                      </a>
                      <a href="single-blog.html" class="link_blog">
                        <h4 class="title_blog">
                          As climate warms, Ecuador fights fires with forecasts
                        </h4>
                        <p class="short_desc">
                          Vitae semper quis lectus nulla at volutpat diam. Sed viverra ipsum
                          nunc aliquet .
                        </p>
                      </a>
                    </div>
                  </div>
                  <!-- End grid_blog_avatar -->
                </div>

                <div class="swiper-slide">
                  <div class="grid_blog_avatar">
                    <div class="cover_blog">
                      <img src="{{ asset('assets/homepage/assets/img/inner/11987.jpg') }}" alt="">
                    </div>
                    <div class="body_blog">
                      <a href="#">
                        <div class="person media">
                          <img src="{{ asset('assets/homepage/assets/img/persons/01.png') }}" alt="">
                          <div class="media-body">
                            <div class="txt">
                              <h3>Paul Brasseur</h3>
                              <time>30 Sep, 2020</time>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a href="single-blog.html" class="link_blog">
                        <h4 class="title_blog">
                          Funds adding fuel in tech’s climate race
                        </h4>
                        <p class="short_desc">
                          Vitae semper quis lectus nulla at volutpat diam. Sed viverra ipsum nunc aliquet .
                        </p>
                      </a>

                    </div>
                  </div>
                  <!-- End grid_blog_avatar -->
                </div>

                <div class="swiper-slide">
                  <div class="grid_blog_avatar">
                    <div class="cover_blog">
                      <img src="{{ asset('assets/homepage/assets/img/inner/6450.png') }}" alt="">
                    </div>
                    <div class="body_blog">
                      <a href="#">
                        <div class="person media">
                          <img src="{{ asset('assets/homepage/assets/img/persons/01.png') }}" alt="">
                          <div class="media-body">
                            <div class="txt">
                              <h3>Merlin Roux</h3>
                              <time>24 Sep, 2020</time>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a href="single-blog.html" class="link_blog">
                        <h4 class="title_blog">
                          Satellite tags shed light on sea turtle treks
                        </h4>
                        <p class="short_desc">
                          Vitae semper quis lectus nulla at volutpat diam. Sed viverra ipsum nunc aliquet .
                        </p>
                      </a>

                    </div>
                  </div>
                  <!-- End grid_blog_avatar -->
                </div>



              </div>

              <!-- Add Arrows -->
              <div class="swiper-button-next">
                <i class="tio chevron_right"></i>
              </div>
              <div class="swiper-button-prev">
                <i class="tio chevron_left"></i>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End. section__stories -->



  <!-- Start simple-subscribe -->
  <section class="simple-subscribe margin-my-12">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="content">
            <div class="row  justify-content-center">
              <div class="col-lg-10">
                <div class="title_sections_inner text-center">
                  <h2>Subscribe to Rakon</h2>
                  <p>Get the latest posts delivers right to your inbox </p>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="form-group item_scubscribe">
                  <div class="input_group">
                    <input type="text" class="form-control" placeholder="Enter email address">
                    <button type="button" class="btn">
                      <i class="tio send"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- End. simple-subscribe -->

</main>
@endsection
