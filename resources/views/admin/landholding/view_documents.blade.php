@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')

  <div class="container">
    <h2 class="title-text text-center">Download Scanned Files</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-12">
            <div class="card rounded-4">
              <div class="card-body d-flex justify-content-center">
                <img src="{{ asset('assets/img/dashboard-landholdings.png')}}" class="hero-img" alt="dar-logo" style="width: 150px;">
                @foreach($data as $items )
                  <div class="card-download border-0">
                    <h5 class="download-title text-center text-success mt-4" style="font-weight: 800;">{{ $items->firstname }} {{ $items->familyname }}</h5>
                    <div class="card-body">
                      <table class="table">
                        <tr>
                          <th>Title Documents</th>
                          <td>
                            <a href="{{ route('download_title', $items->id )}}" class="btn btn-success btn-sm rounded-5"><i class="fa-solid fa-download"></i> Download</a>
                          </td>
                        </tr>
                        <tr>
                          <th>Tax Declaration</th>
                          <td>
                            <a href="{{ route('download_taxDec', $items->id )}}" class="btn btn-success btn-sm rounded-5"><i class="fa-solid fa-download"></i> Download</a>
                          </td>
                        </tr>
                    </table>
                    </div>
                  </div>
                @endforeach
              </div>
              <a href="{{ route('landholding')}}" class="btn btn-success rounded-4">Go back</a>
            </div>
        </div>
    </div>
  </div>

@endsection