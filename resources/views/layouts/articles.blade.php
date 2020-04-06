<b><i>{{$category}}</i></b>
<hr>
@foreach($articles as $article)
<p><a href="{{$category}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a></p>
<p>{{substr($article->body,0,20)}} ... <a href="{{$category}}/{{$article->title}}">Read more</a></p><br>
@endforeach