@extends('layouts.master')
@section('title', $category->name)
@section('content')
@include('layouts.articles')
<a href="/subscribers"><button>Subscribe</button></a>
@endsection