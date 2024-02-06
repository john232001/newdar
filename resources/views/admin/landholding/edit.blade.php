<div class="modal fade" id="editlandholding{{ $data->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">EDIT LANDHOLDING</h4>
        </div>
        <div class="modal-body">
                <form action="{{ route('landholding_update', $data->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>LANDHOLDING ID <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lhid" value="{{ $data->lhid }}" placeholder="Enter Landholding ID">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>FIRST NAME <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="firstname" value="{{ $data->firstname }}" placeholder="Enter First Name">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>MIDDLE NAME</label>
                        <input type="text" class="form-control" name="middlename" value="{{ $data->middlename }}" placeholder="Enter Middle Name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>LAST NAME <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="familyname" value="{{ $data->familyname }}" placeholder="Last Name">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>MUNICIPALITY <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="municipality_id" style="width: 100%;">
                          @foreach($municipalities as $items)
                              <option value="{{ $items->id }}" {{ $data->municipality_id == $items->id ? 'selected' : ''}}>{{ $items->muni_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>BARANGAY <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="barangay_id" style="width: 100%;">
                          @foreach($barangays as $items)
                              <option value="{{ $items->id }}" {{ $data->barangay_id == $items->id ? 'selected' : ''}}>{{ $items->brgy_names }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>OCT/TCT NO. <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="octNo" value="{{ $data->octNo }}" placeholder="Enter OCT/TCT No.">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>SURVEY NUMBER <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="surveyNo" value="{{ $data->surveyNo }}" placeholder="Enter Survey Number">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>LOT NUMBER <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lotNo" value="{{ $data->lotNo }}" placeholder="Enter Lot Number">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>TITLE/SURVEY AREA (IN HECTARES) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="surveyArea" value="{{ $data->surveyArea }}" placeholder="Enter Title/Survey Area">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>MARO <span class="text-danger">*</span></label>
                        <select class="form-control" name="maro_id">
                            <option value="">SELECT OPTION</option>
                            @foreach ($maro as $items)
                                <option value="{{ $items->id}}" {{ $data->maro_id == $items->id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>PARO <span class="text-danger">*</span></label>
                        <select class="form-control" name="paro_id">
                            <option value="">SELECT OPTION</option>
                            @foreach ($paro as $items)
                                <option value="{{ $items->id}}" {{ $data->paro_id == $items->id ? 'selected' : ''}}>{{ $items->officer_name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>TAX DECLARATION NO.</label>
                        <input type="text" class="form-control" name="taxNo" value="{{ $data->taxNo }}" placeholder="Enter Tax Declaration No.">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>MODE OF ACQUISITION</label>
                        <input type="text" class="form-control" name="modeOfAcquisition" value="{{ $data->modeOfAcquisition }}" placeholder="Enter Mode Of Acquisition">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>COVERABLE AREA</label>
                        <input type="text" class="form-control" name="coverableArea" value="{{ $data->coverableArea }}" placeholder="Enter Coverable Area">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>NON-CARPABLE AREA</label>
                        <input type="text" class="form-control" name="noncarpableArea" value="{{ $data->noncarpableArea }}" placeholder="Enter Non-Carpable Area">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>RETAINED AREA</label>
                        <input type="text" class="form-control" name="retainedArea" value="{{ $data->retainedArea }}" placeholder="Enter Retained Area">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>DISTRIBUTE AREA</label>
                        <input type="text" class="form-control" name="distributeArea" value="{{ $data->distributeArea }}" placeholder="Enter Distribute Area">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>LAND SIZE</label>
                        <input type="text" class="form-control" name="landsize" value="{{ $data->landsize }}" placeholder="Enter Land Size">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>MAJOR CROPS</label>
                        <input type="text" class="form-control" name="majorCrops" value="{{ $data->majorCrops }}" placeholder="Enter Major Crops">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>PHASE</label>
                        <input type="text" class="form-control" name="phase" value="{{ $data->phase }}" placeholder="Enter Phase">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>UPALS</label>
                        <select class="form-control" name="upals">
                            <option value="">SELECT OPTION</option>
                            <option value="">YES</option>
                            <option value="">NO</option>
                        </select>
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>YEAR ADDED</label>
                        <input type="text" class="form-control" name="yearAdded" value="{{ $data->yearAdded }}" placeholder="Enter Year Added">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>PIPE LINE</label>
                        <input type="text" class="form-control" name="pipeline" value="{{ $data->pipeline }}" placeholder="Enter Pipe Line">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-4 mb-4">
                        <label>PROJECT DELIVERY</label>
                        <input type="text" class="form-control" name="projectedDelivery" value="{{ $data->projectedDelivery }}" placeholder="Enter Project Delivery">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>Title Documents</label>
                        <input type="file" class="form-control" value="{{ $data->title }}" name="title">
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label>Tax Declaration Documents</label>
                        <input type="file" class="form-control" value="{{ $data->taxDocuments }}" name="taxDocuments">
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</form>
