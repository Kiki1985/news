@extends('layouts.master')
@section('title', ucfirst(str_replace('-', ' ', $article->title)))
@section('content')
<b><i>{{ucfirst(str_replace('-', ' ', $article->title))}}</i></b><hr>
@if(count($article->categories))
    @foreach($article->categories as $category)
        <p>Category <a href="/{{$category->name}}">{{$category->name}}</a></p>
    @endforeach
@endif
<p>{{$article->body}}</p>
<p>Created at {{$article->created_at->diffForHumans()}}</p>
<p>By {{$article->user->fName}} {{$article->user->lName}}</p>
@if($article->author_id == auth()->id()) 
    <p><a href="/{{$category->name}}/{{$article->title}}/edit"><button>Edit</button></a> 
    <form method="POST" action="/{{$category->name}}/{{$article->title}}">
    @method('DELETE')
    @csrf
    <div><button>Delete</button></div>
    </form>
    </p>
@endif
<a href="javascript:history.go(-1)"><button>Back</button></a>
@endsection