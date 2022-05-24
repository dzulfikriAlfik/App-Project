<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
<link href="{{ asset("assets/vendors/cropperjs/cropper.min.css") }}" rel="stylesheet" />
@endsection

{{-- Content --}}
@section('content')

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">My Ads Lists</li>
   </ol>
</nav>

<!-- Content -->
<div class="row">
   {{-- Filter Search --}}
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body filter">
            <h6 class="card-title">Filter</h6>
            <div class="row">
               <div class="col-sm-6">
                  <div class="mb-3">
                     <label class="form-label">Title</label>
                     <input type="text" class="form-control" placeholder="Ads Title" id="filterAdsTitle" disabled>
                  </div>
               </div><!-- Col -->
               <div class="col-sm-6">
                  <div class="mb-3">
                     <label class="form-label">Placement</label>
                     <input type="text" class="form-control" placeholder="Ads Placement" id="filterPlacement" disabled>
                  </div>
               </div><!-- Col -->
               <div class="col-sm-6">
                  <div class="mb-3">
                     <label class="form-label">Dibuat pada</label>
                     <input type="text" class="form-control" placeholder="Dibuat pada" id="filterCreatedAt" disabled>
                  </div>
               </div><!-- Col -->
               <div class="col-sm-6">
                  <div class="mb-3">
                     <label class="form-label">Status</label>
                     <select id="filterAdsStatus">
                        <option value="">--Pilih satu--</option>
                        <option value="0">Pending</option>
                        <option value="1">Approved</option>
                        <option value="2">Rejected</option>
                        <option value="3">Suspended</option>
                     </select>
                  </div>
               </div><!-- Col -->
            </div><!-- Row -->
            <div class="row">
               <div class="col-sm-12" style="text-align: right;">
                  <button type="button" class="btn btn-light submit" onclick="clearFilter()" disabled><i data-feather="x" class="feather-16"></i> Clear</button>
                  <button type="button" class="btn btn-dark submit" onclick="search(1)" disabled><i data-feather="search" class="feather-16"></i> Search</button>
               </div><!-- Col -->
            </div><!-- Row -->
         </div>
      </div>
   </div>
</div>
{{-- Table --}}

<div class="card">
   <div class="card-body">
      {{-- Button Group --}}
      <div class="row">
         <div class="col-sm-12" style="text-align: right;">
            <button type="button" class="btn btn-light mb-3" onClick="add()" disabled><i data-feather="plus" class="feather-16"></i> Add</button>
         </div><!-- Col -->
      </div>
      <!-- End Button Group -->
      <div class="row">
         <div class="col-sm-12">
            <div class="table-responsive">
               <table id="data-table" class="table table-hover">
                  <thead>
                     <tr>
                        <th width="25px">No</th>
                        <th>Ads Image</th>
                        <th>Title</th>
                        {{-- <th>Deskripsi</th> --}}
                        <th>Status Iklan</th>
                        <th width="125px">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr id="loading" class="table-placeholder">
                        <td colspan="8">
                           <p><i class="fa fa-spinner fa-pulse"></i> Getting data...</p>
                        </td>
                     </tr>
                     <tr id="nodata" class="table-placeholder hide">
                        <td colspan="8">
                           <p><i class="fa fa-search"></i> No data found</p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div><!-- Col -->
         <div id="tableInfo" class="col-sm-6" style="margin-top: 10px;">

         </div><!-- Col -->
         <div class="col-sm-3" style="margin-top: 10px;">
            &nbsp;
         </div><!-- Col -->
         <div id="pagination" class="col-sm-3" style="margin-top: 10px;">
         </div><!-- Col -->
      </div><!-- Row -->
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
                  <div class="col-sm-12">
                     <div class="mb-3">
                        <input type="hidden" class="form-control" id="ads_id" name="ads_id">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" id="ads_title" name="ads_title" placeholder="Ads Title">
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="ads_desc" name="ads_desc" autocomplete="off" rows="5" placeholder="Ads Description"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="mb-3">
                        <label class="form-label">Ads Placement</label>
                        <select id="ads_placement">
                           <option value="">--Pilih satu--</option>
                           <option value="1">Square</option>
                           <option value="0.5">Portrait</option>
                           <option value="2">Landscape</option>
                        </select>
                     </div>
                  </div>
                  {{-- <div class="col-sm-12">
                     <div class="mb-3">
                        <label class="form-label">Ads Image</label>
                        <input type="text" class="form-control" id="ads_image" name="ads_image" placeholder="Ads Image">
                     </div>
                  </div> --}}
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
                        <img src="{{ url('assets/images/placeholder.jpg') }}" class="w-100" id="croppingImage" alt="cropper">
                     </div>
                     <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="form-group d-flex align-items-center flex-wrapp mb-0 mr-2 mt-3">
                           {{-- <label class="w-50 mr-3 mb-0 mb-2 mb-md-0 text-nowrap">Width (px) :</label>
                           <input type="number" value="300" class="form-control img-w mr-2 mb-2 mb-md-0 w-75" placeholder="Image width"> --}}
                           <button class="btn btn-primary crop mb-2 mb-md-0">Crop</button>
                        </div>
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
               <button type="button" class="btn btn-input btn-dark" onClick="save()">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
{{-- -------------------------- End Modal video -------------------------- --}}

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset("assets/vendors/cropperjs/cropper.min.js") }}"></script>
<script src="{{ asset('jquery/manageads.js') }}"></script>
{{-- <script src="{{ asset('jquery/cropper.js') }}"></script> --}}
@endsection
