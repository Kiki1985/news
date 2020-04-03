@extends('layouts.master')
@section('title', 'New author registration')
@section('content')
<b><i>Register</i></b><hr>
<form method="POST" action="/register">
    @csrf
	<input type="text" name="firstName" placeholder="First Name" required value="{{old('firstName')}}"><br>
	<input type="text" name="lastName" placeholder="Last Name" required value="{{old('lastName')}}"><br>
	<input type="email" name="email" placeholder="email" required value="{{old('email')}}"><br>
	<input type="password" name="password" placeholder="Password" required ><br>
	<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required ><br><br>
	<button>Submit</button><br><br>
</form>
@include('layouts.errors')
@include('layouts.session')
@endsection