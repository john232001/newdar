<!--Add Modal -->
<div class="modal fade" id="addmodalasp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Survey Plan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('asp_store') }}" method="POST">
          @csrf
          @foreach ($landholdings as $data)
            <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}" >
          @endforeach
          <div class="row">
              <div class="mb-3">
                  <label class="form-label">ASP No. <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="aspNo" placeholder="ASP No.">
              </div>
              <div class="mb-3">
                  <label class="form-label">ASP Date Approved <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="aspDate" placeholder="ASP Date Approved">
              </div>
              <div class="mb-3">
                  <label class="form-label">ASP Area <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="aspArea" placeholder="ASP Area">
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </form>
  </div>
  </div>
</div>