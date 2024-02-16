<!--Add Modal -->
<div class="modal fade" id="editmodalapproved{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Approved Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="{{ route('approvedform_update', $data->id ) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                      <div class="col-md-6 mb-2">
                          <label class="form-label">Upload Approved Form <span class="text-danger">*</span></label>
                          <input type="file" class="form-control" name="uploadfile" value="{{ $data->uploadfile }}">
                      </div>
                      <div class="col-md-6 mb-2">
                          <label class="form-label">Form No. <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="formNo" value="{{ $data->formNo }}" placeholder="Form No.">
                      </div>
                      <div class="col-md-6 mb-2">
                          <label class="form-label">Date Upload <span class="text-danger">*</span></label>
                          <input type="date" class="form-control" name="date_upload" value="{{ $data->date_upload }}">
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
</div>