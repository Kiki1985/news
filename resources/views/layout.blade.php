<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
	<div style="text-align: center; margin:auto; width: 50%">
	@foreach($categories as $category)
	    <a href="/category/{{$category}}"><button>{{ucfirst($category)}}</button></a>
    @endforeach
		@yield('content')
	</div>
</body>
</html>