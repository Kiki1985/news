@extends('layout')
@section('title', 'Register')
@section('content')
<h3>New author registration</h3>
<form method="POST" action="/register">
    @csrf
	<input type="text" name="name" placeholder="Name"><br>
	<input type="email" name="email" placeholder="email"><br>
	<input type="password" name="password" placeholder="Password"><br>
	<button>Submit</button><br><br>
</form>
@endsection