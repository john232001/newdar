<div class="modal fade" id="editlot{{ $data->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">EDIT LOT</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('staff_lot_update', $data->id )}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6 mb-4">
                        <label for="">ARB NAME<span class="text-danger">*</span></label>
                        <select class="form-control" name="arb_name">
                            <option value="">SELECT OPTION</option>
                            @foreach ($arbname as $items)
                                <option value="{{ $items->id }}" {{ $data->arb_name == $items->id ? 'selected' : ''}}>{{ $items->fname }} {{ $items->lname }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">LOT NUMBER <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lotNo" value="{{ $data->lotNo}}" placeholder="Enter Lot Number">
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">LOT TYPE <span class="text-danger">*</span></label>
                        <select class="form-control" name="lotType_id">
                            <option value="">SELECT LOT TYPE</option>
                            @foreach ($categories as $items)
                                <option value="{{ $items->id}}" {{ $data->lotType_id == $items->id ? 'selected' : ''}}>{{ $items->lotType }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">LOT AREA <span class="text-danger">(In hectares) *</span></label>
                        <input type="text" class="form-control" name="lotArea" value="{{ $data->lotArea}}" placeholder="Enter Lot Area">
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">CROP <span class="text-danger">(Fill the field if lot type is Carpable)</span></label>
                        <input type="text" class="form-control" name="crop" value="{{ $data->crop }}" placeholder="Enter Crop">
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

