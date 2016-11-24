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
           <li><a href="#">About</a></li>
           <li><a href="">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <div class="navbar-form navbar-right">
          <div class="form-group">
            <li>{!! form::text('search',null,['class'=>'form-control','id'=>'keywords','placeholder'=>'Search article']) !!}</li>
          </div>
        </div>
       @if (Sentinel::check())
          <li>{!! link_to(route('logout'),'logout') !!}</li>
          <li><a>Wellcome&nbsp;&nbsp;{!! Sentinel::getUser()->first_name !!}</a></li>
        @else
           <li>{!! link_to(route('signup'), 'Signup') !!}</li>
           <li>{!! link_to(route('login'),  'Login') !!}</li> 
        @endif  
        </ul>
    </div>
  </div>
</div>
<div class="col-md-6 col-md-offset-1">
      <h1>The Jambal Blog</h1>
      <p>True Story Magazine</p>
</div>
<script type="text/javascript">
  $(document).ready(function(){

     $('#keywords').on('keypress', function (e) {
         if(e.which === 13){
           /* $(this).attr("disabled", "disabled");
            keyword();*/
            $.ajax({
          url : '/article',
          type : 'GET',
          dataType : 'json',
          data : {
            'keywords' : $('#keywords').val()
          },
          success : function(data){
            $('#articles-list').html(data['view']);
            console.log(data['object']);
          },
           error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
            },
            complete : function() {
              alreadyloading = false;
            }
        });
          }

   });

     function keyword(){

        
     }
  });//close document
</script>
      @yield('page')  
@endsection

