<?php

function rupiah($angka)
{
  $hasil_rupiah = "Rp" . number_format($angka, 0, '', '.');
  return $hasil_rupiah;
}

function humanize_number($num)
{

  if ($num > 1000) {

    $x = round($num);
    $x_number_format = number_format($x);
    $x_array = explode(',', $x_number_format);
    $x_parts = array('rb', 'jt', 'b', 't');
    $x_count_parts = count($x_array) - 1;
    $x_display = $x;
    $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
    $x_display .= $x_parts[$x_count_parts - 1];

    return $x_display;
  }

  return $num;
}

function date_time_format($time)
{
  $tanggal = date('Y-m-d-H-i-s', strtotime($time));
  $bulan = array(
    1 =>   'Januari',
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
  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0] . ' ' . $pecahkan[3] . ':' . $pecahkan[4] . ':' . $pecahkan[5];
}

function activeClass($active, $menu)
{
  return $active == $menu ? 'active' : '';
}

function activeGroupClass($groupMenu)
{
  return Request::segment(1) === $groupMenu ? "active" : "";
}

function routeToSection($menu, $section)
{
  return Request::segment(1) !== $menu ? "/$menu/$section" : "/$menu#$section";
}
