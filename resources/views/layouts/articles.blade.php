<b><i>{{$category->name}}</i></b><hr>
@foreach($articles as $article)
    @foreach($article->categories as $category)
    <p><a href="{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a></p>
    <p>{{substr($article->body,0,20)}} ... <a href="{{$category->name}}/{{$article->title}}">Read more</a></p><br>
    @endforeach
@endforeach