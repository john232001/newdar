<div class="modal fade" id="viewmodal{{ $data->id }}">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">LIST OF DOCUMENTS</h4>
        </div>
        <div class="modal-body">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('assets/dist/img/admin.png')}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $data->firstname }} {{ $data->familyname }}</h3>
                    <p class="text-muted text-center">Landholding</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                        <b>Title</b> <a class="pull-right" href="{{ route('staff_download_title', $data->id )}}"> <i class="fa fa-mail-forward"></i> Download</a>
                        </li>
                        <li class="list-group-item">
                        <b>Tax Declaration</b> <a class="pull-right" href="{{ route('staff_download_taxDec', $data->id )}}"> <i class="fa fa-mail-forward"></i> Download</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->