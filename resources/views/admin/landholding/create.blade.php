<!--Add Modal -->
  <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Landholding</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('landholding_store') }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Landholding ID <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="lhid" placeholder="Landholding ID">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Firstname <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="firstname" placeholder="Firstname">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Middlename</label>
              <input type="text" class="form-control" name="middlename" placeholder="Middlename">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Lastname <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="familyname" placeholder="Lastname">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Municipality <span class="text-danger">*</span></label>
              <select class="form-select" name="municipality_id">
                <option value="">Select municipality</option>
                @foreach($municipalities as $items)
                  <option value="{{ $items->id }}">{{ $items->muni_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Barangay <span class="text-danger">*</span></label>
              <select class="form-select" name="barangay_id">
                <option selected>Select barangay</option>
                @foreach($barangays as $items)
                  <option value="{{ $items->id }}">{{ $items->brgy_names }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">OCT/TCT No. <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="octNo" placeholder="OCT/TCT No.">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Survey No. <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="surveyNo" placeholder="Survey No.">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Lot No. <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="lotNo" placeholder="Lot No.">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Title/Survey Area <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="surveyArea" placeholder="Title/Survey Area (in hectares)">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">MARO <span class="text-danger">*</span></label>
              <select class="form-select" name="maro_id">
                <option selected>Select option</option>
                @foreach ($maro as $items)
                  <option value="{{ $items->id}}">{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Tax Declaration No.</label>
              <input type="text" class="form-control" name="taxNo" placeholder="Tax Declaration No.">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Mode of Acquisition</label>
              <input type="text" class="form-control" name="modeOfAcquisition" placeholder="Mode of Acquisition">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Coverable Area </label>
              <input type="text" class="form-control" name="coverableArea" placeholder="Coverable Area">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Non-Carpable Area</label>
              <input type="text" class="form-control" name="noncarpableArea" placeholder="Non-Carpable Area">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Retained Area</label>
              <input type="text" class="form-control" name="retainedArea" placeholder="Retained Area">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Distribute Area</label>
              <input type="text" class="form-control" name="distributeArea" placeholder="Distribute Area">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Landsize</label>
              <input type="text" class="form-control" name="landsize" placeholder="Landsize">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Major Crops</label>
              <input type="text" class="form-control" name="majorCrops" placeholder="Major Crops">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Phase</label>
              <input type="text" class="form-control" name="phase" placeholder="Phase">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">UPALS</label>
              <select class="form-select" name="upals">
                <option value="">Select option</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Year Added</label>
              <input type="text" class="form-control" name="yearAdded" placeholder="Year Added">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Pipeline</label>
              <input type="text" class="form-control" name="pipeline" placeholder="Pipeline">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Project Delivery</label>
              <input type="text" class="form-control" name="projectedDelivery" placeholder="Project Delivery">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Title Documents</label>
              <input type="file" class="form-control" name="title">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Tax Declaration Documents</label>
              <input type="file" class="form-control" name="taxDocuments">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Add</button>
        </div>
      </form>
      </div>
    </div>
  </div>