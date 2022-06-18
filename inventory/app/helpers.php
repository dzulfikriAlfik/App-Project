<?php

function total_harga($satuan, $qty)
{
   return rupiah((int) $satuan * $qty);
}

function rupiah($angka)
{
   $hasil_rupiah = "Rp" . number_format($angka, 0, '', '.');
   return $hasil_rupiah;
}

function tanggal_format($time)
{
   $tanggal = date('Y-m-d', strtotime($time));
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
   return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
