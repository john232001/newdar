<form action="{{ route('user_account_store') }}" method="POST" >
    @csrf
   <!--Add Modal -->
   <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="mb-3">
              <label class="form-label">Username <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
              <label class="form-label">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
              <label class="form-label">Role <span class="text-danger">*</span></label>
              <select class="form-select" name="type">
                <option selected>Select options</option>
                @foreach ($roles as $items)
                  <option value="{{ $items->id }}">{{ $items->role_type }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
