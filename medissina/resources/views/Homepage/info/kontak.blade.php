@extends('_layouts/home')

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <!-- Start section_contact_four -->
  <section class="section_contact_five contact_six margin-t-5 padding-t-7 margin-b-10">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if (session()->has('failed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="title_sections_inner">
            <h2>Hubungi Kami</h2>
          </div>
          <div class="information_agency d-md-flex">
            <div class="item_data mr-5">
              <p>Whatsapp</p>
              <a href="https://wa.me/{{ $lembaga->no_hp }}" target="_blank" class="tel">{{ $lembaga->no_hp }}</a>
            </div>
            <div class="item_data">
              <p>Email</p>
              <a class="tel" href="mailto:{{ $lembaga->email }}">{{ $lembaga->email }}</a>
            </div>
          </div>

          <h3 class="font-s-16 font-w-500 c-gray margin-t-4">Alamat Kantor</h3>
          <p class="font-s-16">{{ $lembaga->alamat }}</p>

          <div class="information_agency margin-t-4">
            <div class="item_data">
              <p>Buka</p>
              <div>Senin - Jum'at (07.00 - 12.00)</div>
            </div>
          </div>

          <div class="scoail__media">
            <a href="">
              <i class="tio dribbble"></i>
            </a>
            <a href="">
              <i class="tio github"></i>
            </a>
            <a href="">
              <i class="tio twitter"></i>
            </a>
          </div>

        </div>
        <div class="col-lg-6 ml-auto">
          <div class="form_cc_four">
            <form action="{{ url('/kirim-masukan') }}" method="POST" class="row" id="form-masukan">
              @csrf
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Subjek</label>
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Message</label>
                  <textarea class="form-control" rows="7" name="message" id="message" placeholder="Masukkan pesan anda disini secara rinci dan jelas"></textarea>
                </div>
              </div>

              <div class="col-12 d-md-flex justify-content-between margin-t-2">
                <button type="submit" class="btn btn_md_primary bg-red rounded-8 c-white h-fit-content">
                  Kirim
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End. section_contact_four -->

  <!-- Start sec__office_location -->
  <section class="sec__office_location with_map_office" style="padding: 10px">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8522.627631403124!2d108.36549900018741!3d-7.020723826773184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f3f9f3f3d4457%3A0xbf5ec89ef5b5c120!2sTK%20ISLAM%20MEDISSINA%20CIKIJING!5e0!3m2!1sen!2sid!4v1667109060421!5m2!1sen!2sid"
      width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

  </section>
  <!-- End. sec__office_location -->

</main>
@endsection

@section("jquery")
<script>
  $("#form-masukan").on("submit", function (e) {
    let validate = true

    if (commonJS.trimText($("#nama_lengkap").val()) == "") {
      validate = false
      commonJS.swalError("Nama lengkap tidak boleh kosong")
    }

    if (commonJS.trimText($("#email").val()) == "") {
      validate = false
      commonJS.swalError("Email tidak boleh kosong")
    }

    if (commonJS.trimText($("#subject").val()) == "") {
      validate = false
      commonJS.swalError("Subjek tidak boleh kosong")
    }

    if (commonJS.trimText($("#message").val()) == "") {
      validate = false
      commonJS.swalError("Pesan tidak boleh kosong")
    }

    if (!validate) {
      e.preventDefault();
    }
  });

</script>
@endsection
