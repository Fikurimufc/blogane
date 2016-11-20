<div class="modal" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Content</h4>
      </div>
      <div class="modal-body">
         <!-- {!! Form::open(['route'=>'article.store']) !!} -->
            <div class="form-group  label-floating">
              {!! Form::label('Title',null,['class'=>'control-label','for'=>'title'])!!}
              {!! Form::text('title',null,['class'=>'form-control','id'=>'title']) !!}
              <div class="text-danger">{!! $errors->first('title') !!}</div>  
            </div>
              <div class="form-group">
                {!! Form::textarea('content',null,['placeholder'=>'Silahkan isi content','class'=>'form-control']) !!}
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Post</button>
        <!-- {!! Form::close() !!} -->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
</script>