<!--Edit Modal -->
<div class="modal fade" id="editmodalvaluation{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Valuation</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="{{ route('valuation_update', $data->id )}}" method="POST">
            @csrf
            @method('PUT')
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Lot No. <span class="text-danger">*</span></label>
                  <select class="form-select" name="lotNumber_id">
                      <option value="">Select option</option>
                      @foreach ($lotNumber as $items)
                        <option value="{{ $items->id }}" {{ $items->id == $data->lotNumber_id ? 'selected' : ''}}>{{ $items->lotNo }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">AOC No.</label>
                  <input type="text" class="form-control" name="aocNo" value="{{ $data->aocNo }}" placeholder="AOC No.">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">LBP Claim No.</label>
                  <input type="text" class="form-control" name="claimNo" value="{{ $data->claimNo }}" placeholder="LBP Claim No.">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Amount</label>
                  <input type="text" class="form-control" name="amount" value="{{ $data->amount }}" placeholder="Amount">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date Transmitted to LBP/AOC</label>
                  <input type="date" class="form-control" name="dateTransmitted" value="{{ $data->dateTransmitted }}" placeholder="Date Transmitted to LBP/AOC">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date of MOV</label>
                  <input type="date" class="form-control" name="dateofMov" value="{{ $data->dateofMov }}" placeholder="Date Transmitted to LBP/AOC">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date NVLA Served to LO</label>
                  <input type="date" class="form-control" name="dateofMov" value="{{ $data->dateServed }}" placeholder="Date NVLA Served to LO">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date of FI</label>
                  <input type="date" class="form-control" name="dateofFI" value="{{ $data->dateofFI }}" placeholder="Date NVLA Served to LO">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date of CF Receipt</label>
                  <input type="date" class="form-control" name="dateofCF" value="{{ $data->dateofCF }}" placeholder="Date NVLA Served to LO">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Transmittal Status</label>
                  <select class="form-select" name="transmittalStatus">
                      <option value="">Select option</option>
                      <option value="Accepted">Accepted</option>
                      <option value="Returned">Returned</option>
                  </select>
              </div>
              <div class="col-md-12 mb-2">
                  <label class="form-label"><span class="text-danger">If returned, state reasons</span></label>
                  <input type="text" class="form-control" value="{{ $data->stateReason }}" name="dateofCF">
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