<!--Add Modal -->
<div class="modal fade" id="addmodalvaluation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Valuation</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route('valuation_store') }}" method="POST" class="row g-3">
            @csrf
              @foreach ($landholdings as $data)
                <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}" >
              @endforeach
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Lot No. <span class="text-danger">*</span></label>
                  <select class="form-select" name="lotNumber_id">
                      <option value="">Select option</option>
                      @foreach ($lotNumber as $items)
                        <option value="{{ $items->id }}">{{ $items->lotNo }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">AOC No.</label>
                  <input type="text" class="form-control" name="aocNo" placeholder="AOC No.">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">LBP Claim No.</label>
                  <input type="text" class="form-control" name="claimNo" placeholder="LBP Claim No.">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Amount</label>
                  <input type="text" class="form-control" name="amount" placeholder="Amount">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date Transmitted to LBP/AOC</label>
                  <input type="text" class="form-control" name="dateTransmitted" placeholder="Date Transmitted to LBP/AOC">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date of MOV</label>
                  <input type="text" class="form-control" name="dateofMov" placeholder="Date Transmitted to LBP/AOC">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date NVLA Served to LO</label>
                  <input type="text" class="form-control" name="dateofMov" placeholder="Date NVLA Served to LO">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date of FI</label>
                  <input type="text" class="form-control" name="dateofFI" placeholder="Date NVLA Served to LO">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Date of CF Receipt</label>
                  <input type="text" class="form-control" name="dateofCF" placeholder="Date NVLA Served to LO">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                  <label class="form-label">Transmittal Status</label>
                  <select class="form-select" name="transmittalStatus">
                      <option value="">Select option</option>
                      <option value="Accepted">Accepted</option>
                      <option value="Returned">Returned</option>
                  </select>
              </div>
              <div class="col-lg-12 mb-2">
                  <label class="form-label"><span class="text-danger">If returned, state reasons</span></label>
                  <input type="text" class="form-control" name="dateofCF">
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