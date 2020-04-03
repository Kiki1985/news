@if(isset($category->name))
<h3>{{ucfirst($category->name)}}</h3>
@else
<h3>All News</h3>
@endif
<hr>
@foreach($articles as $article)
<p><a href="/articles/{{$article->id}}">{{$article->title}}</a></p>
<p>{{substr($article->body,0,20)}} ... <a href="/articles/{{$article->id}}">Read more</a></p><br>

@endforeach