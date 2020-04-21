<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

	<title>@yield('title')</title>
</head>
<body>

	<div>
	    
	    @include('layouts.header')
		
		@yield('content')

		@include('layouts.sidebar')
	    	
	    @include('layouts.footer')
	
	</div>
</body>
</html>