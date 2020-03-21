@extends('layout')
@section('title', 'Log in')
@section('content')
<h3>Author log in</h3>
<form method="POST" action="/login">
    @csrf
	<input type="text" name="name" placeholder="Name"><br>
	<input type="password" name="password" placeholder="Password"><br>
	<button>Submit</button><br><br>
</form>
@endsection