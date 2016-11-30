@extends('navbar')
@section('page')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
           <a href="{{ route('export',$articles->id)}}">    <button class="btn btn-raised btn-success">Export To Excel</button>
           </a>
        </div>
		<div class="col-md-8 col-md-offset-2">
          <div class="well">
            <div class="pull-right">
                <a href="{{route('article.edit', $articles->id)}}" class="btn btn-primary"><i class="material-icons">create</i></a>
                <!-- <button class="btn btn-primary"><i class="material-icons">create</i></button> -->
            </div>
            <h1><strong>{{$articles->title}}</strong></h1>
          <p>{{$articles->content}}</p>
          </div>
          <button class="btn btn-primary" data-toggle="collapse" data-target=".collapse">Show Comment</button>
        </div>
        <div  class="col-md-7 col-md-offset-3">
           @foreach($comments as $row)
            <div id="collapseComment" class="well collapse">
               <h2 style="font-style: italic; font-weight: bold;">{{$row->user}}&nbsp;&nbsp;Said</h2>
               <p><strong>{{$row->content}}</strong></p>
           </div>
           @endforeach
           @if(Sentinel::check())
           <div class="panel panel-primary">
               <div class="panel-heading">
                 <h3 class="panel-title">Add Comment</h3>
               </div>
               <div class="panel-body">
                {{Form::open(['route'=>'comment.store'])}}
                <div class="form-group label-floating">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="article_id" value="{{$articles->id}}">
                {{Form::hidden('user',Sentinel::getUser()->first_name)}}
               {{ Form::label('Comments',null,['class'=>'control-label','for'=>'content']) }}
                 {{ Form::textarea('content',null,['class'=>'form-control','id'=>'content']) }} 
                </div>
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-raised btn-primary btn-small">Add Comment</button>
                    {{Form::close()}}
                </div>
               </div> <!-- close panel body -->
           </div> <!-- close panel-primary -->
            @else
              <h2><em>You must login if want to add comment</em></h2>
           @endif
    	</div> <!-- close Div col md 7 -->
	</div> <!-- close  -->
    <script type="text/javascript">
       $(function(){
        $("#textarea").wysihtml5();
       });
    </script>
@endsection