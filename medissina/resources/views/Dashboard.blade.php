<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

{{-- Content --}}
@section('content')

<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>

<!-- Content -->
<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Total Users</h6>
            </div>
            <h6 class="card-title mb-4"> </h6>
            <div class="row">
              <div class="col-2">
                <i data-feather="users" style="height: 18px;"></i>
              </div>
              <div class="col-10">
                <h3 class="mb-2" style="font-size: 18px;" id="total_users">-</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <i data-feather="users" style="height: 18px;"></i>
              </div>
              <div class="col-10">
                <h3 class="mb-2" style="font-size: 18px;" id="total_users_today">-</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-1">Demografi Data</h6>
            </div>
            <h6 class="card-title mb-4"> </h6>
            <div class="row">
              <div class="col-2">
                <i data-feather="map-pin" style="height: 18px;"></i>
              </div>
              <div class="col-10">
                <h3 class="mb-2" style="font-size: 18px;" id="total_users_domisili">-</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <i data-feather="calendar" style="height: 18px;"></i>
              </div>
              <div class="col-10">
                <h3 class="mb-2" style="font-size: 18px;" id="total_users_birthyear">-</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->
<div class="row flex-grow">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0">User Growth</h6>
        </div>
        <div class="row align-items-start mb-2">
          <div class="btn-group mb-3 mb-md-0" role="group" aria-label="" style="position: absolute;right: 170px;top: 20px;">
            <button type="button" id="btnRecalculate" class="btn btn-primary" onclick="recalculateUsersGrowth(7)">Recal7</button>
            <button type="button" id="btnRecalculate" class="btn btn-primary" onclick="recalculateUsersGrowth(30)">Recal30</button>
          </div>
          <div class="btn-group mb-3 mb-md-0" role="group" aria-label="" style="position: absolute;right: 20px;top: 20px;">
            <button type="button" id="btnUGWeek" class="btn btn-primary" onclick="changeToWeekUsers()">Week</button>
            <button type="button" id="btnUGMonth" class="btn btn-outline-primary" onclick="changeToMonthUsers()">Month</button>
          </div>
        </div>
        <div class="row" style="margin-top: 20px;">
          <div class="col-12" id="usersChartArea">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0">Menfess Growth</h6>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="menfessChart">
            </canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection
