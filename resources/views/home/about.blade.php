@extends('layouts.home')

@section('content')
    @include('layouts.home-navbar')

    <!-- About Us Sections -->
    <section class="p-5 bg-light" id="about" style="height: 100vh;">
    <div class="container mt-5">
      <h2 class="text-center mb-5">About Us</h2>
      <div class="row align-items-center justify-content-between mb-5">
        <div class="col-md">
          <img src="https://image.slidesharecdn.com/historyofagrarianreform-160902051208/95/history-of-agrarian-reform-1-638.jpg?cb=1472793223" class="img-fluid rounded-3" alt="" />
        </div>
        <div class="col-md p-5">
          <h2>Agrarian Reform History</h2>
          <p>
              The history of agrarian reform in the Philippines dates back to the early 20th century,
               when the American colonial government implemented a number of measures aimed at improving the lives of Filipino farmers. These measures included the Homestead Act of 1903, which allowed individuals to claim land for free if they cultivated it for five years,
               and the Cadastral Act of 1913, which established a system for surveying and registering land ownership.
          </p>
          <a href="#mmv" class="btn btn-success mt-3">
            <i class="fa fa-arrow-down"></i> See More 
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Mandate, Mission, Vision Sections -->
<section id="mmv" class="bg-white p-5">
    <div class="container">
      <div class="row align-items-center justify-content-between mb-5">
          <div class="col-md p-5">
            <h2>Mandate and Functions</h2>
            <p>
              To lead in the implementation of the Comprehensive Agrarian Reform Program (CARP) through Land Tenure Improvement (LTI),
               Agrarian Justice and Coordinated delivery of essential Support Services to client beneficiaries. <br>
               <ul>
                  <li>To provide Land Tenure security to landless farmers through land acquisition and distribution; leasehold arrangements’ implementation and other LTI services;</li>
                  <li>To provide legal intervention to Agrarian Reform Beneficiaries (ARBS) through adjudication of agrarian cases and agrarian legal assistance;</li>
                  <li>To implement, facilitate and coordinate the delivery of support services to ARBs through Social Infrastructure and Local Capability Building (SILCAB); Sustainable Agribusiness and Rural Enterprise Development (SARED); and Access Facilitation and Enhancement Services (AFAES).</li>
               </ul>
            </p>
          </div>
          <div class="col-md">
              <img src="{{ asset('assets/img/mandate.png') }}" class="img-fluid" alt="" />
          </div>
      </div>
      <div class="row align-items-center justify-content-between mb-5">
          <div class="col-md">
            <img src="{{ asset('assets/img/mission.png')}}" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>Mission Statement</h2>
            <p>
              DAR is the lead government agency that upholds and implements comprehensive and genuine agrarian reform which actualizes equitable land distribution, ownership, agricultural productivity, and tenurial security for,
               of and with the tillers of the land towards the improvement of their quality of life.
            </p>
          </div>
        </div>
        <div class="row align-items-center justify-content-between mb-5">
          <div class="col-md p-5">
            <h2>Vision</h2>
            <p>
              A just, safe and equitable society that upholds the rights of tillers to own, control, secure, cultivate and enhance their agricultural lands,
               improve their quality of life towards rural development and national industrialization.
            </p>
          </div>
          <div class="col-md">
              <img src="{{ asset('assets/img/vision.png') }}" class="img-fluid" alt="" />
          </div>
      </div>
    </div>
  </section>

@endsection