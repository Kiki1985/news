@extends('layouts.master')
@section('title', 'New author registration')
@section('content')
<h3>New author registration</h3>
<form method="POST" action="/register">
    @csrf
	<input type="text" name="firstName" placeholder="First Name" required value="{{old('name')}}"><br>
	<input type="text" name="lastName" placeholder="Last Name" required value="{{old('name')}}"><br>
	<input type="email" name="email" placeholder="email" required value="{{old('name')}}"><br>
	<input type="password" name="password" placeholder="Password" required value="{{old('name')}}"><br>
	<button>Submit</button><br><br>
</form>

@if(count($errors))
@include('layouts.errors')
@endif

@endsection