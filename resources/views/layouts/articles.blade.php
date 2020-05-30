@if($category->name == 'news')
@include('layouts.index')
@endif

<span class="h1"><i>{{ucfirst($category->name)}}</i></span>

<div class="main"><hr>

@foreach($articles as $article)
    @foreach($article->categories as $category)

    <div class="article">
        <div class="divImg">

            <img src='/img/news.jpg' alt="&#9786" width="160"  height="120">
            <a href="/{{$category->name}}"><div class="imgCateg"><i>{{ucfirst($category->name)}}</i></div></a>
        </div>

        <h2>
            <a class="title-href" href="/{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a>
        </h2>

        <p>{{substr($article->body,0,200)}} ... <a href="/{{$category->name}}/{{$article->title}}">Read more</a></p>

        <ul>
          <li>
            <i class="commentsI">by</i> 
            <i class="commentsI">{{$article->user->fName}} {{$article->user->lName}}</i>
            <i class="fa fa-clock-o"></i>
            <i class="commentsI">{{$article->created_at->diffForHumans()}}</i>
          </li>
          @if(count($article->comments))
          <li>
            <i class="fa fa-comments-o"></i>
            <i class="commentsI comm">comments {{$article->comments->count()}}</i>
          </li>
         @endif

          @can('update', $article)
          
          <li class="delete-article">
            <form method="POST" action="/{{$category->name}}/{{$article->title}}">
              @method('DELETE')
              @csrf
              <button><i class="fa fa-trash"></i></button>
            </form>
          </li>
          <li style="float: right;">
            <a href="/{{$category->name}}/{{$article->title}}/edit"><i class="fa fa-edit"></i></a>
          </li>
          
          @endcan
        </ul>
       
    <hr class="hr2">
     </div> <!-- end div article -->
    @endforeach
@endforeach

</div> <!-- end div main -->

   

       

       


