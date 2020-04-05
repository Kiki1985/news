@extends('layouts.master')
@section('title', $article->title)
@section('content')
<b><i>{{ucfirst(str_replace('-', ' ', $article->title))}}</i></b><hr>
@if(count($article->categories))
    @foreach($article->categories as $category)
        <p>Category <a href="/categories/{{$category->name}}">{{$category->name}}</a></p>
    @endforeach
@endif
<p>{{$article->body}}</p>
<p>Created at {{$article->created_at->diffForHumans()}}</p>
<p>By {{$article->user->fName}} {{$article->user->lName}}</p>
<a href="javascript:history.go(-1)"><button>Back</button></a>
@endsection