<!-- Menghubungkan dengan view template cms -->
@extends('layouts/cms')

{{-- Content --}}
@section('content')

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Partner Lists</li>
    </ol>
</nav>

<!-- Content -->
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">

    </div>
</div> <!-- row -->

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/partnerlists.js') }}"></script>
@endsection