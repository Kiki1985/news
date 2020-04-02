@extends('layouts.master')
@section('title', 'News')
@section('content')
<a href="/"><button>all news</button></a>
@foreach($tags as $tag)
	<a href="/category/{{$tag->name}}"><button>{{$tag->name}}</button></a>
@endforeach
@foreach($articles as $article)
	@include('layouts.articles')
@endforeach
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection