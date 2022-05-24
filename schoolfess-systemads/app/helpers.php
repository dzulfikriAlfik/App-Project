<?php

function trim_video_url($video_link): string
{
   $filterLink = str_replace(["https://", "www."], "", $video_link);
   $separateToArray = explode("?", $filterLink);
   // unset($separateToArray[1]);
   $filteredLink = implode("", array($separateToArray[0]));
   return $filteredLink;
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

function status_for_action_button($ads_status, $ads_id)
{
   if ($ads_status == 0) {
      return "<button type='button' onClick='approve(\"$ads_id\")' class='btn btn-danger'>Approve</button>&nbsp;<button type='button' onClick='commonJS.swalAdsAction(\"reject\",\"$ads_id\", reload)' class='btn btn-primary'>Reject</button>";
   } else if ($ads_status == 1) {
      return "<button type='button' onClick='commonJS.swalAdsAction(\"suspend\",\"$ads_id\", reload)' class='btn btn-primary'>Suspend</button>";
   } else {
      return "<button type='button' onClick='approve(\"$ads_id\")' class='btn btn-danger'>Reactivate</button>";
   }
}

function check_Status_ads($ads_status, $ads_id)
{
   if ($ads_status == 0) {
      return '<span class="badge badge-warning">Pending</span>';
   } else if ($ads_status == 1) {
      return '<span class="badge badge-success">Approved</span>';
   } else if ($ads_status == 2) {
      return '<span class="badge badge-danger">Rejected</span> <a href="/cms/ads_edit/' . $ads_id . '" class="badge badge-warning">Edit</a>';
   } else {
      return '<span class="badge badge-danger">Suspended</span> <a href="/cms/ads_edit/' . $ads_id . '" class="badge badge-warning">Edit</a>';
   }
}

function admin_check_status_ads($ads_status)
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

function check_reject_or_suspend($ads_status, $reject_reason, $suspend_reason)
{
   if ($ads_status == 2) {
      $row = '<tr><td class="left">Reject Reason</td><td class="colon">:</td><td>' . $reject_reason . '</td></tr>';
      return $row;
   } else if ($ads_status == 3) {
      $row = '<tr><td class="left">Suspend Reason</td><td class="colon">:</td><td>' . $suspend_reason . '</td></tr>';
      return $row;
   }
}

function check_approved_date($ads_status, $ads_approved_date)
{
   if ($ads_status == 1) {
      $row = '<tr><td class="left">Ads Approved Date</td><td class="colon">:</td><td>' . date_time_format($ads_approved_date) . '</td></tr>';
      return $row;
   }
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
