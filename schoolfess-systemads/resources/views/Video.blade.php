<!-- Menghubungkan dengan view template cms -->
@extends('layouts/cms')

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Data Master</a></li>
		<li class="breadcrumb-item active" aria-current="page">Data Video</li>
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
								<label class="form-label">Title</label>
								<input type="text" id="filterTitle" class="form-control" placeholder="Title">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Link</label>
								<input type="text" id="filterLink" class="form-control" placeholder="Link">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Subject</label>
								<input type="text" id="filterSubject" class="form-control" placeholder="Subject">
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

{{-- ---------------------------- Table video ---------------------------- --}}
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
								<th>Thumbnail</th>
								<th>Title</th>
								<th>Link</th>
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
{{-- ---------------------------- End Table video ---------------------------- --}}

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
								<input type="hidden" class="form-control" id="video_id" name="video_id">
								<label class="form-label">Title</label>
								<input type="text" class="form-control" id="video_title" name="video_title" placeholder="Video Title">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="mb-3">
								<label class="form-label">Description</label>
								{{-- <input type="text" class="form-control" id="video_desc" name="video_desc" autocomplete="off" placeholder="Video Description"> --}}
								<textarea class="form-control" id="video_desc" name="video_desc" autocomplete="off" rows="5" placeholder="Video Description"></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="mb-3">
								<label class="form-label">Link</label>
								<input type="text" class="form-control" id="video_link" name="video_link" placeholder="Video Link">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<label class="form-label">Source</label>
								<select class="form-select" id="video_source" >
									<option value="youtube" selected>Youtube</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<label class="form-label">Subject</label>
								<input type="text" class="form-control" id="video_subject" name="video_subject" placeholder="Video Subject">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="mb-3">
								<label class="form-label">Thumbnail</label>
								<img class="img-preview img-fluid col-sm-5 mb-3">
								<input type="file" class="form-control" id="video_thumbnail" name="video_thumbnail" placeholder="Thumbnail" onchange="previewImage()">
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
<script src="{{ asset('jquery/video.js') }}"></script>
@endsection