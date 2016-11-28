@foreach($articles as $row)
  <div class="well">
     <small><b>Posted by<em>"{{$row->publish}}"&nbsp;&nbsp;&nbsp;{{$row->created_at}}</em></b></small>  
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