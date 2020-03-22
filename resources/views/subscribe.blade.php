@extends('layout')
@section('title', 'News')
@section('content')
<b><i>Subscribe to news</i></b>
<form method="POST" action="/subscribe">
	@csrf
	<input type="text" name="name" placeholder="Name"><br>
	<input type="email" name="email" placeholder="email"><br>
	<button>Submit</button>
</form>
@endsection