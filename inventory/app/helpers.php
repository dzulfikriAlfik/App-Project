<?php

function totalHarga($satuan, $qty)
{
   return rupiah((int) $satuan * $qty);
}

function rupiah($angka)
{
   $hasil_rupiah = "Rp" . number_format($angka, 0, '', '.');
   return $hasil_rupiah;
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
   return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0] . ' ' . $pecahkan[3] . ':' . $pecahkan[4] . ':' . $pecahkan[5];
}
