@extends('layouts.master')


@section('title', $category->name)
@section('content')
@include('layouts.articles')

@endsection