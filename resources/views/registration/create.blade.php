<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<h3>New author registration</h3>
<form method="POST" action="/register">
    @csrf
	<input type="text" name="fName" placeholder="First Name" required value="{{old('name')}}"><br>
	<input type="text" name="lName" placeholder="Last Name" required value="{{old('name')}}"><br>
	<input type="email" name="email" placeholder="email" required value="{{old('name')}}"><br>
	<input type="password" name="password" placeholder="Password"><br>
	<button>Submit</button><br><br>
</form>
</body>
</html>