@extends('layouts.master')
@section('title', 'Log in')
@section('content')
<b><i>Log in</i></b><hr>
<form method="POST" action="/login">
    @csrf
	<input type="email" name="email" placeholder="email" required value="{{old('fName')}}"><br>
	<input type="password" name="password" placeholder="Password" required><br><br>
	<button>Submit</button><br>
</form>
@include('layouts.session')
@endsection