<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
</head>
<body>
<h3>Author log in</h3>
<form method="POST" action="/login">
    @csrf
	<input type="text" name="fName" placeholder="First Name" required value="{{old('fName')}}"><br>
	<input type="text" name="lName" placeholder="Last Name" required value="{{old('fName')}}"><br>
	<input type="password" name="password" placeholder="Password" required><br>
	<button>Submit</button><br><br>
</form>
@if (session('message'))
    <p>{{ session('message') }}
@endif
</body>
</html>