@extends('layouts.master')
@section('title', 'News')
@section('content')
@include('layouts.categories')
<h3>Latest News</h3>
@foreach($articles as $article)
	<p><a href="/articles/{{$article->id}}">{{$article->title}}</a></p>
	<p>{{substr($article->body,0,20)}} ... <a href="/categories/{{$article->category->category}}/articles/{{$article->id}}">Read more</a></p>
	<hr>
@endforeach
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection