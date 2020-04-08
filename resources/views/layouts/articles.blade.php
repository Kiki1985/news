<b><i>{{$category->name}}</i></b><hr>
@foreach($articles as $article)
    @foreach($article->categories as $category)
    <p>
    <a href="/{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a> &nbsp 
    
    </p>
    <p>{{substr($article->body,0,20)}} ... <a href="/{{$category->name}}/{{$article->title}}">Read more</a></p>

    @if($article->user_id == Auth::id()) 
    <p><a href="/{{$category->name}}/{{$article->title}}/edit"><button>Edit</button></a> 
    <form method="POST" action="/{{$category->name}}/{{$article->title}}">
    @method('DELETE')
    @csrf
    <div><button>Delete</button></div>
    </form>
    </p>
    @endif
    <hr>
    @endforeach
@endforeach