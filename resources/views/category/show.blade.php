@extends('layout')
@section('title', ucfirst($category))
@section('content')
<h3>{{strtoupper($category)}}</h3>
@foreach($articles as $article)
	<p><a href="/{{$article->category}}/article/{{$article->id}}">{{$article->title}}</a></p>
	<p>{{substr($article->body,0,20)}} ... <a href="/{{$article->category}}/article/{{$article->id}}">Read more</a></p>
	<hr>
@endforeach
<a href="/"><button>Back</button></a>
@endsection

