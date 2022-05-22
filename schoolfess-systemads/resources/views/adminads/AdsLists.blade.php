<!-- Menghubungkan dengan view template cms -->
@extends('layouts/cms')

{{-- Content --}}
@section('content')

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Ads Lists</li>
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
                            <label class="form-label">Dibuat oleh</label>
                            <select id="filterCompanyName">
                                {{-- <option value="">-- Semua --</option>
                                @foreach ($company_name as $company)
                                <option value="{{ $company->user_company }}">{{ $company->user_company }}</option>
                                @endforeach --}}
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
                <!-- <button type="button" class="btn btn-light mb-3" onClick="add()" disabled><i data-feather="plus" class="feather-16"></i> Add</button> -->
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
                                <th>Nama Perusahaan</th>
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
{{-- End Table --}}

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/adslists.js') }}"></script>
@endsection