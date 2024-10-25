@extends('layout/sidebar')

@section('pagetitle')
Dashboard   
@endsection

@section('content')
<div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader h1">Sales</div>
          <div class="ms-auto lh-1">
          </div>
        </div>
        <div class="h1">75%</div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader h1">Revenue</div>
        </div>
        <div class="d-flex align-items-baseline">
          <div class="h1 mb-0 me-2">$4,300</div>
        </div>
      </div>
      <div id="chart-revenue-bg" class="chart-sm"></div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader h1">New clients</div>
        </div>
        <div class="d-flex align-items-baseline">
          <div class="h1 mb-3 me-2">6,782</div>
        </div>
        <div id="chart-new-clients" class="chart-sm"></div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader h1">Active users</div>
        </div>
        <div class="d-flex align-items-baseline">
          <div class="h1 mb-3 me-2">2,986</div>
        </div>
        <div id="chart-active-users" class="chart-sm"></div>
      </div>
    </div>
  </div>
@endsection