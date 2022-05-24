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
      <li class="breadcrumb-item"><a href="javascript:history.back()">My Ads Lists</a></li>
      <li class="breadcrumb-item active" id="userprofile" aria-current="page">Edit Ads</li>
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
                     <form action="#">
                        <tbody>
                           <tr>
                              <td class="left">Title</td>
                              <td class="colon">:</td>
                              <td>
                                 <input type="hidden" id="ads_id" value="{{ $ads->ads_id }}">
                                 <input type="hidden" id="ads_image" value="{{ $ads->ads_image }}">
                                 <input type="text" class="form-control" id="ads_title" placeholder="Ads Title" value="{{ $ads->ads_title }}">
                              </td>
                           </tr>
                           <tr>
                              <td class="left">Deskripsi</td>
                              <td class="colon">:</td>
                              {{-- <td class="desc">{!! wordwrap($ads->ads_desc,80,"<br>\n") !!}</td> --}}
                              <td>
                                 <textarea id="ads_desc" cols="50" rows="5">
                                 {{ $ads->ads_title }}
                              </textarea>
                              </td>
                           </tr>
                           <tr>
                              <td class="left">Ads Link</td>
                              <td class="colon">:</td>
                              <td>
                                 <input type="text" class="form-control" id="ads_link" placeholder="Ads Link" value="{{ $ads->ads_link }}">
                              </td>
                           </tr>
                           <tr>
                              <td class="left">Ads Placement</td>
                              <td class="colon">:</td>
                              <td>
                                 <select id="ads_placement">
                                    <option value="">-- Pilih Satu --</option>
                                    <option {{ ($ads->ads_placement) == '1' ? 'selected' : '' }} value="1">Square</option>
                                    <option {{ ($ads->ads_placement) == '0.5' ? 'selected' : '' }} value="0.5">Portrait</option>
                                    <option {{ ($ads->ads_placement) == '2' ? 'selected' : '' }} value="2">Landscape</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td class="left"></td>
                              <td class="colon"></td>
                              <td class="text-right">
                                 <button type="button" class="btn btn-input btn-dark" onClick="save()">Save</button>
                              </td>
                           </tr>
                        </tbody>
                     </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- rowContent -->
@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/editads.js') }}"></script>
@endsection
