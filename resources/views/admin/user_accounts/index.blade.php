@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')

<div class="container">
  <h2 class="title-text">Manage Users</h2>
  <div class="row">
      <div class="col-lg-12 col-md-12">
          <div class="card p-5 rounded-4">
            <!-- Button trigger modal -->
            <button class="btn btn-success btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#addmodal" style="width: 160px;"><i class="fa-solid fa-add"></i> Add User</button>
              <table id="example" class="table table-responsive table-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th>Username</th>
                          <th>Role</th>
                          <th>Last Seen</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $data)
                      <tr>
                          <td>{{ $data->username }}</td>
                          <td>{{ $data->role_type }}</td>
                          <td>{{ Carbon\Carbon::parse($data->last_seen)->diffForHumans()}}</td>
                          <td>
                            <span class="badge rounded-pill bg-{{ $data->last_seen >= now()->subMinutes(2) ? 'success' : 'danger' }}">
                              {{ $data->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline' }}
                            </span>
                          </td>
                          <td>
                              <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal{{ $data->id }}"><i class="fa-solid fa-edit"></i> Edit</a>
                              <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                          </td>
                        @include('admin.user_accounts.edit')
                        @include('admin.user_accounts.delete')
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@include('admin.user_accounts.create')
@endsection