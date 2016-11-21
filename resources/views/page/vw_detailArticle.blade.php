@extends('navbar')
@section('page')

	<div class="row">
        <div class="col-md-8 col-md-offset-2">
           <a href="{{ URL::to('export/csv')}}"> 
                <button class="btn btn-raised btn-success">Export To Excel</button>
           </a>
        </div>
		<div class="col-md-8 col-md-offset-2">
          <h1><strong>{{$articles->title}}</strong></h1>
          <p>{{$articles->content}}</p> 
        </div>
        <div class="col-md-7 col-md-offset-3">
           <div class="panel panel-primary">
               <div class="panel-heading">
                   <h3 class="panel-title">Add Comment</h3>
               </div>
               <div class="panel-body">
                @foreach($comments as $row)
                    <p>{{$row->content}}</p>
                @endforeach
                {{Form::open(['route'=>'comment.store'])}}
                <div class="form-group label-floating">
                    {{Form::label('Your name',null,['class'=>'control-label','for'=>'user'])}}
                    {{Form::text('user',null,['class'=>'form-control','id'=>'user'])}}
                </div>
                <div class="form-group label-floating">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="article_id" value="{{$articles->id}}">
                <input type="hidden" name="user" value="Fikri">
                <!-- {{ Form::label('Comments',null,['class'=>'control-label','for'=>'content']) }} -->
                 <textarea class="form-control" name="content" id="textarea" placeholder="Place some text here" style="width: 80%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <button type="submit" class="btn btn-raised btn-primary btn-small">Add Comment</button>
                {{Form::close()}}
                </div>
               </div> <!-- close panel body -->
           </div> <!-- close panel-primary -->
    	</div> <!-- close Div col md 7 -->
	</div>
    <script type="text/javascript">
       $(function(){
        $("#textarea").wysihtml5();
       });
    </script>
@endsection