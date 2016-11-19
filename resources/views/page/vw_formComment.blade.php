<div id="FormComment" class="">
	<div class="form-group  label-floating">
		{!! Form::open(['route'=>'comment.store'])!!}
		<input type="hidden" name="id" value="{{$row->id}}">
        {!! Form::label('Comments',null,['class'=>'control-label','for'=>'content'])!!}
          {!! Form::textarea('content',null,['class'=>'form-control']) !!}
		<button class="btn btn-raised btn-primary btn-xs">Add Comment</button>
        {!! Form::close()!!}  
    </div>
</div>