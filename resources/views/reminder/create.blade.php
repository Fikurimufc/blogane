@extends('navbar')
@section('page')
<div class="row">
	<div class="col-md-5 col-md-offset-3">
	<h2>Forgot Password</h2>
	 <p class="lead">Input your valid email</p>
	{!! Form::open(['route'=>'reminder.store','class'=>'form-horizontal','role'=>'form','method'=>'POST'])!!}
	<div class="form-group label-floating">
		{!! Form::label('email',null,['class'=>'control-label','for'=>'email']) !!}
		{!! Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
		 <div class="text-danger">{!! $errors->first('email') !!}</div>
	</div>
	<button type="submit" class="btn btn-raised btn-primary">Submit</button>
	{!! Form::close() !!}
	</div>
</div>		
@endsection