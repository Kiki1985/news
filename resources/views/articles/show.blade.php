@extends('layouts.master')
@section('title', $article->title)
@section('content')
<h3>{{$article->title}}</h3>
@if(count($article->categories))
    @foreach($article->categories as $category)
        <p>Category: <a href="/categories/{{$category->name}}">{{$category->name}}</a></p>
    @endforeach
@endif
<p>{{$article->body}}</p>
<p>Created at {{$article->created_at->toFormattedDateString()}}</p>
<p>By {{$article->user->fName}} {{$article->user->lName}}</p>
<a href="javascript:history.go(-1)"><button>Back</button></a>
@endsection