<!--Edit Modal -->
<div class="modal fade" id="editmodalawardland{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Award Land</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="{{ route('awardtitle_update', $data->id )}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-2">
              <label class="form-label">Lot No. <span class="text-danger">*</span></label>
              <select class="form-select" name="lotNumber_id">
                  <option value="">Select option</option>
                  @foreach ($lotNumber as $items)
                    <option value="{{ $items->id }}" {{$data->lotNumber_id == $items->id ? 'selected' : ''}}>{{ $items->lotNo }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">FB/Collective Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="fbOrcname" value="{{ $data->fbOrcname }}" placeholder="FB/Collective Name">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">CLOA SERIAL NO. <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="serialNo" value="{{ $data->serialNo }}" placeholder="CLOA SERIAL NO.">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Award Type <span class="text-danger">*</span></label>
                <select class="form-select" name="awardType_id">
                    <option value="">Select option</option>
                    @foreach ($categories as $items)
                      <option value="{{ $items->id }}" {{ $data->awardType_id == $items->id ? 'selected' : ''}}>{{ $items->awardType }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Generation Date</label>
                <input type="date" class="form-control" name="genDate" value="{{ $data->genDate }}" placeholder="Generation Date">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">CLOA EPEB No.</label>
                <input type="text" class="form-control" name="epebNo" value="{{ $data->epebNo }}" placeholder="CLOA EPEB No.">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">CLOA EPEB Date</label>
                <input type="date" class="form-control" name="epebDate" value="{{ $data->epebDate }}" placeholder="CLOA EPEB Date">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Registered Date</label>
                <input type="date" class="form-control" name="registerDate" value="{{ $data->registerDate }}" placeholder="Registered Date">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Award Title No.</label>
                <input type="text" class="form-control" name="awardtitleNo" value="{{ $data->awardtitleNo }}" placeholder="Award Title No.">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Distribution Date</label>
                <input type="date" class="form-control" name="distributeDate" value="{{ $data->distributeDate }}" placeholder="Distribution Date">
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