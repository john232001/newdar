@extends('layouts.home')

@section('content')
    @include('layouts.home-navbar')

    <!-- Services -->
    <section id="services" class="bg-white p-5">
    <div class="container mt-5">
      <h2 class="text-center mb-5">Services</h2>
      <div class="row text-center g-4">
        <div class=" col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://darcaraga.files.wordpress.com/2019/07/lts_banner_final_5b24574e8f9c45_35679073.jpg?w=616" class="card-img-top" alt="landtenureservices" style="width: 100%">
              <div class="card-body">
                <h3 class=" mb-3">Land Tenure Services</h3>
                <span class="">Land Tenure Services is operationalized either through land acquisition and distribution (LAD) or leasehold operations. LAD involves the redistribution of government and private agricultural lands to landless farmers and farm workers. </span>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://darcaraga.files.wordpress.com/2019/07/als_5b2458b8206885_06676945.jpg" class="card-img-top" alt="landtenureservices" style="width: 100%">
              <div class="card-body">
                <h3 class="mb-3">Agrarian Legal Services</h3>
                <span class="">This is complemented with two programs, namely: agrarian legal assistance (ALA) under the Bureau of Agrarian Legal Assistance (BALA) and adjudication of agrarian cases under the Department of Agrarian Reform Adjudication Board (DARAB).</span>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://media.dar.gov.ph/source/2018/06/16/APAS_5b245f99dc9e57_40698601.jpg" class="card-img-top" alt="landtenureservices" style="width: 100%">
              <div class="card-body">
                <h3 class="mb-3">Agrarian Policy Advisory Services</h3>
                <span>This MFO on Agrarian Policy Advisory Services (APAS) covers policy advisory formulation, updating and dissemination. For FY 2015, the Department of Agrarian Reform has signed and issued 5 Administrative Orders and 1 Memorandum Circular. </span>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://media.dar.gov.ph/source/2021/05/13/arb-installation.jpg" class="card-img-top" alt="landtenureservices" style="height: 132px; width: 100%;">
              <div class="card-body">
                <h3 style="margin-bottom: 50px; margin-top: 20px;">ARBDSP</h3>
                <span>Technical Advisory Support Services (TASS) is an agrarian reform component that aims to capacitate Agrarian Reform Beneficiaries (ARBs)  and provide them access to neccessary support services to make their land productive. </span>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

@endsection