@extends('layouts.master')


@section('title', ucfirst($category->name))
@section('content')
@include('layouts.articles')

@endsection