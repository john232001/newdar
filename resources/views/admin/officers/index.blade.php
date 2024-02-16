@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')

    <div class="container">
      <h2 class="title-text">Officers</h2>
      <div class="row">
          <div class="col-lg-12 col-md-12">
              <div class="card p-5 rounded-4">
                <!-- Button trigger modal -->
                <button class="btn btn-success btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#addmodal" style="width: 160px;"><i class="fa-solid fa-add"></i> Add Officer</button>
                  <table id="example" class="table table-responsive table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>Officer Name</th>
                              <th>Position</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($officers as $data)
                          <tr>
                              <td>{{ $data->officer_name }}</td>
                              <td>{{ $data->position_type }}</td>
                              <td>
                                  <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal{{ $data->id }}"><i class="fa-solid fa-edit"></i> Edit</a>
                                  <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                              </td>
                              @include('admin.officers.edit')
                              @include('admin.officers.delete')
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
  @include('admin.officers.create')
@endsection