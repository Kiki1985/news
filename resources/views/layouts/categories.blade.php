<div>
    <div style="float: left">
        <a href="/">all news</a>&nbsp
        @foreach($categories as $category)
	    <a href="/categories/{{$category}}">{{$category}}</a>&nbsp
        @endforeach
    </div>
    
    <div style="float: right;">
        @if(Auth::check())
        <a href="#">{{Auth::user()->fName}}</a>&nbsp
        <a href="/logout">Logout</a>&nbsp
        <a href="/authors/articles/create">New article</a>
        @else
        <a href="/login">Login</a>&nbsp
        <a href="/register">Register</a>
        @endif
    </div>
</div>
<br><br>
