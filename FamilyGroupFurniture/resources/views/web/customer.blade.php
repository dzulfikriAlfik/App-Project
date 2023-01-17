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
          <li><a href="#!">Daftar Customer</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- End bread crumbs -->

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading heading-center">
          <h1>Daftar Customer Kami</h1>
        </div>
        <div class="content">
          <p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find
            exactly what he/she is looking for. With advanced features of activating account and new login widgets,
            you will definitely have a great experience of using our web page.
          </p>

          <h4>Testimoni</h4>
          <blockquote>
            <p>Bahannya sangat bagus, designnya pun sangat enak dilihat. Pokoknya saya suka</p>
            <footer>Oleh Yandra Roni</footer>
          </blockquote>

          <br>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Customer</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($mitra_kami as $mitra) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $mitra->nama ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <br>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
