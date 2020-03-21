@extends('layout')
@section('title', 'News')
@section('content')
 <a href="category/sport/?category=sport"><button>Sport</button></a>
 <a href="category/politic/?category=politic"><button>Politic</button></a>
 <a href="category/economy/?category=economy"><button>Economy</button></a>
<h3>Latest News</h3>
@foreach($articles as $article)
	<p><a href="{{$article->category}}/article/{{$article->id}}">{{$article->title}}</a></p>
	<p>{{substr($article->body,0,20)}} ... <a href="{{$article->category}}/article/{{$article->id}}">Read more</a></p>
	<hr>
@endforeach
@endsection