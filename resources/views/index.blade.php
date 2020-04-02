@extends('layouts.master')
@section('title', 'News')
@section('content')
<a href="/"><button>all news</button></a>
@foreach($categories as $category)
	<a href="/categories/{{$category}}"><button>{{$category}}</button></a>
@endforeach
@foreach($articles as $article)
	@include('layouts.articles')
@endforeach
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection