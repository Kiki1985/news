@extends('layouts.master')
@section('title', 'News')
@section('content')
@if (session('message'))
    <p>{{ session('message') }}
@else
    <b><i>Subscribe to news</i></b>
    <form method="POST" action="/subscribers">
        @csrf
        <input type="text" name="name" placeholder="Name" required value="{{old('name')}}"><br>
        <input type="email" name="email" placeholder="email" required value="{{old('email')}}"><br>
        <button>Submit</button>
    </form>
@include('layouts.errors')
@endif
@endsection

