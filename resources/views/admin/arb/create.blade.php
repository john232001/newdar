<!-- addmodal arb -->
<div class="modal fade" id="addmodalarb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add ARB</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route('arb_store') }}" method="POST" class="row g-3">
            @csrf
              @foreach ($landholdings as $data)
                <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}" >
              @endforeach
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Firstname <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="fname" placeholder="Firstname">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Middle Initial</label>
                  <input type="text" class="form-control" name="mname" placeholder="Middle Initial">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Lastname <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="lname" placeholder="Lastname">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Extension</label>
                  <input type="text" class="form-control" name="extension" placeholder="Extension">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Spouse Name</label>
                  <input type="text" class="form-control" name="spousename" placeholder="Spouse Name">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="datebirth" >
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Gender <span class="text-danger">*</span></label>
                  <select class="form-select" name="gender_id">
                      <option value="">Select option</option>
                      @foreach ($categories as $data)
                        <option value="{{ $data->id}}">{{ $data->gender }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="address" placeholder="Address">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Ownership Preference <span class="text-danger">*</span></label>
                  <select class="form-select" name="ownership_id">
                      <option value="">Select option</option>
                      @foreach ($categories as $data)
                        <option value="{{ $data->id }}">{{ $data->ownership }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 mb-2">
                  <label class="form-label">Date of Oathtaking <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="dateOfOath" placeholder="Date of Oathtaking">
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