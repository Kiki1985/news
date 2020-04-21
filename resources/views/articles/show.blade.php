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
        <div class="replay"><span><i>Leave a Replay</i></span><hr>
        <p style="">Your comment here: </p>

        <form>
            <textarea class="textarea" placeholder="Comment:"></textarea>
            <button class="btnSubm">Submit Comment</button></a>
        </form>
    </div>
     
</div>
@endsection

    
    
 

