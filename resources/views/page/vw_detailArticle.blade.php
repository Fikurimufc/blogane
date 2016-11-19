@extends('navbar')
@section('page')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
          <h1><strong>{{$articles->title}}</strong></h1>
          <p>{{$articles->content}}</p> 
        </div>
        <div class="col-md-8 col-md-offset-3">
           <p>
    			<div class="form-group label-floating">
                {{Form::open(['route'=>'comment.store'])}}
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="article_id" value="{{$articles->id}}">
				<input type="hidden" name="user" value="Fikri">

        		{{ Form::label('Comments',null,['class'=>'control-label','for'=>'content']) }}
          		{{  Form::textarea('content',null,['class'=>'form-control']) }}
                <button type="submit" class="btn btn-raised btn-primary btn-small">Add Comment</button>
                {{Form::close()}}
				</div>
    		</p>
    	</div>
	</div>
@endsection