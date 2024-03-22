<!--Edit Modal -->
<div class="modal fade" id="editmodal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Landholding</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="{{ route('landholding_update', $data->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h5 class="modal-title mb-4">Landowner Information</h5>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Landholding ID <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="lhid" value="{{ $data->lhid }}" placeholder="Landholding ID">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Firstname <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="firstname" value="{{ $data->firstname }}" placeholder="Firstname">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Middlename</label>
              <input type="text" class="form-control" name="middlename" value="{{ $data->middlename }}" placeholder="Middlename">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Lastname <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="familyname" value="{{ $data->familyname }}" placeholder="Lastname">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Municipality <span class="text-danger">*</span></label>
              <select class="form-select" name="municipality_id">
                <option value="">Select municipality</option>
                @foreach($municipalities as $items)
                  <option value="{{ $items->id }}" {{ $data->municipality_id == $items->id ? 'selected' : ''}}>{{ $items->muni_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Barangay <span class="text-danger">*</span></label>
              <select class="form-select" name="barangay_id">
                <option selected>Select barangay</option>
                @foreach($barangays as $items)
                  <option value="{{ $items->id }}" {{ $data->barangay_id == $items->id ? 'selected' : ''}}>{{ $items->brgy_names }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">OCT/TCT No. <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="octNo" value="{{ $data->octNo }}" placeholder="OCT/TCT No.">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Survey No. <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="surveyNo" value="{{ $data->surveyNo }}" placeholder="Survey No.">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Lot No. <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="lotNo" value="{{ $data->lotNo }}" placeholder="Lot No.">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Survey Area (in hectares)<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="surveyArea" value="{{ $data->surveyArea }}" placeholder="Survey Area (in hectares)">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Tax Declaration No.</label>
              <input type="text" class="form-control" name="taxNo" value="{{ $data->taxNo }}" placeholder="Tax Declaration No.">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Mode of Acquisition</label>
              <input type="text" class="form-control" name="modeOfAcquisition" value="{{ $data->modeOfAcquisition }}" placeholder="Mode of Acquisition">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Coverable Area </label>
              <input type="text" class="form-control" name="coverableArea" value="{{ $data->coverableArea }}" placeholder="Coverable Area">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Non-Carpable Area</label>
              <input type="text" class="form-control" name="noncarpableArea" value="{{ $data->noncarpableArea }}" placeholder="Non-Carpable Area">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Retained Area</label>
              <input type="text" class="form-control" name="retainedArea" value="{{ $data->retainedArea }}" placeholder="Retained Area">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Distribute Area</label>
              <input type="text" class="form-control" name="distributeArea" value="{{ $data->distributeArea }}" placeholder="Distribute Area">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Landsize</label>
              <input type="text" class="form-control" name="landsize" value="{{ $data->landsize }}" placeholder="Landsize">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Major Crops</label>
              <input type="text" class="form-control" name="majorCrops" value="{{ $data->majorCrops }}" placeholder="Major Crops">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Phase</label>
              <input type="text" class="form-control" name="phase" value="{{ $data->phase }}" placeholder="Phase">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">UPALS</label>
              <select class="form-select" name="upals">
                <option value="">Select option</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Year Added</label>
              <input type="text" class="form-control" name="yearAdded" value="{{ $data->yearAdded }}" placeholder="Year Added">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
              <label class="form-label">Pipeline</label>
              <input type="text" class="form-control" name="pipeline" value="{{ $data->pipeline }}" placeholder="Pipeline">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-5">
              <label class="form-label">Project Delivery</label>
              <input type="text" class="form-control" name="projectedDelivery" value="{{ $data->projectedDelivery }}" placeholder="Project Delivery">
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-5">
            </div>
            <h5 class="modal-title mb-4">Officers</h5>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">PARO <span class="text-danger">*</span></label>
              <select class="form-select" name="paro_id">
                <option selected>Select option</option>
                @foreach ($paro as $items)
                  <option value="{{ $items->id}}" {{ $data->paro_id == $items->id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">MARO <span class="text-danger">*</span></label>
              <select class="form-select" name="maro_id">
                <option selected>Select option</option>
                @foreach ($maro as $items)
                  <option value="{{ $items->id}}" {{ $data->maro_id == $items->id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">CARPO <span class="text-danger">*</span></label>
              <select class="form-select" name="carpo_id">
                <option selected>Select option</option>
                @foreach ($carpo as $items)
                  <option value="{{ $items->id}}" {{ $data->carpo_id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">The President and CEO <span class="text-danger">*</span></label>
              <select class="form-select" name="ceo_id">
                <option selected>Select option</option>
                @foreach ($ceo as $items)
                  <option value="{{ $items->id}}" {{ $data->ceo_id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
              <label class="form-label">Department Manager/Head <span class="text-danger">*</span></label>
              <select class="form-select" name="manager_id">
                <option selected>Select option</option>
                @foreach ($manager as $items)
                  <option value="{{ $items->id}}" {{ $data->manager_id == $items->id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-5">
              <label class="form-label">Register of Deeds <span class="text-danger">*</span></label>
              <select class="form-select" name="rod_id">
                <option selected>Select option</option>
                @foreach ($rod as $items)
                  <option value="{{ $items->id}}" {{ $data->rod_id == $items->id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
            </div>
            <h5 class="modal-title mb-4">Scanned Documents</h5>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
              <label class="form-label">Title Documents</label>
              <input type="file" class="form-control" name="title" value="{{ $data->title }}">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
              <label class="form-label">Tax Declaration Documents</label>
              <input type="file" class="form-control" name="taxDocuments" value="{{ $data->taxDocuments }}">
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
  </div>
</div>