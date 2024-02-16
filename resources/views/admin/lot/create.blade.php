<!-- addmodal lot -->
<div class="modal fade" id="addmodallot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Lot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route('lot_store') }}" method="POST" class="row g-3">
            @csrf
              @foreach ($landholdings as $data)
                <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}" >
              @endforeach
              <div class="col-md-6 mb-2">
                  <label class="form-label">ARB Name <span class="text-danger">*</span></label>
                  <select class="form-select" name="arb_name">
                      <option value="">Select option</option>
                      @foreach ($arbname as $items)
                        <option value="{{ $items->id }}">{{ $items->fname }} {{ $items->lname }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-2">
                  <label class="form-label">Lot No.</label>
                  <input type="text" class="form-control" name="lotNo" placeholder="Lot No.">
              </div>
              <div class="col-md-6 mb-2">
                  <label class="form-label">Lot Type <span class="text-danger">*</span></label>
                  <select class="form-select" name="lotType_id">
                      <option value="">Select option</option>
                      @foreach ($categories as $data)
                        <option value="{{ $data->id}}">{{ $data->lotType }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-2">
                  <label class="form-label">Lot Area</label>
                  <input type="text" class="form-control" name="lotArea" placeholder="Lot Area">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                  <label class="form-label">Crop <span class="text-danger">(Fill the field if lot type is Carpable)</span></label>
                  <input type="text" class="form-control" name="lotNo" placeholder="Crop">
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