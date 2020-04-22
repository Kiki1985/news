@extends('layouts.master')
@section('title', ucfirst(str_replace('-', ' ', $article->title)))
@section('content')
@foreach($article->categories as $category)
    <span class="h1"><i>{{ucfirst($category->name)}}</i></span>
@endforeach
<div class="main" ><hr>
    <div class="show">
        <h2>{{ucfirst(str_replace('-', ' ', $article->title))}}</h2>
        @foreach($article->categories as $category)
            <i class="categoryTag"><a href="/{{$category->name}}">{{$category->name}}</a></i>
        @endforeach
        <p><i>By {{$article->user->fName}} {{$article->user->lName}} &nbsp {{$article->created_at->diffForHumans()}}</i></p> 

        <div id="showImg">
            <img src="/img/news.jpg" alt="&#9786" width="100%">
        </div>

        <div>
            <p>{{$article->body}}</p>
            Tagged in : 
            @foreach($article->categories as $category)
            <i><a href="/{{$category->name}}">{{$category->name}}</a></i>
            @endforeach
        @can('update', $article)
            <p><a href="/{{$category->name}}/{{$article->title}}/edit"><button class="btnSubm">Edit</button></a> 
            <form method="POST" action="/{{$category->name}}/{{$article->title}}">
            @method('DELETE')
            @csrf
            <button class="btnSubm">Delete</button>
            </form>
            </p>
        @endcan
        </div>
    </div> 



<div class="replay">
@if($article->comments->count() > 0)
    <span>
      <i>{{$article->comments->count()}} 
         @if($article->comments->count() == 1)
         Response
         @else
         Responses
         @endif
      </i>
    </span><hr>
@endif

    <div class="comments">
        <ul class="list-group">
        @foreach($article->comments as $comment)
            <li class="list-group-item">
            <p><i>By {{$comment->user->fName}} {{$comment->user->lName}} {{$comment->created_at->diffForHumans()}}</i></p>
             <p>{{$comment->body}}</p><hr class="hr2"> 
        @endforeach 
        <li>@include('layouts.session')</li>  
        </ul>
    </div>
    
</div>    

<div class="replay"><span><i>Leave a Replay</i></span><hr style="margin-bottom: 55px">
    <p>Your comment here: </p>

    <form method="POST" action="/articles/{{$article->id}}/comments">
    @csrf
        <textarea name="body" class="textarea" placeholder="Comment:" required></textarea>
        <button class="btnSubm">Submit Comment</button></a>
    </form>

    @include('layouts.errors')

</div>
     
</div>
@endsection

    
    
 

