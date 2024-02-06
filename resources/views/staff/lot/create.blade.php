<form action="{{ route('staff_lot_store') }}" method="POST" >
    @csrf
<div class="modal fade" id="addlot">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ADD LOT</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        @foreach ($landholdings as $data)
                            <input type="hidden" class="form-control" name="landholding_id" value="{{ $data->id}}" >
                        @endforeach
                      <div class="col-xs-6 mb-4">
                        <label for="">ARB NAME<span class="text-danger">*</span></label>
                        <select class="form-control" name="arb_name">
                            <option value="">SELECT OPTION</option>
                            @foreach ($arbname as $items)
                                <option value="{{ $items->id }}">{{ $items->fname }} {{ $items->lname}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">LOT NUMBER <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lotNo" placeholder="Enter Lot Number">
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">LOT TYPE <span class="text-danger">*</span></label>
                        <select class="form-control" name="lotType_id">
                            <option value="">SELECT LOT TYPE</option>
                            @foreach ($categories as $data)
                                <option value="{{ $data->id}}">{{ $data->lotType }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">LOT AREA <span class="text-danger">(In hectares) *</span></label>
                        <input type="text" class="form-control" name="lotArea" placeholder="Enter Lot Area">
                      </div>
                      <div class="col-xs-6 mb-4">
                        <label for="">CROP <span class="text-danger">(Fill the field if lot type is Carpable)</span></label>
                        <input type="text" class="form-control" name="crop" placeholder="Enter Crop">
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
