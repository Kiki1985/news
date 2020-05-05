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
    <i class="categoryTag"><a href="/{{$category->name}}">{{ucfirst($category->name)}}</a></i>
    @endforeach
    <ul style="padding-top: 16px;">
      <li>
        <i class="commentsI">By </i> 
        <i class="commentsI">{{$article->user->fName}} {{$article->user->lName}}</i>
        <i class="fa fa-clock-o"></i>
        <i class="commentsI">{{$article->created_at->diffForHumans()}}</i>
        @if(count($article->comments))
        <i class="fa fa-comments-o"></i>
        <i class="commentsI comm">comments {{$article->comments->count()}}</i>
        @endif
      </li>
      @can('update', $article)
      <li style="float: right;">
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
    <div id="showImg">
      <img src="/img/news.jpg" alt="&#9786" width="100%">
    </div>
    <div>
      <p>{{$article->body}}</p>
      <p>Tagged in : 
      @foreach($article->categories as $category)
        <i><a href="/{{$category->name}}">{{$category->name}}</a></i>
      @endforeach
      </p>
    </div>
  </div> <!-- .show  -->

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
          <div class="replayIcon fa fa-reply"></div>
          @can('update', $article) 
            <div class="delete-comment fa fa-trash" data-id="{{$comment->id}}"></div>
          @endcan
          <div>
            <i class="commentsI">By</i>
            <i class="commentsI">{{$comment->user->fName}} {{$comment->user->lName}}</i>
            <i class="fa fa-clock-o"></i>
            <i class="commentsI">{{$comment->created_at->diffForHumans()}}</i>
          </div>
          <p>{{$comment->body}}</p>


          <div class="replayInput">
            <button class="btnSubm">Submit</button>
            <input class="regist" type="text" name="replay" placeholder="Your replay here">
          </div>
          

          <hr class="hr2">
        </li>
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

    
    
 

