@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start box_news_gray -->
  <section class="blog_slider box_news_gray margin-t-15">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title_sections_inner">
            <h2>Berita</h2>
          </div>
        </div>
      </div>
      <div class="row">

        @foreach ($berita as $item)
        <div class="col-md-6 col-lg-4">
          <div class="grid_blog_avatar bg-snow" data-aos="fade-up" data-aos-delay="0">
            <div class="body_blog">
              <a href="#" class="link_blog">
                <h4 class="title_blog">
                  {{ $item->title }}
                </h4>
                <p class="short_desc">{{ $item->description }}</p>
              </a>
              <a href="#">
                <div class="person mb-0 media">
                  <img src="{{ asset('assets/homepage/assets/img/persons/05.png') }}" alt="">
                  <div class="media-body">
                    <div class="txt">
                      <h3>{{ $item->user_name }}</h3>
                      <time>{{ dateTimeFormat($item->created_date)}}</time>
                      <time>{{ labelPosted($item->created_date, $item->updated_date) }}</time>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- End grid_blog_avatar -->
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- End. box_news_gray -->

</main>
@endsection
