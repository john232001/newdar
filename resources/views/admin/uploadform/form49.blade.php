@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
@include('admin.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>UPLOAD FORMS</h1>
        <br>
        @foreach ($landholdings as $data)
        <a href="{{ route('landholding_view', $data->id )}}" class="btn btn-primary">
            Go back
        </a>
        @endforeach
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-4">
            <div class="box box-success">
              <div class="box-header with-border">
                <h2>Add File</h2>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                    <form action="{{ route('addfile_form49')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @foreach ($landholdings as $data)
                            <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}">
                        @endforeach
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 mb-4">
                                    <label for="">UPLOAD FILE <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="uploadfile">
                                </div>
                                <div class="col-xs-6 mb-4">
                                    <label for="">FORM NO. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="formNo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 mb-4">
                                    <label for="">DATE UPLOAD <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_upload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        <div class="col-xs-8">
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
                            <a href="" data-toggle="modal" data-target="#editmodal{{ $data->id }}">
                                <button type="submit" class="btn btn-primary btn-sm" >
                                  <i class="fa fa-edit"></i> EDIT
                                </button>
                            </a>
                            <a href="" data-toggle="modal" data-target="#deletemodal{{ $data->id }}">
                              <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> DELETE
                              </button>
                            </a>
                        </td>
                    </tr>
                    {{-- edit modal --}}
                    <div class="modal fade" id="editmodal{{ $data->id }}">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">EDIT FILE</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('updatefile_form49', $data->id )}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-xs-6 mb-4">
                                            <label for="">UPLOAD FILE <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" value="{{ $data->uploadfile }}" name="uploadfile">
                                          </div>
                                          <div class="col-xs-6 mb-4">
                                            <label for="">FORM NO. <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $data->formNo }}" name="formNo">
                                          </div>
                                          <div class="col-xs-6 mb-4">
                                            <label for="">DATE UPLOAD <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" value="{{ $data->date_upload }}" name="date_upload">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </form>
                    {{-- Delete modal --}}
                    <div class="modal fade" id="deletemodal{{ $data->id }}">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">DELETE FILE</h4>
                            </div>
                            <div class="modal-body">
                                ARE YOU SURE YOU WANT TO DELETE?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <a href="{{ route('deletefile_form49', $data->id )}}">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
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