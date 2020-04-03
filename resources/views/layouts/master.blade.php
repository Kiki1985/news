<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
	<div style="text-align: center; margin:auto; width: 50%">
		@include('layouts.categories')
		@yield('content')
	</div>
</body>
</html>