@extends('navbar')
@section('page')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-raised btn-primary">Add Article</a>
			<a href="#" data-toggle="modal" data-target="#modalImport" class="btn btn-raised btn-success">Import from excel</a>
		</div>
		<div class="col-md-8 col-md-offset-3">
		 <div id="articles-list">
    		@foreach($articles as $row)
    		  <div class="well">
                  <h1><strong>{{$row->title}}</strong></h1>
                      <p>{{$row->content}}</p>
                      <p>
                      <form  method="POST" action="{{ route('article.destroy', $row->id) }}" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <a class="btn btn-raised btn-default btn-sm" href="{{ route('article.show', $row->id) }}">Detail</a>
                        <input class="btn btn-raised btn-danger btn-sm" onclick="return confirm('Want Delete A File ?');" type="submit" value="Hapus" />
                      </form>
                      </p>
              </div>		  
    		@endforeach	
    				{!! $articles->render() !!}
    	</div> <!-- close article list -->
  			
	    </div>
	</div>
	@include('page.vw_modalImport')
	@include('page.vw_modalAdd')
	@include('page.js_articles')
@endsection