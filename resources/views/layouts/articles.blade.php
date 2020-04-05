@if(isset($category->name))
<b><i>{{ucfirst($category->name)}}</i></b>
@else
<b><i>Latest News</i></b>
@endif
<hr>
@foreach($articles as $article)
<p><a href="/articles/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a></p>
<p>{{substr($article->body,0,20)}} ... <a href="/articles/{{$article->id}}">Read more</a></p><br>

@endforeach