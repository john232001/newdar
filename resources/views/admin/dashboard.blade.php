@extends('layouts.app')
    
@section('content')

@include('admin.admin_navbar')

<div class="container mb-4">
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
                <img src="{{ asset('assets/img/dashboard-award.png')}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Total Award Land Area</h5>
                  <p class="card-text">{{ $totalAwardland }} <span style="font-size: 16px;">Hectares</span></p>
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
                <img src="{{ asset('assets/img/dashboard-lots.png')}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8  ">
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
                  <img src="{{ asset('assets/img/dashboard-valuations.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total Area Valuation</h5>
                    <p class="card-text">{{ $totalValuation }} <span style="font-size: 16px;">Hectares</span></p>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <img src="{{ asset('assets/img/dashboard-users.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Total Carpable Area</h5>
                    <p class="card-text">{{ $totalCarp }} <span style="font-size: 16px;">Hectares</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>   
  </div>
@endsection