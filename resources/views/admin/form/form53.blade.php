@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
@include('admin.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>FORM NO. 53 - LAND OWNERS'S REPLY TO NOTICE OF LAND VALUATION AND AQUISITION</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box box-success">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>MIDDLE NAME</th>
                        <th>MUNICIPALITY</th>
                        <th>BARANGAY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($landholdings as $data)
                        <tr>
                            <td>{{ $data->firstname}}</td>
                            <td>{{ $data->familyname}}</td>
                            <td>{{ $data->middlename}}</td>
                            <td>{{ $data->muni_name}}</td>
                            <td>{{ $data->brgy_names}}</td>
                            <td>
                                <a href="{{ route('form53_generate', $data->id )}}">
                                    <button class="btn btn-success btn-sm">
                                      <i class="fa fa-download"></i> GENERATE FORM
                                    </button>
                                </a>
                            </td>
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
        <!-- /.col -->
        <div class="col-xs-4">
          <div class="box box-success">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DATE AND TIME GENERATED</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($generateform as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->generation_date)->format('d-m-Y H:i:s')}}</td>
                            
                        </tr>
                    @empty
                      <tr>
                        <td>NO DATA</td>
                      </tr>
                    @endforelse
                 
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
      @foreach ($landholdings as $data)
        <a href="{{ route('landholding_view', $data->id )}}" class="btn btn-primary">
          Go back
        </a>
      @endforeach
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection