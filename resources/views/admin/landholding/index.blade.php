@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
@include('admin.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Landholding
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i> Add landholding
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>LHID</th>
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th>
                      <th>MIDDLE NAME</th>
                      <th>MUNICIPALITY</th>
                      <th>BARANGAY</th>
                      <th>OCT/TCT NO.</th>
                      <th>LOT NO.</th>
                      <th>SURVEY NO.</th>

                      <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($landholdings as $data)
                          <tr>
                              <td><a href="{{ route('landholding_view', $data->id )}}" class="btn btn-link">{{ $data->lhid}}</a></td>
                              <td>{{ $data->firstname}}</td>
                              <td>{{ $data->familyname}}</td>
                              <td>{{ $data->middlename}}</td>
                              <td>{{ $data->muni_name}}</td>
                              <td>{{ $data->brgy_names}}</td>
                              <td>{{ $data->octNo}}</td>
                              <td>{{ $data->lotNo}}</td>
                              <td>{{ $data->surveyNo}}</td>
                              <td>
                                  <a href="" data-toggle="modal" data-target="#editlandholding{{ $data->id }}">
                                      <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-fw fa-edit"></i> EDIT
                                      </button>
                                  </a>
                                  <a href="" data-toggle="modal" data-target="#deletelandholding{{ $data->id }}">
                                      <button class="btn btn-danger btn-sm" >
                                          <i class="fa fa-fw fa-trash"></i> DELETE
                                      </button>
                                  </a>
                                  <a href="" data-toggle="modal" data-target="#viewmodal{{ $data->id }}">
                                      <button class="btn btn-warning btn-sm">
                                        <i class="fa fa-search"></i> VIEW DOCUMENTS
                                      </button>
                                  </a>
                              </td>
                            @include('admin.landholding.edit')
                            @include('admin.landholding.delete')
                            @include('admin.landholding.view_documents')
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
  @include('admin.landholding.create')
@endsection