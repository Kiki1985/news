@extends('layout')
@section('title', 'News')
@section('content')
 
<h3>Latest News</h3>
@foreach($articles as $article)
	<p><a href="{{$article->category}}/article/{{$article->id}}">{{$article->title}}</a></p>
	<p>{{substr($article->body,0,20)}} ... <a href="{{$article->category}}/article/{{$article->id}}">Read more</a></p>
	<hr>
@endforeach
<a href="/subscribe" target="_blank"><button>Subscribe</button></a>
@endsection