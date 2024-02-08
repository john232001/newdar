@extends('layouts.app')

@section('content')

@include('staff.staff_navbar')
@include('staff.staff_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>DOWNLOAD APPROVED FORM</h1>
        <br>
        @foreach ($landholdings as $data)
        <a href="{{ route('staff_landholding', $data->id )}}" class="btn btn-primary">
            Go back
        </a>
        @endforeach
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                       <th>FORM NO.</th>
                       <th>FILE NAME</th>
                       <th>DATE UPLOADED</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($displayUploadForm as $data)
                    <tr>
                        <td>{{ $data->formNo }}</td>
                        <td>{{ $data->uploadfile }}</td>
                        <td>{{ $data->date_upload }}</td>
                        <td>
                            <a href="{{ route('staff_filedownload_form1', $data->id ) }}">
                              <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fa fa-upload"></i> DOWNLOAD
                              </button>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">No data available in table</td>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection