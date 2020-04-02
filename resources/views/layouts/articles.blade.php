@foreach($articles as $article)
<p><a href="/articles/{{$article->id}}">{{$article->title}}</a></p>
<p>{{substr($article->body,0,20)}} ... <a href="/articles/{{$article->id}}">Read more</a></p>
<hr>
@endforeach