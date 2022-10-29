@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start banner_about -->
  <section class="pt_banner_inner no-before banner_px_image blog-banner_without_image">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6">
          <div class="banner_title_inner margin-b-3">
            <h1 data-aos="fade-up" data-aos-delay="0">
              News
            </h1>
            <p data-aos="fade-up" data-aos-delay="100">
              Share your stories and news with everyone.
            </p>
          </div>
        </div>
      </div>
      <div class="filter_form" data-aos="fade-up" data-aos-delay="200">
        <form class="row">
          <div class="col-md-6 col-lg-3">
            <div class="simple_search">
              <div class="form-group">
                <div class="input_group">
                  <input type="search" class="form-control" placeholder="Type your search word">
                  <i class="tio search"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="form-group">
              <select class="form-control custom-select" id="exampleFormControlSelect1">
                <option>Categories</option>
                <option>Forests</option>
                <option>Oceans</option>
                <option>Science</option>
                <option>Policy</option>
              </select>
            </div>
          </div>
        </form>
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

            <div class="card">
              <a href="#" class="link_poet">
                <div class="cover_link">
                  <img class="main_img" src="{{ asset('assets/homepage/assets/img/inner/px0654.jpg') }}" class="card-img-top" alt="...">
                  <div class="auther_post">
                    <div class="media">
                      <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
                      <div class="media-body my-auto">
                        <div class="txt">
                          <h4>Chad Faircloth</h4>
                          <p>30 Sep, 2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="card-body">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">10 Insights from Apple’s Human Interface Design Guidelines</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

            <div class="card">
              <a href="#" class="link_poet">
                <div class="cover_link">
                  <img class="main_img" src="{{ asset('assets/homepage/assets/img/inner/01219874.jpg') }}" class="card-img-top" alt="...">
                  <div class="auther_post">
                    <div class="media">
                      <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
                      <div class="media-body my-auto">
                        <div class="txt">
                          <h4>Chad Faircloth</h4>
                          <p>30 Sep, 2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="card-body">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">10 Insights from Apple’s Human Interface Design Guidelines</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-body bg-white">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">Hopefully, the Ultimate Guide to an Interface Icon Set</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

            <div class="card">
              <a href="#" class="link_poet">
                <div class="cover_link">
                  <img class="main_img" src="{{ asset('assets/homepage/assets/img/inner/00pxsd.jpg') }}" class="card-img-top" alt="...">
                  <div class="auther_post">
                    <div class="media">
                      <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
                      <div class="media-body my-auto">
                        <div class="txt">
                          <h4>Chad Faircloth</h4>
                          <p>30 Sep, 2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="card-body">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">17 UI Design Mistakes That Fails Your Website</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

            <div class="card">
              <a href="#" class="link_poet">
                <div class="cover_link">
                  <img class="main_img" src="{{ asset('assets/homepage/assets/img/inner/pxx065.jpg') }}" class="card-img-top" alt="...">
                  <div class="auther_post">
                    <div class="media">
                      <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
                      <div class="media-body my-auto">
                        <div class="txt">
                          <h4>Chad Faircloth</h4>
                          <p>30 Sep, 2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="card-body">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">How to make a background blur in CSS with one line of code</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-body bg-white">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">The Winner of the Vice Presidential Debate? Kamala’s Faces.</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

            <div class="card">
              <a href="#" class="link_poet">
                <div class="cover_link">
                  <img class="main_img" src="{{ asset('assets/homepage/assets/img/inner/00vupo.jpg') }}" class="card-img-top" alt="...">
                  <div class="auther_post">
                    <div class="media">
                      <img src="{{ asset('assets/homepage/assets/img/persons/23.jpg') }}" alt="">
                      <div class="media-body my-auto">
                        <div class="txt">
                          <h4>Chad Faircloth</h4>
                          <p>30 Sep, 2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="card-body">
                <div class="about_post">
                  <span class="c_ategory">
                    <a href="#Design">Design</a>
                    <a href="#Developer">Developer</a>
                  </span>
                  <span class="dot"></span>
                  <time>15min</time>
                </div>
                <a href="#" class="d-block">
                  <h5 class="card-title">SpaceX: Simple, beautiful interfaces are the future</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                  </p>
                </a>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- End. blog_masonry -->

  <!-- pagination default -->
  <section class="margin-b-12">
    <div class="container">
      <nav aria-label="Page navigation example">
        <ul class="pagination default hover-blue margin-t-3">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <i class="tio chevron_left"></i>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link active" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>

          <li class="page-item"><a class="page-link disabled">...</a></li>
          <li class="page-item"><a class="page-link" href="#">35</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <i class="tio chevron_right"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
  <!-- End. pagination -->

</main>
@endsection
