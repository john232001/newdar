<!-- delete modal arb -->
<div class="modal fade" id="deletemodalarb{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete ARB</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="" class="form-label">Are you sure you want to delete? </label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <a href="{{ route('arb_delete', $data->id )}}">
          <button type="button" class="btn btn-danger btn-sm">Delete</button>
        </a>
      </div>
    </div>
  </div>
</div>
