@extends('layout')
@section('title', $article->title)
@section('content')
<h3>{{$article->title}}</h3>
<p>{{$article->body}}</p>
<p>Created at {{$article->created_at}}</p>
<a href="javascript:history.go(-1)"><button>Back</button></a>
@endsection