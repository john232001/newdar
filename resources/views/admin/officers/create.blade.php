<form action="{{ route('officer_store') }}" method="POST" >
    @csrf
    <!--Add Modal -->
    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Officer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="mb-3">
                <label class="form-label">Officer Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="officer_name" placeholder="Officer Name">
              </div>
              <div class="mb-3">
                <label class="form-label">Position <span class="text-danger">*</span></label>
                <select class="form-select" name="position_id">
                  <option value="">Select options</option>
                  @foreach ($positions as $items)
                    <option value="{{ $items->id }}">{{ $items->position_type }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Add</button>
          </div>
        </div>
      </div>
    </div>
</form>
