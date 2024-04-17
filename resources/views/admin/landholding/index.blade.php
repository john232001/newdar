@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')

  <div class="container-fluid mx-1">
    <h2 class="title-text">Landholdings</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-9">
            <div class="card p-5 rounded-4">
              <div class="btn">
                <div class="row">
                  <div class="col-lg-9 col-md-6 col-sm-12">
                    <button class="btn btn-success float-start btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa-solid fa-add"></i> Add landholding</button>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <form class="d-flex" role="search" method="get" action="{{ route('search') }}">
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
                      @foreach ($landholdings as $data)
                        <tr>
                            <td data-label="lhid"><a href="{{ route('landholding_view', $data->id )}}" class="btn-link ">{{ $data->lhid}}</a></td>
                            <td data-label="firstname">{{ $data->firstname}}</td>
                            <td data-label="middlename">{{ $data->middlename}}</td>
                            <td data-label="familyname">{{ $data->familyname}}</td>
                            <td data-label="municipality">{{ $data->muni_name}}</td>
                            <td data-label="barangay">{{ $data->brgy_names}}</td>
                            <td data-label="OCT No.">{{ $data->octNo}}</td>
                            <td data-label="survey No.">{{ $data->surveyNo}}</td>
                            <td data-label="survey Area">{{ $data->surveyArea}}</td>
                            <td data-label="action">
                                <a href="" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editmodal{{ $data->id }}"> <i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                                <a href="{{ route('uploaded_file', $data->id ) }}" class="btn btn-secondary btn-sm mb-2"><i class="fa-solid fa-magnifying-glass"></i> View Scanned Documents</a>
                            </td>
                            @include('admin.landholding.edit')
                            @include('admin.landholding.delete')
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <div class="paginate d-flex justify-content-center mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      {{ $landholdings->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  @include('admin.landholding.create')
@endsection