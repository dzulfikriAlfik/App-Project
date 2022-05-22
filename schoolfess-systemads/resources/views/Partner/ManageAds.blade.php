<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<style>
   .image_area {
      position: relative;
   }

   img {
      display: block;
      max-width: 100%;
   }

   .preview {
      overflow: hidden;
      width: 160px;
      height: 160px;
      margin: 10px;
      border: 1px solid red;
   }

   .modal-lg {
      max-width: 1000px !important;
   }

   .overlay {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 0.5);
      overflow: hidden;
      height: 0;
      transition: .5s ease;
      width: 100%;
   }

   .image_area:hover .overlay {
      height: 50%;
      cursor: pointer;
   }

   .text {
      color: #333;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
   }

</style>
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
                        <th>Deskripsi</th>
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
                           <option value="1/2">Portrait</option>
                           <option value="2/1">Landscape</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="mb-3">
                        <label class="form-label">Ads Image</label>
                        <input type="text" class="form-control" id="ads_image" name="ads_image" placeholder="Ads Image">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-cancel btn-light" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-input btn-dark" onClick="save()">Save</button>
               {{-- <button type="submit" class="btn btn-input btn-dark">Save</button> --}}
            </div>
         </form>
      </div>
   </div>
</div>
{{-- -------------------------- End Modal video -------------------------- --}}

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/manageads.js') }}"></script>
@endsection
