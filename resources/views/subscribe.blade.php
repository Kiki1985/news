<!DOCTYPE html>
<html>
<head>
	<title>Subscribe</title>
</head>
<body>
	<div style="text-align: center; margin:auto; width: 50%">
		<b><i>Subscribe to news</i></b>
		<form method="POST" action="/subscribe">
			@csrf
			<input type="text" name="name" placeholder="Name" required value="{{old('name')}}"><br>
			<input type="email" name="email" placeholder="email" required value="{{old('email')}}"><br>
			<button>Submit</button>
		</form>
	</div>
</body>
</html>

