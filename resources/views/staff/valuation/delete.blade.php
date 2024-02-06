<div class="modal fade" id="deletemodalvaluation{{ $data->id }}">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">DELETE VALUATION</h4>
        </div>
        <div class="modal-body">
            ARE YOU SURE YOU WANT TO DELETE?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <a href="{{ route('staff_valuation_delete', $data->id )}}">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </a>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</form>
