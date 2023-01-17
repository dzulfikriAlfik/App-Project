<!-- Menghubungkan dengan layouts -->
@extends('layouts/web')

@section("content")
<!-- Begin bread crumbs -->
<nav class="bread-crumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul class="bread-crumbs-list">
          <li>
            <a href="{{ url('') }}">Home</a>
            <i class="material-icons md-18">chevron_right</i>
          </li>
          <li><a href="#!">Kontak</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- End bread crumbs -->

<div class="section">
  <div class="container">
    <div class="row content-items">
      <div class="col-12">
        <div class="section-heading">
          <div class="section-subheading">Kami selalu siap dihubungi</div>
          <h1>Kontak Kami di :</h1>
        </div>
      </div>
      <div class="col-xl-4 col-md-5 content-item">
        <div class="contact-info section-bgc">
          <h3>Contact info</h3>
          <ul class="contact-list">
            <li>
              <i class="material-icons md-22">location_on</i>
              <div class="footer-contact-info">
                <a href="https://goo.gl/maps/vgUTRfyJUxwphjSq9" target="_blank">
                  {{ $company->alamat }}
                </a>
              </div>
            </li>
            <li>
              <i class="material-icons md-22 footer-contact-tel">smartphone</i>
              <div class="footer-contact-info">
                <a href="tel:{{ $company->telepon }}" class="formingHrefTel">{{ $company->telepon }}</a>
              </div>
            </li>
            <li>
              <i class="material-icons md-22 footer-contact-email">email</i>
              <div class="footer-contact-info">
                <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl-8 col-md-7 content-item">
        <form action="#!" method="post" class="contact-form contact-form-padding">
          <!-- Begin hidden Field for send form -->
          <input type="hidden" name="form_subject" value="Contact form">
          <!-- End hidden Field for send form -->
          <div class="row gutters-default">
            <div class="col-12">
              <h3>Hubungan kami di Whatsapp</h3>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
              <div class="form-field">
                <label for="contact-name" class="form-field-label">Nama anda</label>
                <input type="text" class="form-field-input" name="ContactName" value="" autocomplete="off" required="required" id="contact-name">
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
              <div class="form-field">
                <label for="contact-phone" class="form-field-label">Masukan No. Telephon</label>
                <input type="tel" class="form-field-input mask-phone" name="ContactPhone" value="" autocomplete="off" required="required" id="contact-phone">
              </div>
            </div>
            <div class="col-xl-4 col-12">
              <div class="form-field">
                <label for="contact-email" class="form-field-label">Masukan Email</label>
                <input type="email" class="form-field-input" name="ContactEmail" value="" autocomplete="off" required="required" id="contact-email">
              </div>
            </div>
            <div class="col-12">
              <div class="form-field">
                <label for="contact-message" class="form-field-label">Tulis pesan anda disini</label>
                <textarea name="ContactMessage" class="form-field-input" id="contact-message" cols="30" rows="6"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-btn">
                <button type="submit" class="btn btn-w240 ripple"><span>Kirim Pesan</span></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Begin map -->
<div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d767.5457715856635!2d108.36918276815193!3d-7.021298327228736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f3ffa7b045e7f%3A0xf036b6727b3749ce!2sFamily%20group%20furniture!5e0!3m2!1sen!2sid!4v1673958307065!5m2!1sen!2sid"
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- End map -->
@endsection
