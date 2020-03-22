<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
	<div style="text-align: center; margin:auto; width: 50%">
	    <a href="/category/sport/?category=sport"><button>Sport</button></a>
        <a href="/category/politic/?category=politic"><button>Politic</button></a>
        <a href="/category/economy/?category=economy"><button>Economy</button></a>
		@yield('content')
	</div>
</body>
</html>