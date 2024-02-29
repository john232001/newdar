<!-- editmodal arb -->
<div class="modal fade" id="editmodalarb{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit ARB</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('arb_update', $data->id )}}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
              <label class="form-label">Firstname <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="fname" value="{{ $data->fname }}" placeholder="Firstname">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Middle Initial</label>
                <input type="text" class="form-control" name="mname" value="{{ $data->mname }}"  placeholder="Middle Initial">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Lastname <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="lname" value="{{ $data->lname }}" placeholder="Lastname">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Extension</label>
                <input type="text" class="form-control" name="extension" value="{{ $data->spousename }}" placeholder="Extension">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Spouse Name</label>
                <input type="text" class="form-control" name="spousename" value="{{ $data->spousename }}"  placeholder="Spouse Name">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                <input type="date" class="form-control" value="{{ $data->datebirth }}" name="datebirth" >
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Gender <span class="text-danger">*</span></label>
                <select class="form-select" name="gender_id">
                    <option value="">Select option</option>
                    @foreach ($categories as $items)
                      <option value="{{ $items->id}}" {{$data->gender_id == $items->id ? 'selected' : ''}}>{{ $items->gender }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address" value="{{ $data->address }}" placeholder="Address">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Ownership Preference <span class="text-danger">*</span></label>
                <select class="form-select" name="ownership_id">
                    <option value="">Select option</option>
                    @foreach ($categories as $items)
                      <option value="{{ $items->id}}" {{$data->ownership_id == $items->id ? 'selected' : ''}}>{{ $items->ownership }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                <label class="form-label">Date of Oathtaking <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="dateOfOath" value="{{ $data->dateOfOath }}" placeholder="Date of Oathtaking">
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