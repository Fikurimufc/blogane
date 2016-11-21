@extends('layout')
@section('content')
<div class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="javascript:void(0)">The Jambal</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      
        <ul class="nav navbar-nav">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('signup')}}">Signup</a></li>
        <li><a href="">Login</a></li>
      </ul>
      
    </div>
  </div>
</div>
<div class="col-md-6 col-md-offset-1">
      <h1>The Jambal Blog</h1>
      <p>True Story Magazine</p>
</div>
      @yield('page')  
@endsection
