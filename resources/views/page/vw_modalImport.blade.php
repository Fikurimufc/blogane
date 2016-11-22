<div class="modal" id="modalImport">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Import File</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route'=>'import','files'=>true]) }}
        <div class="form-group">
        {{Form::file('import_file',['id'=>'import_file','multiple'=>''])}}
          <div class="input-group">
            {{Form::text(null,null,['class'=>'form-control','placeholder'=>'Import file','readonly'=>''])}}
            <span class="input-group-btn input-group-sm">
                <button type="button" class="btn btn-fab btn-fab-mini">
                    <i class="material-icons">attach_file</i>
                </button>
              </span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-raised btn-primary">Import</button>
        {!! Form::close() !!}
      </div>
    </div> <!-- close modal content -->
  </div> <!-- close modal dialog -->
</div>

