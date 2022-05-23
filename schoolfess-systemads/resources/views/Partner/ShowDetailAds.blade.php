<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

{{-- Content --}}
@section('content')

@section('custom-header')
<style>
   td.desc {
      line-height: 25px;
   }

   td {
      height: 40px;
   }

   .left {
      width: 130px;
   }

   .colon {
      width: 10px
   }

</style>
@endsection

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/cms/manage_ads">My Ads Lists</a></li>
      <li class="breadcrumb-item active" id="userprofile" aria-current="page">Detail Ads</li>
   </ol>
</nav>

<!-- Content -->
<div class="row">
   <div class="card">
      <div class="card-body">
         <div class="media d-block d-sm-flex">
            <img src="/storage/ads-image/{{ $ads->ads_image }}" class="align-self-center mr-4 wd-100p wd-sm-200 mb-3 mb-sm-0 mr-3" alt="...">
            <div class="media-body">
               <div class="table-responsive">
                  <table class="table mt-3">
                     <tbody>
                        <tr>
                           <td class="left">Title</td>
                           <td class="colon">:</td>
                           <td>{{ $ads->ads_title }}</td>
                        </tr>
                        <tr>
                           <td class="left">Deskripsi</td>
                           <td class="colon">:</td>
                           <td class="desc">{!! wordwrap($ads->ads_desc,80,"<br>\n") !!}</td>
                        </tr>
                        <tr>
                           <td class="left">Ads Link</td>
                           <td class="colon">:</td>
                           <td>{{ $ads->ads_link }}</td>
                        </tr>
                        <tr>
                           <td class="left">Ads View</td>
                           <td class="colon">:</td>
                           <td>{{ $ads->ads_view }}</td>
                        </tr>
                        <tr>
                           <td class="left">Ads Click</td>
                           <td class="colon">:</td>
                           <td>{{ $ads->ads_click }}</td>
                        </tr>
                        <tr>
                           <td class="left">Status</td>
                           <td class="colon">:</td>
                           <td>{!! checkStatusAds($ads->ads_status) !!}</td>
                        </tr>
                        {!! checkApprovedDt($ads->ads_status, $ads->approved_dt) !!}
                        {!! checkRejectOrSuspend($ads->ads_status, $ads->reject_reason, $ads->suspend_reason) !!}
                        <tr>
                           <td class="left">Ads Created Date</td>
                           <td class="colon">:</td>
                           <td>{{ dateTimeFormat($ads->created_dt) }}</td>
                        </tr>
                        <tr>
                           <td class="left">Ads Updated Date</td>
                           <td class="colon">:</td>
                           <td>{{ dateTimeFormat($ads->updated_dt) }}</td>
                        </tr>
                        <tr>
                           <td class="left">Ads Start Date</td>
                           <td class="colon">:</td>
                           <td>{{ dateTimeFormat($ads->ads_start_date) }}</td>
                        </tr>
                        <tr>
                           <td class="left">Ads End Date</td>
                           <td class="colon">:</td>
                           <td>{{ dateTimeFormat($ads->ads_end_date) }}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

{{-- <div class="row d-flex justify-content-center">
   <div class="card">
      <img src="/storage/ads-image/{{ $ads->ads_image }}" class="card-img-top" alt="...">
<div class="card-body">
   <h5 class="card-title">{{ $ads->ads_title }}</h5>
   <p class="card-text">{{ $ads->ads_desc }}</p>
   <p class="card-text">{{ $ads->ads_link }}</p>
   <p class="card-text">{!! checkStatusAds($ads->ads_status) !!}</p>
   <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
</div>
</div>
</div> --}}
<!-- rowContent -->
@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/detailads.js') }}"></script>
@endsection
