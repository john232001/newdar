
<div class="modal fade" id="editmodal{{ $data->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">EDIT FILE</h4>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
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
