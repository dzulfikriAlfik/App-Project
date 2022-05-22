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
    {{-- Filter Search --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body filter">
                <h6 class="card-title">Filter</h6>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" id="filterUsername" disabled>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Name" id="filterName" disabled>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" placeholder="Email" id="filterEmail" disabled>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Perusahaan</label>
                            <input type="text" class="form-control" placeholder="Perusahaan" id="filterCompany" disabled>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Jenis Perusahaan</label>
                            <select id="filterCompanyType" disabled>
                                {{-- <option value="">-- Semua --</option>
                                @foreach ($company_type as $type)
                                <option value="{{ $type->company_type_id }}">{{ $type->company_type }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="filterStatus" disabled>
                                <option value="">-- Semua --</option>
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
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
                                <th>Name</th>
                                <th>Kontak</th>
                                <th>Nama Perusahaan</th>
                                <th>Status</th>
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
<script src="{{ asset('jquery/partnerlists.js') }}"></script>
@endsection