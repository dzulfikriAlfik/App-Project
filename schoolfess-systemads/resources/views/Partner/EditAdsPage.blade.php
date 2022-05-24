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
<link href="{{ asset("assets/vendors/cropperjs/cropper.min.css") }}" rel="stylesheet" />
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
         <form action="#" enctype="multipart/form-data">
            <div class="media d-block d-sm-flex">
               <input type="hidden" id="ads_image" value="{{ $ads->ads_image }}">
               <a href="#" onclick="openModal()" class="align-self-center ">
                  <img src="/storage/ads-image/{{ $ads->ads_image }}" class="mr-4 wd-100p wd-sm-200 mb-3 mb-sm-0 mr-3" alt="..." id="previewAdsImage" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="Clik gambar untuk mengubah">
               </a>
               <div class="media-body">
                  <div class="table-responsive">
                     <table class="table mt-3">
                        <tbody>
                           <tr>
                              <td class="left">Title</td>
                              <td class="colon">:</td>
                              <td>
                                 <input type="hidden" id="ads_id" value="{{ $ads->ads_id }}">
                                 <input type="text" class="form-control" id="ads_title" placeholder="Ads Title" value="{{ $ads->ads_title }}">
                              </td>
                           </tr>
                           <tr>
                              <td class="left">Deskripsi</td>
                              <td class="colon">:</td>
                              {{-- <td class="desc">{!! wordwrap($ads->ads_desc,80,"<br>\n") !!}</td> --}}
                              <td>
                                 <textarea id="ads_desc" cols="50" rows="5">{{ $ads->ads_desc }}</textarea>
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
                     </table>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

{{-- -------------------------- Modal video -------------------------- --}}
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-video" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">!will be set on the function!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="forms-sample" id="formDataVideo" action="#" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-12" id="msgBox">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <input type="file" name="img[]" class="file-upload-default" id="cropperImageUpload">
                        <div class="input-group col-xs-12">
                           <input type="text" id="upload_image" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                           <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                           </span>
                        </div>
                     </div>
                     <div>
                        <img src="/storage/ads-image/{{ $ads->ads_image }}" class="w-200" id="croppingImage" alt="cropper">
                     </div>
                     <div class="d-flex justify-content-between align-items-center flex-wrap">
                        {{-- <div class="form-group d-flex align-items-center flex-wrapp mb-0 mr-2 mt-3">
                           <button class="btn btn-primary crop mb-2 mb-md-0">Crop</button>
                        </div> --}}
                     </div>
                  </div>
                  <div class="col-md-4 ml-auto">
                     <h6 class="card-description mb-2 mb-md-4">Cropped Image: </h6>
                     <img class="w-100 cropped-img mt-2" src="" alt="" id="cropped_image">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-cancel btn-light" data-dismiss="modal">Cancel</button>
               {{-- <button type="button" class="btn btn-input btn-dark" onClick="save()">Save</button> --}}
               <button class="btn btn-primary crop mb-2 mb-md-0">Crop</button>
            </div>
         </form>
      </div>
   </div>
</div>
{{-- -------------------------- End Modal video -------------------------- --}}

<!-- rowContent -->
@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset("assets/vendors/cropperjs/cropper.min.js") }}"></script>
<script src="{{ asset('jquery/editads.js') }}"></script>
@endsection
