<form action="{{ route('staff_asp_store') }}" method="POST">
    @csrf
<div class="modal fade" id="addsurvey">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ADD ASP</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        @foreach ($landholdings as $data)
                            <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}" >
                        @endforeach
                      <div class="col-xs-6 mb-4">
                        <label for="">ASP NUMBER <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="aspNo" placeholder="Enter ASP Number">
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">ASP DATE APPROVED <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="aspDate" placeholder="Enter ASP Date Approved">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6 mb-4">
                        <label for="">ASP AREA <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="aspArea" placeholder="Enter ASP Area">
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
