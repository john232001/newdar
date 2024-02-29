<!--Edit Modal -->
<div class="modal fade" id="editmodalasp{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Survey Plan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <form action="{{ route('asp_update', $data->id )}}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label class="form-label">ASP No. <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="aspNo" value="{{ $data->aspNo }}" placeholder="ASP No.">
              </div>
              <div class="mb-3">
                  <label class="form-label">ASP Date Approved <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="aspDate" value="{{ $data->aspDate }}" placeholder="ASP Date Approved">
              </div>
              <div class="mb-3">
                  <label class="form-label">ASP Area <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="aspArea" value="{{ $data->aspArea }}" placeholder="ASP Area">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </div>
      </form>
  </div>
  </div>
</div>