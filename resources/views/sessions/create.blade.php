@extends('layouts.master')
@section('title', 'Log in')
@section('content')

<span class="h1"><i>Login</i></span>
<div class="main"><hr>
    <div class="show">

<form method="POST" action="/login">
    @csrf
	<input type="email" class="regist" name="email" placeholder="Your E-mail" required value="{{old('fName')}}"><br>
	<input type="password" class="regist" name="password" placeholder="Password" required><br><br>
	<button class="btnSubm">Log in</button><br>
</form>
@include('layouts.session')
    </div>
</div>

@endsection