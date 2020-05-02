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
        <p>
          <i class="commentsI">By </i> 
          <i class="commentsI">{{$article->user->fName}} {{$article->user->lName}}</i>
          <i class="fa fa-clock-o"></i>
          <i class="commentsI">{{$article->created_at->diffForHumans()}}</i>
          @if(count($article->comments))
          <i class="fa fa-comments-o"></i>
          <i class="commentsI comm">comments {{$article->comments->count()}}</i>
          @endif
        </p> 

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
    @if(count($article->comments))
    <span>
      <i id="r">{{$article->comments->count()}} 
         @if($article->comments->count() == 1)
         Response
         @else
         Responses
         @endif
      </i>
    </span><hr>
    @endif

    <div id="comments">
        <ul id="myList" class="list-group">
        @foreach($article->comments as $comment)
            <li class="resp">
                <div id="userImg">
                    <img src='/img/noUser.png' alt="&#9786" >
                </div>

                <div id="replayIcon">
                    <a class="fa fa-reply" href="/"></a>
                </div>
                @can('update', $article) 
   
                
      
                  <div class="delete-comment" data-id="{{$comment->id}}">
                    <button class="btnSubm">Delete</button>
                  </div>
               

                @endcan
                <p>
                  <i class="commentsI">By</i>
                  <i class="commentsI">{{$comment->user->fName}} {{$comment->user->lName}}</i>
                  <i class="fa fa-clock-o"></i>
                  <i class="commentsI">{{$comment->created_at->diffForHumans()}}</i>
                </p>
                <p>{{$comment->body}}</p>
                <hr class="hr2">
        @endforeach 
        </ul>
        @if(count($article->comments) > 3)
        <button id="loadMore" class="btnSubm">Load More</button>
        @endif
    </div>  <!-- #comments --> 
    
</div>   <!-- .replay --> 

<div class="replay"><span><i>Leave a Replay</i></span><hr>

    <p id="pComm">Your comment here: </p>
        <textarea id="replayBody" 
        @if(auth()->user())
        data-user="{{auth()->user()->fName}} {{auth()->user()->lName}}"
        data-id="{{$article->id}}"
        @endif 
        name="body" class="textarea" placeholder="Comment:" required></textarea>

        <button id="commentSubm" class="btnSubm">Submit Comment</button></a>
    </div>
     
</div>
@endsection

    
    
 

