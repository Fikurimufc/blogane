@extends('navbar')
@section('page')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-raised btn-primary">Add Article</a>
		</div>
		<div class="col-md-8 col-md-offset-3">
		 <div class="panel panel-default">
  			<div class="panel-body">
    			<div class="col-md-6">
    				@foreach($articles as $row)
    				  <h1><strong>{{$row->title}}</strong></h1>
    				  <p>{{$row->content}}</p>
    				  <p>
    				  <form  method="POST" action="{{ route('article.destroy', $row->id) }}" accept-charset="UTF-8">
    					<input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <a class="btn btn-raised btn-primary btn-xs" href="{{ route('article.edit', $row->id) }}">Detail</a>
                        <input class="btn btn-raised btn-danger btn-xs" onclick="return confirm('Want Delete A File ?');" type="submit" value="Hapus" />
    				  </form>
    				  </p>
    				@endforeach	
    			</div>
  			</div>
	     </div>
	    </div>
	</div>
	@include('page.vw_modalAdd')
@endsection