@extends('layouts.master')
@section('title', 'Register')
@section('content')

<span class="h1"><i>Register</i></span>
<div class="main"><hr>
    <div class="show">

<form method="POST" action="/register" enctype="multipart/form-data">
    @csrf
	<input class="regist" type="text" name="firstName" placeholder="First Name" required value="{{old('firstName')}}"><br>
	<input class="regist" type="text" name="lastName" placeholder="Last Name" required value="{{old('lastName')}}"><br>
	<input class="regist" type="email" name="email" placeholder="E-mail" required value="{{old('email')}}"><br>
	<input class="regist" type="password" name="password" placeholder="Password" required ><br>
	<input class="regist" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required ><br><br>
	<label for="image">Profile image</label><br><br>
	<input type="file" name="image"><br><br>
	<button class="btnSubm">Register</button><br><br>
</form>
@include('layouts.errors')
@include('layouts.session')
	</div>
</div>

@endsection