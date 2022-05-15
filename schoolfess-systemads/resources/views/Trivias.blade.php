<!-- Menghubungkan dengan view template cms -->
@extends('layouts/cms')

{{-- Content --}}
@section('content')

    <!-- Breadcrumb -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Trivia</li>
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
                                <label class="form-label">Content</label>
                                <input type="text" class="form-control" placeholder="Content" id="filterContent" disabled>
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
                                    <th>ID</th>
                                    <th>Content</th>
                                    <th width="125px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="loading" class="table-placeholder">
                                    <td colspan="4"><p><i class="fa fa-spinner fa-pulse"></i> Getting data...</p></td>
                                </tr>
                                <tr id="nodata" class="table-placeholder hide">
                                    <td colspan="4"><p><i class="fa fa-search"></i> No data found</p></td>
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

    {{-- Modal insert data --}}
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-system" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">!will be set on the function!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden= "true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" id="msgBox">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="trivia_id" name="trivia_id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Content</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="trivia_text" name="trivia_text" placeholder="Trivia" autofocus>
                        </div>
                    </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel btn-light" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-input btn-dark" onClick="save()">Save</button>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/trivias.js') }}"></script>
@endsection