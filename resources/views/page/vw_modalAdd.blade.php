<div class="modal" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Content</h4>
      </div>
      <div class="modal-body">
         {!! Form::open(['route'=>'article.store']) !!}
            <div class="form-group  label-floating">
              {!! Form::label('Title',null,['class'=>'control-label','for'=>'title'])!!}
              <input name="_token" type="hidden" value="{{ csrf_token() }}">
              {!! Form::text('title',null,['class'=>'form-control','id'=>'title']) !!}
              <div class="text-danger">{!! $errors->first('title') !!}</div>  
            </div>
              <div class="form-group label-floating">
                 {{ Form::label('Put your mind',null,['class'=>'control-label','for'=>'content']) }}
                 {{ Form::textarea('content',null,['class'=>'form-control','id'=>'content']) }} 
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-raised btn-primary">Post</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#textarea").wysihtml5();

  $("#submit").click(function(){
  var data = {
    _token : $('input[name=_token]').val(),
    title  : $("#title").val(),
    content : $("#content").val()
  }

  $.ajax({
    type : "POST",
    url  : "article",
    data : data,
    dataType : "json",
    success : function(data){
      console.log(data);
    }, error(xhr, error){
      console.log(error);
    }
  });
});
});
</script>