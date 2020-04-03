@extends('layouts.master')
@section('title', 'News')
@section('content')
@include('layouts.articles')
<a href="/subscribers" target="_blank"><button>Subscribe</button></a>
@endsection