@extends('layouts.app')

@section('content')

@include('staff.staff_navbar')
@include('staff.staff_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Officer
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i> ADD OFFICER
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>OFFICER NAME</th>
                    <th>POSITION</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($officers as $data)
                  <tr>
                      <td>{{ $data->officer_name }}</td>
                      <td>{{ $data->position_type }}</td>
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
                      @include('staff.officers.edit')
                      @include('staff.officers.delete')
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
  @include('staff.staff_footer')
  @include('staff.officers.create')
@endsection