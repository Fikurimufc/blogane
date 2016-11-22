@extends('navbar')
@section('page')
<div class="row">
	<div class="col-md-5 col-md-offset-3">
	<h2>LOGIN</h2>
	 <p class="lead">Login for acees system</p>
	{!! Form::open(['route'=>'login.store','class'=>'form-horizontal','role'=>'form','method'=>'POST'])!!}
	<div class="form-group label-floating">
		{!! Form::label('email',null,['class'=>'control-label','for'=>'email']) !!}
		{!! Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
		 <div class="text-danger">{!! $errors->first('email') !!}</div>
	</div>
	<div class="form-group label-floating">
		{!! Form::label('Input password',null,['class'=>'control-label','for'=>'password'])!!}
		{!! Form::password('password',['class'=>'form-control','id'=>'password']) !!}
		 <div class="text-danger">{!! $errors->first('password') !!}</div>
	</div>
		<button type="submit" class="btn btn-raised btn-primary">Login</button>
	{!! Form::close() !!}
	</div>
</div>	
@endsection