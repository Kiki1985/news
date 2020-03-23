<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<h3>New author registration</h3>
<form method="POST" action="/register">
    @csrf
	<input type="text" name="name" placeholder="Name" {{old('name')}}><br>
	<input type="email" name="email" placeholder="email" {{old('email')}}><br>
	<input type="password" name="password" placeholder="Password"><br>
	<button>Submit</button><br><br>
</form>
</body>
</html>