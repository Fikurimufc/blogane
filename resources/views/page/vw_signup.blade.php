@extends('navbar')
@section('page')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<h2>SIGNUP</h2>
		<p class="lead">Signup if you not have account for access system</p>
		
			 {!! Form::open(['route'=>'save']) !!}
			 <div class="form-group label-floating">
    			{!! Form::label('Your first name',null,['class'=>'control-label','for'=>'first_name'])!!}	
    				{!! Form::text('img_name',null,['class'=>'form-control','id'=>'first_name']) !!}
    			<div class="text-danger">{!! $errors->first('first_name') !!}</div>	
  			  </div>
  			  <div class="form-group label-floating">
    			{!! Form::label('Your last name',null,['class'=>'control-label','for'=>'last_name'])!!}	
    			{!! Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) !!}
    			<div class="text-danger">{!! $errors->first('last_name') !!}</div>
  			  </div>
  			  <div class="form-group label-floating">
    			 {!! Form::label('Active email',null,['class'=>'control-label','for'=>'last_name'])!!}	
    			 {!! Form::email('email',null,['class'=>'form-control','id'=>'email']) !!}
    		  </div>
  			  <div class="form-group label-floating">
    			{!! Form::label('Input password',null,['class'=>'control-label','for'=>'password'])!!}	
    			{!! Form::password('password',['class'=>'form-control','id'=>'password']) !!}
    		  </div>
    		  <div class="form-group label-floating">
    		  	{!! Form::label('password_confirmation', 'Password Confirm', array('class' => ' control-label','for'=>'password_confirmation')) !!}
    		  	{!! Form::password('password_confirmation', array('class' => 'form-control','id'=>'password_confirmation')) !!}
    		  </div>
  			  <button type="submit" class="btn btn-raised btn-primary">Save</button>
			{!! Form::close() !!}	
	</div>
</div>
@endsection
