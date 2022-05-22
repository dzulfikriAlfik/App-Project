<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

{{-- Content --}}
@section('content')

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Users</li>
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
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" id="filterPhone" disabled>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="filterStatus" disabled>
                                <option value="">-- Semua --</option>
                                <option value="1">Blocked</option>
                                <option value="0">Active</option>
                            </select>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select id="filterRole" disabled>
                                <option value="">-- Semua --</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="adminads">Admin Ads</option>
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
                                <th>Daftar</th>
                                <th>Role</th>
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

{{-- Modal insert data --}}
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-system" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">!will be set on the function!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" id="msgBox">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="role" id="role" aria-label="Default select example" disabled>
                            </select>
                        </div>
                    </div>
                    <div id="pass"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel btn-light" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-input btn-dark" onClick="save()">Save</button>
                </div>
        </div>
        </form>
    </div>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/users.js') }}"></script>
@endsection