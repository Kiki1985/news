@extends('layout')
@section('title', 'News')
@section('content')
@include('categories.categories')
 <h3>Latest News</h3>
@include('articles.article')
<a href="/subscribe" target="_blank"><button>Subscribe</button></a>
@endsection