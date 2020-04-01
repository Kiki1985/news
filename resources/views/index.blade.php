@extends('layouts.master')
@section('title', 'News')
@section('content')
{{--@include('layouts.categories')--}}
@foreach($tags as $tag)
	<a href="/category/{{$tag->name}}"><button>{{$tag->name}}</button></a>
@endforeach
<h3>Latest News</h3>
@foreach($articles as $article)
	@include('layouts.articles')
@endforeach
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection