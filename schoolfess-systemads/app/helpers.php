<?php

function trimVideoUrl($video_link): string
{
   $filterLink = str_replace(["https://", "www."], "", $video_link);
   $separateToArray = explode("?", $filterLink);
   // unset($separateToArray[1]);
   $filteredLink = implode("", array($separateToArray[0]));
   return $filteredLink;
}

function humanizeNumber($num)
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

function checkStatusAds($ads_status)
{
   if ($ads_status == 0) {
      return '<span class="badge badge-warning">Pending</span>';
   } else if ($ads_status == 1) {
      return '<span class="badge badge-success">Approved</span>';
   } else if ($ads_status == 2) {
      return '<span class="badge badge-danger">Rejected</span>';
   } else {
      return '<span class="badge badge-danger">Suspended</span>';
   }
}

function checkRejectOrSuspend($ads_status, $reject_reason, $suspend_reason)
{
   if ($ads_status == 2) {
      $row = '<tr><td class="left">Reject Reason</td><td class="colon">:</td><td>' . $reject_reason . '</td></tr>';
      return $row;
   } else if ($ads_status == 3) {
      $row = '<tr><td class="left">Suspend Reason</td><td class="colon">:</td><td>' . $suspend_reason . '</td></tr>';
      return $row;
   }
}

function checkApprovedDt($ads_status, $ads_approved_date)
{
   if ($ads_status == 1) {
      $row = '<tr><td class="left">Ads Approved Date</td><td class="colon">:</td><td>' . dateTimeFormat($ads_approved_date) . '</td></tr>';
      return $row;
   }
}

function dateTimeFormat($time)
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
