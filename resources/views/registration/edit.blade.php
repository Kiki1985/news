@extends('layouts.master')
@section('title', 'Edit profile')
@section('content')

<span class="h1"><i>Edit profile</i></span>
<div class="main"><hr>
    <div class="show">

<form method="POST" action="/users/{{auth()->user()->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
	<input class="regist" type="text" name="fName" placeholder="First Name" required value="{{$user->fName}}"><br>
	<input class="regist" type="text" name="lName" placeholder="Last Name" required value="{{$user->lName}}"><br>
	<input class="regist" type="email" name="email" placeholder="E-mail" required value="{{$user->email}}"><br>
	<input class="regist" type="password" name="password" placeholder="Password" required ><br>
	<input class="regist" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required ><br><br>
	<label for="image">Profile image</label><br><br>
	<input type="file" name="image"><br><br>
	<button class="btnSubm">Update Profile</button><br><br>
</form>
<form method="POST" action="/users/{{auth()->user()->id}}/deleteUser">
@method('DELETE')
@csrf
	<button class="btnSubm">Delete Profile</button><br><br>
</form>
<a href="/"><button class="btnSubm">Cancel</button></a><br><br>
@include('layouts.errors')
@include('layouts.session')
	</div>
</div>

@endsection