<form action="{{ route('user_account_store') }}" method="POST" >
    @csrf
<div class="modal fade" id="create-modal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ADD USER</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12 mb-4">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12 mb-4">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12 mb-4">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 mb-4">
                            <label>Role type <span class="text-danger">*</span></label>
                            <select class="form-control" name="type">
                                <option value="">Select option</option>
                                @foreach ($roles as $items)
                                    <option value="{{ $items->id }}">{{ $items->role_type }}</option>
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
