@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
@include('admin.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage User Accounts
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-modal">
                <i class="fa fa-plus"></i> ADD USER
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th>LAST SEEN</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->role_type }}</td>
                            <td>{{ Carbon\Carbon::parse($data->last_seen)->diffForHumans()}}</td>
                            <td>
                              <span class="badge bg-{{ $data->last_seen >= now()->subMinutes(2) ? 'green' : 'red' }}">
                                {{ $data->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline' }}
                              </span>
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#edit-modal{{ $data->id }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> EDIT
                                    </button>
                                </a>
                                <a href="" data-toggle="modal" data-target="#delete-modal{{ $data->id }}">
                                    <button class="btn btn-danger btn-sm" >
                                        <i class="fa fa-trash"></i> DELETE
                                    </button>
                                </a>
                            </td>
                            @include('admin.user_accounts.edit')
                            @include('admin.user_accounts.delete')
                        </tr>
                    @endforeach
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.admin_footer')
  @include('admin.user_accounts.create')
@endsection