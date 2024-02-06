@extends('layouts.app')

@section('content')

@include('staff.staff_navbar')
@include('staff.staff_sidebar')

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
                              <td><a href="{{ route('staff_landholding_view', $data->id )}}" class="btn btn-link">{{ $data->lhid}}</a></td>
                              <td>{{ $data->firstname}}</td>
                              <td>{{ $data->familyname}}</td>
                              <td>{{ $data->middlename}}</td>
                              <td>{{ $data->muni_name}}</td>
                              <td>{{ $data->brgy_names}}</td>
                              <td>{{ $data->octNo}}</td>
                              <td>{{ $data->lotNo}}</td>
                              <td>{{ $data->surveyNo}}</td>
                              <td>
                                <a href="" data-toggle="modal" data-target="#viewmodal{{ $data->id }}">
                                  <button class="btn btn-warning btn-sm">
                                    <i class="fa fa-search"></i> VIEW DOCUMENTS
                                  </button>
                              </a>
                              </td>
                              @include('staff.landholding.view_documents')
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
@endsection