<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

{{-- Content --}}
@section('content')

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Set Ads</li>
   </ol>
</nav>

<!-- Content -->
<div class="row">
   <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
         {{--  --}}
      </div>
   </div>
</div> <!-- row -->

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/setads.js') }}"></script>
@endsection
