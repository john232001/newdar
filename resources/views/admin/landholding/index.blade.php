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
                  <div class="col-lg-10 col-md-6 col-sm-12">
                    <button class="btn btn-success float-start btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa-solid fa-add"></i> Add landholding</button>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12">
                    <form class="d-flex" role="search" method="get" action="{{ route('search') }}">
                      @csrf
                      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </div>
                <table class="table table-responsive table-striped">
                  <thead>
                      <tr>
                        <th data-label="LHID">LHID</th>
                        <th data-label="Name of Landowner">Name of Landowner</th>
                        <th data-label="Municipality">Municipality</th>
                        <th data-label="Barangay">Barangay</th>
                        <th data-label="OCT No.">OCT/TCT No.</th>
                        <th data-label="Survey No.">Survey No.</th>
                        <th data-label="Survey Area">Survey Area</th>
                        <th data-label="Action">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($landholdings as $data)
                        <tr>
                            <td data-label="LHID"><a href="{{ route('landholding_view', $data->id )}}" class="btn-link ">{{ $data->lhid}}</a></td>
                            <td data-label="Name of Landowner">{{ $data->firstname}} {{ $data->middlename}} {{ $data->familyname}}</td>
                            <td data-label="Municipality">{{ $data->muni_name}}</td>
                            <td data-label="Barangay">{{ $data->brgy_names}}</td>
                            <td data-label="OCT No.">{{ $data->octNo}}</td>
                            <td data-label="Survey No.">{{ $data->surveyNo}}</td>
                            <td data-label="Survey Area">{{ $data->surveyArea}}</td>
                            <td data-label="Action">
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