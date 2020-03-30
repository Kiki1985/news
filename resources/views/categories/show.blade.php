@extends('layouts.master')
@section('title', ucfirst($category->category))
@section('content')
@include('layouts.categories')
<h3>{{strtoupper($category->category)}}</h3>
@foreach($category->articles as $article)
	<p><a href="/articles/{{$article->id}}">{{$article->title}}</a></p>
	<p>{{substr($article->body,0,20)}} ... <a href="/categories/{{$article->category->category}}/articles/{{$article->id}}">Read more</a></p>
	<hr>
@endforeach
<a href="/"><button>Back</button></a>
@endsection

