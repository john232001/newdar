@extends('layouts.app')

@section('content')

@include('staff.staff_navbar')

  <div class="container-fluid mx-1">
    <h2 class="title-text">Landholdings</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <div class="btn">
                    <div class="row">
                      <div class="col-lg-10 col-md-6 col-sm-12">
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-12">
                        <form class="d-flex" role="search" method="get" action="{{ route('staff_search') }}">
                          @csrf
                          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                      </div>
                    </div>
                  </div>
                <table id="landholdings" class="table table-responsive table-striped">
                  <thead>
                      <tr>
                        <th>LHID</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>OCT/TCT No.</th>
                        <th>Survey No.</th>
                        <th>Survey Area</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($result as $data)
                        <tr>
                            <td><a href="{{ route('staff_landholding_view', $data->id )}}" class="btn-link ">{{ $data->lhid}}</a></td>
                            <td>{{ $data->firstname}}</td>
                            <td>{{ $data->middlename}}</td>
                            <td>{{ $data->familyname}}</td>
                            <td>{{ $data->muni_name}}</td>
                            <td>{{ $data->brgy_names}}</td>
                            <td>{{ $data->octNo}}</td>
                            <td>{{ $data->surveyNo}}</td>
                            <td>{{ $data->surveyArea}}</td>
                            <td>
                                <a href="{{ route('staff_uploaded_file', $data->id ) }}" class="btn btn-secondary btn-sm mb-2"><i class="fa-solid fa-magnifying-glass"></i> View Scanned Documents</a>
                            </td>
                        @empty
                            <td colspan="10" style="text-align: center;">No record Found</td>
                        </tr>
                      @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  
@endsection