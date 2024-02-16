@extends('layouts.app')
    
@section('content')

@include('staff.staff_navbar')

<div class="container">
  <h2 class="title-text">Dashboard</h2>
  <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <img src="{{ asset('assets/img/dashboard-landholdings.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total Landholdings</h5>
                    <p class="card-text">{{ $totalLandholdings}}</p>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <img src="{{ asset('assets/img/dashboard-lots.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total Lots</h5>
                    <p class="card-text">{{ $totalLots }}</p>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <img src="{{ asset('assets/img/dashboard-arbs.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total ARBs</h5>
                    <p class="card-text">{{ $totalArbs }}</p>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <img src="{{ asset('assets/img/dashboard-award.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total Award Lands</h5>
                    <p class="card-text">{{ $totalAwardland }}</p>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <img src="{{ asset('assets/img/dashboard-valuations.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total Valuations</h5>
                    <p class="card-text">{{ $totalValuation }}</p>
                  </div>
                </div>
              </div>
            </div>
      </div>
</div>
@endsection