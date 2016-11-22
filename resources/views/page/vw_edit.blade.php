@extends('navbar')
@section('page')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1><strong>Edit&nbsp;"{{$articles->title}}"</strong></h1>
		{{Form::open(['route'=>['article.update',$articles->id], 'method'=>'PATCH' ])}}
		<div class="form-group label-floating">
			{!! Form::label($articles->title,null,['class'=>'control-label','for'=>'title','value'=>$articles->title]) !!}
			{!! Form::text('title',null,['class'=>'form-control','id'=>'title'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('content',null,['class'=>'control-label']) !!}
			{!! Form::textarea('content',$articles->content,['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-raised btn-primary">Save</button>
		</div>
		{{Form::close()}}
	</div>
</div>
@endsection