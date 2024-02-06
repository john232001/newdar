@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
@include('admin.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>FORM NO. 1 - CONDUCT OF PRELIMINARY OCULAR INSPECTION</h1>
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
                                <a href="{{ route('form1_generate', $data->id )}}">
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
        <!-- /.col -->
        <div class="col-xs-8">
          <div class="box box-success">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodal">
                <i class="fa fa-plus"></i> Add File
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Form No</th>
                        <th>FILE NAME</th>
                        <th>DATE UPLOADED</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($displayform as $items)
                    <tr>
                      <td>{{ $items->formNo }}</td>
                      <td>{{ $items->uploadfile }}</td>
                      <td>{{ $items->date_upload }}</td>
                      <td>
                        <a href="" data-toggle="modal" data-target="#editmodal{{ $items->id }}">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                        <a href="" data-toggle="modal" data-target="#deletemodal{{ $items->id }}">
                            <button class="btn btn-danger btn-sm" >
                                <i class="fa fa-trash"></i>
                            </button>
                        </a>
                      </td>
                      @include('admin.generatedFile.edit')
                      @include('admin.generatedFile.delete')
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
      @foreach ($landholdings as $data)
      <a href="{{ route('landholding_view', $data->id )}}" class="btn btn-primary">
          Go back
      </a>
      @endforeach
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.generatedFile.create')
@endsection