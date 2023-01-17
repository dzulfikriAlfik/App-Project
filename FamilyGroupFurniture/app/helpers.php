<?php

function tgl_indo($tanggal)
{
  $bulan = array(
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function isActive($menu)
{
  return request()->is($menu) ? 'active' : '';
}

function isMenuOpen($menu)
{
  return request()->is($menu) ? 'menu-open' : '';
}

function humanTiming($date, $type = "past")
{
  $time = strtotime($date);
  $time = $type === "past" ? time() - $time : $time - time();
  $time = ($time < 1) ? 1 : $time;

  $tokens = [
    31536000 => "tahun",
    2592000  => "bulan",
    604800   => "minggu",
    86400    => "hari",
    3600     => "jam",
    60       => "menit",
    1        => "detik"
  ];

  foreach ($tokens as $unit => $text) {
    if ($time < $unit) continue;
    $numberOfUnits = floor($time / $unit);
    return $numberOfUnits . " " . $text . (($numberOfUnits > 1) ? "" : "");
  }
}

function fotoProduk($foto)
{
  return asset("assets/images/produk/$foto");
}

function countPembeli()
{
  return \App\Models\User::where("role", "pembeli")->count();
}

function dataCompany()
{
  return json_decode(json_encode([
    "nama"      => "Family Group Furniture",
    "alamat"    => "Blok Rebo Desa/Kec. Cikijing Kab. Majalengka",
    "telepon"   => "0821234566789",
    "email"     => "email@gmail.com",
    "sejarah"   => "Sejarah kami : Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium laboriosam deserunt omnis doloremque magnam. Nisi reprehenderit ipsum quos sit sint iusto esse? Consequatur nobis ut suscipit aspernatur eligendi magni amet.",
    "visi"      => "Visi Perusahaan",
    "misi"      => "Misi Perusahaan",
    "facebook"  => "https://facebook.com/",
    "instagram" => "https://instagram.com/",
    "twitter"   => "https://twitter.com/",
  ]));
}

function logoPerusahaan()
{
  return asset("assets/images/logo/logo.png");
}
