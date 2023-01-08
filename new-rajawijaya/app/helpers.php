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
