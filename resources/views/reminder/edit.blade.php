@extends('navbar')
@section('page')
<div class="row">
	<div class="col-md-5 col-md-offset-3">
	<h2>Recover Password</h2>
	 <p class="lead">Reset password</p>
	{!! Form::open(['route'=>['reminder.update',$id,$code],'class'=>'form-horizontal','role'=>'form','method'=>'POST'])!!}
	<div class="form-group label-floating">
		{!! Form::label('Input password',null,['class'=>'control-label','for'=>'password'])!!}	
    	{!! Form::password('password',['class'=>'form-control','id'=>'password']) !!}
		 <div class="text-danger">{!! $errors->first('email') !!}</div>
	</div>
	<div class="form-group label-floating">
		{!! Form::label('password_confirmation', 'Password Confirm', array('class' => ' control-label','for'=>'password_confirmation')) !!}
    	{!! Form::password('password_confirmation', array('class' => 'form-control','id'=>'password_confirmation')) !!}
	</div>
	<button type="submit" class="btn btn-raised btn-primary">Submit</button>
	{!! Form::close() !!}
	</div>
</div>		
@endsection