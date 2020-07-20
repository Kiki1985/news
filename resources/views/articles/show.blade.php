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
        <?php $resp = 0; ?>
      @foreach($article->comments as $comment)
        <?php $resp += $comment->response->count(); ?>
        
      @endforeach
        <i class="commentsI comm">comments {{$article->comments->count()+$resp}}</i>
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
      <img src="{{asset('/storage/images/'.$article->image)}}" alt="&#9786" width="100%">
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
      

      <?php $resp = 0; ?>
      @foreach($article->comments as $comment)
        <?php $resp += $comment->response->count(); ?>
        
      @endforeach
      <i id="r">{{$article->comments->count() + $resp}} 

         @if($article->comments->count() + $resp == 1)
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
          <div class="userImg">
            <img src='{{asset('/storage/images/'.$comment->user->image)}}' alt="&#9786" width="75" >
          </div>
         @if(auth()->user() && auth()->user()->id !== $comment->user->id)
         
          <div class="replayIcon fa fa-reply"></div>
          
         @endif
          @can('delete', $comment)
            
            <form style="float: right;" method="POST" action="/comments/{{$comment->id}}/delete">
            @method('DELETE')
            @csrf
            <button>
              <div class="delete-comment fa fa-trash" data-id="{{$comment->id}}"></div>
            </button>
            </form>
           @endcan
          <div>
            <i class="commentsI">By </i>
            <i class="commentsI">{{$comment->user->fName}} {{$comment->user->lName}}</i>
            <i class="fa fa-clock-o"></i>
            <i class="commentsI">{{$comment->created_at->diffForHumans()}}</i>
          </div>
          <p>{{$comment->body}}</p>
         
        @if(auth()->user() && auth()->user()->id !== $comment->user->id)

         <div class="replayInput">
            <div class="userImg">
              <img src="{{asset('/storage/images/'.$comment->user->image)}}" alt="&#9786" width="52">
            </div>
            <div class="insertResp">

            <form method="POST" action="/comments/{{$comment->id}}/responses">
            @csrf
              <input name="body" type="text" class="regist" placeholder="@if (session('response')){{ session('response') }} @elseif(count($errors))@foreach($errors->all() as $error){{$error}}@endforeach @else Response:@endif"  >
              <button class="btnSubm"
              data-user="{{auth()->user()->fName}} {{auth()->user()->lName}}" 
              data-comment-id="{{$comment->id}}"
              >Submit</button>
            </form>
            </div>
          </div>
         
        @endif
       
          <div style="clear: both;">
          @foreach($comment->response as $response)
            <div class="commentResp" >
              <div class="userImg">
                <img src="{{asset('/storage/images/'.$response->user->image)}}" alt="&#9786" width="75">
              </div>

            
            @can('delete', $response) 
              {{--<div class="delete-comment fa fa-trash" data-id="{{$response->id}}"></div>--}}
              <form style="float: right;" method="POST" action="/responses/{{$response->id}}/delete">
              @method('DELETE')
              @csrf
                <button>
                  <div class="delete-response fa fa-trash" data-id="{{$response->id}}"></div>
                </button>
              </form>
            @endcan

            <div>
              <i class="commentsI">By</i>
              <i class="commentsI">{{$response->user->fName}} {{$response->user->lName}}</i>
              <i class="fa fa-clock-o"></i>
              <i class="commentsI">{{$response->created_at->diffForHumans()}}</i>
            </div>

            <p>{{$response->body}}</p>
            </div>
          @endforeach
          </div>
          <hr class="hr2">
          
        </li>
      @endforeach 
      </ul>
      {{--@if(count($article->comments) > 3)
      <button id="loadMore" class="btnSubm">Load More</button>
      @endif--}}
    </div>  <!-- #comments --> 
  </div>   <!-- .replay --> 

  <div class="replay"><span><i>Leave a Replay</i></span><hr>

    <p id="pComm">
    @if(auth()->user())
    Your comment here:
    @else
    You must <a href="/login"><i>Login</i></a> or <a href="/register"><i>Register</i></a> for commenting
    @endif
     </p>
    <form method="POST" action="/articles/{{$article->id}}/comments">
    @csrf
        <textarea id="replayBody" 
        @if(auth()->user())
        data-user="{{auth()->user()->fName}} {{auth()->user()->lName}}"
        data-id="{{$article->id}}"
        @endif 
        name="body" class="textarea" 
        placeholder="@if (session('message')){{ session('message') }} @elseif(count($errors))@foreach($errors->all() as $error){{$error}}@endforeach @else Comment:@endif" 
        ></textarea>
        <button id="commentSubm" class="btnSubm">Submit Comment</button></a>
      </form>
    </div>
     
</div>
@endsection

    
    
 

