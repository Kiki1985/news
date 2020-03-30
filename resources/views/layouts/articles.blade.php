@foreach($category->articles as $article)
	<p><a href="/categories/{{$article->category->category}}/articles/{{$article->id}}">{{$article->title}}</a></p>
	<p>{{substr($article->body,0,20)}} ... <a href="/categories/{{$article->category->category}}/articles/{{$article->id}}">Read more</a></p>
	<hr>
@endforeach