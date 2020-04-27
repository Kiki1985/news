<!DOCTYPE html>
<html>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('title')</title>

</head>
<body>

	<div>
	    
	    @include('layouts.header')
		
		@yield('content')

		@include('layouts.sidebar')

		 <a href="#" id="scroll" style="display: none;"><span></span></a>  
	    	
	    @include('layouts.footer')
	
	</div>
</body>
</html>

