<div class="modal fade" id="edit-modal{{ $data->id }}">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ADD OFFICER</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('staff_officer_update', $data->id )}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12 mb-4">
                        <label>OFFICER NAME <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="officer_name" value="{{ $data->officer_name }}" placeholder="Enter Officer Name">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 mb-4">
                            <label>POSITION <span class="text-danger">*</span></label>
                            <select class="form-control" name="role_id">
                                <option value="">SELECT OPTION</option>
                                @foreach ($positions as $items)
                                    <option value="{{ $items->id }}" {{ $data->position_id == $items->id ? 'selected' : ''}}>{{ $items->position_type }}</option>
                                @endforeach
                            </select>
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
