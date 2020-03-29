@extends('layout')
@section('title', ucfirst($category))
@section('content')
@include('categories.categories')
<h3>{{strtoupper($category)}}</h3>
@include('articles.article')
<a href="/"><button>Back</button></a>
@endsection

