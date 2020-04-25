<header>
  <nav id="top">
    <div id="navDate">
      <i>{{$date->toFormattedDateString()}}</i>
    </div>

    <div id="login">
      @if(Auth::check())
      <ul>
        <li><i><a href="#">{{auth()->user()->fName}}</a></i></li>
        <li><i><a href="/logout">Logout</a></i></li>
        <li><i><a href="/articles/create">New article</a></i></li>
      </ul>
      @else
      <ul>
        <li><i><a href="/login">Login</a></i></li>
        <li><i><a href="/register">Register</a></i></li>
      </ul>
      @endif
    </div>
  </nav> <!-- end nav id=top -->

  <span id="logo"><a href="/"><i>News</i><b>Test</b></a></span>
    
  <nav id="down">
  <div id="divNav" style="overflow: auto;
              margin: 0 auto;
              max-width: 1790px;
              transition: padding 300ms ease;">
    <div class="categories">
      <ul>
        <li><b><a href="/">News</a></b></li>
        @foreach($categories as $category)
        <li><b><a href="/{{$category}}">{{ucfirst($category)}}</a></b></li>
        @endforeach
      </ul>
    </div>

    <aside class="follow">

      <div id="networks">
        <ul>
        @foreach($networks as $network)
          <li><a href="#" class="fa fa-{{$network}}"></a></li>
        @endforeach
        </ul>
      </div>
    </aside>
  </div>
  </nav> <!-- end nav id=down -->
</header>

