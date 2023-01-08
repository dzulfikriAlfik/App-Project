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

function companyLogo()
{
  $logo = \App\Models\CompanyProfile::all()->first()->logo;

  return asset("assets/img/logo/$logo");
}

function mitraLogo($userId)
{
  $logo = \App\Models\User::where("id", $userId)->first()->logo_mitra;

  return asset("assets/img/mitra/$logo");
}

function fotoKegiatan($id)
{
  $foto = \App\Models\Gallery::where("id", $id)->first()->foto;

  return asset("assets/img/gallery/$foto");
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
