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
      <li class="breadcrumb-item"><a href="#">User</a></li>
      <li class="breadcrumb-item active" id="userprofile" aria-current="page">Edit Profile</li>
   </ol>
</nav>

<!-- Content -->
<div class="row">

   <div class="col-md-4">&nbsp;</div>
   <div class="col-md-4">
      <div class="image_area">
         <form method="post">
            <label for="upload_image">
               <img src="{{ asset('assets/images/user.png') }}" id="uploaded_image" class="img-responsive img-circle" />
               <div class="overlay">
                  <div class="text">Click to Change Profile Image</div>
               </div>
               <input type="file" name="image" class="image" id="upload_image" style="display:none" />
            </label>
         </form>
      </div>
   </div>
   <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Crop Image Before Upload</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="img-container">
                  <div class="row">
                     <div class="col-md-8">
                        <img src="" id="sample_image" />
                     </div>
                     <div class="col-md-4">
                        <div class="preview"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" id="crop" class="btn btn-primary">Crop</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>

</div> <!-- rowContent -->
@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/userprofile.js') }}"></script>
@endsection