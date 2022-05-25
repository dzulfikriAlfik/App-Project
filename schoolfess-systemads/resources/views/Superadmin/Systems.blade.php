<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Master</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data System</li>
   </ol>
</nav>

<!-- Content -->
<div class="row">
   {{-- ---------------------------- Filter Search --------------------------- --}}
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body filter">
            <h6 class="card-title">Filter</h6>
            <form>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" id="filterCategory" class="form-control" placeholder="Category">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Subcategory</label>
                        <input type="text" id="filterSubcategory" class="form-control" placeholder="Subcategory">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" id="filterCode" class="form-control" placeholder="Code">
                     </div>
                  </div>
               </div>
            </form>
            <div class="row">
               <div class="col-sm-12" style="text-align: right;">
                  <button type="button" class="btn btn-light submit" onclick="clearFilter()"><i data-feather="x" class="feather-16"></i> Clear</button>
                  <button type="button" class="btn btn-dark submit" onclick="search(1)"><i data-feather="search" class="feather-16"></i> Search</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- ---------------------------- End Filter Search --------------------------- --}}

{{-- ---------------------------- Table System ---------------------------- --}}
<div class="card">
   <div class="card-body">
      <div class="row">
         <div class="col-sm-12" style="text-align: right;">
            <button type="button" class="btn btn-light mb-3" onClick="add()"><i data-feather="plus" class="feather-16"></i> Add</button>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="table-responsive">
               <table id="data-table" class="table table-hover">
                  <thead>
                     <tr>
                        <th width="25px">No</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th width="125px">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr id="loading" class="table-placeholder">
                        <td colspan="7">
                           <p><i class="fa fa-spinner fa-pulse"></i> Getting data...</p>
                        </td>
                     </tr>
                     <tr id="nodata" class="table-placeholder hide">
                        <td colspan="7">
                           <p><i class="fa fa-search"></i> No data found</p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div id="tableInfo" class="col-sm-6" style="margin-top: 10px;">

         </div>
         <div class="col-sm-3" style="margin-top: 10px;">
            &nbsp;
         </div>
         <div id="pagination" class="col-sm-3" style="margin-top: 10px;">
            <!-- <ul class="pagination justify-content-end"> -->
            <!-- <li class="page-item"><a class="page-link" href="#"><i data-feather="chevron-left"></i></a></li><li class="page-item active"><a class="page-link" href="#">1</a></li><li class="page-item"><a class="page-link" href="#">2</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#"><i data-feather="chevron-right"></i></a></li> -->
            <!-- </ul> -->
         </div>
      </div>
   </div>
</div>
{{-- ---------------------------- End Table System ---------------------------- --}}

{{-- -------------------------- Modal system -------------------------- --}}
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
               <div class="row">
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <input type="hidden" class="form-control" id="sys_id" name="sys_id">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" id="sys_cat" name="sys_cat" placeholder="System Category">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Subcategory</label>
                        <input type="text" class="form-control" id="sys_sub_cat" name="sys_sub_cat" autocomplete="off" placeholder="System Sub Category">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" class="form-control" id="sys_cd" name="sys_cd" placeholder="System Code">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Value</label>
                        <input type="text" class="form-control" id="sys_val" name="sys_val" placeholder="System Value">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="mb-3">
                        <label class="form-label">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" placeholder="Remark">
                     </div>
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
{{-- -------------------------- End Modal system -------------------------- --}}
@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/superadmin/systems.js') }}"></script>
@endsection
