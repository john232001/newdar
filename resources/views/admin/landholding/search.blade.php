@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')

  <div class="container-fluid mx-1">
    <h2 class="title-text">Landholdings</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
              <div class="btn">
                <div class="row">
                  <div class="col-md-10">
                  </div>
                  <div class="col-md-2">
                    <form class="d-flex" role="search" method="get" action="{{ route('search') }}">
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
                            <td><a href="{{ route('landholding_view', $data->id )}}" class="btn-link ">{{ $data->lhid}}</a></td>
                            <td>{{ $data->firstname}}</td>
                            <td>{{ $data->middlename}}</td>
                            <td>{{ $data->familyname}}</td>
                            <td>{{ $data->muni_name}}</td>
                            <td>{{ $data->brgy_names}}</td>
                            <td>{{ $data->octNo}}</td>
                            <td>{{ $data->surveyNo}}</td>
                            <td>{{ $data->surveyArea}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editmodal{{ $data->id }}"> <i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                                <a href="{{ route('uploaded_file', $data->id ) }}" class="btn btn-secondary btn-sm mb-2"><i class="fa-solid fa-magnifying-glass"></i> View Scanned Documents</a>
                            </td>
                            @include('admin.landholding.edit')
                            @include('admin.landholding.delete')
                        </tr>
                        @empty 
                      @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection