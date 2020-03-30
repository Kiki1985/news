@extends('layouts.master')
@section('title', ucfirst($category->category))
@section('content')
@include('layouts.categories')
<h3>{{strtoupper($category->category)}}</h3>
@foreach($category->articles as $article)
	@include('layouts.articles')
@endforeach
<a href="/"><button>Back</button></a>
@endsection

