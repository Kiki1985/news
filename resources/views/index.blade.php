@extends('layouts.master')
@section('title', 'News')
@section('content')
<a href="/"><button>all news</button></a>
@include('layouts.categories')
@include('layouts.articles')
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection