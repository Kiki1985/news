@extends('layouts.master')
@section('title', 'News')
@section('content')
@include('layouts.categories')
<h3>Latest News</h3>
@foreach($articles as $article)
	@include('layouts.articles')
@endforeach
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection