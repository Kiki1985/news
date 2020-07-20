<header>
  <nav id="top">
    <div id="navDate">
      <i>{{$date->toFormattedDateString()}}</i>
    </div>

    <div id="login">
      @if(Auth::check())

        <div class="dropdown">
            <i>
              <a href="#" class="dropbtn">{{auth()->user()->fName}}
               <img src="{{asset('/storage/images/'.auth()->user()->image)}}" width="40" height="40">
              </a>
            </i>

          <div class="dropdown-content">
            <i><a href="/logout">Logout</a></i>
            <i><a href="/articles/create">New article</a></i>
          </div>
        </div>

      @else
      <ul>
        <li><i><a href="/login">Login</a></i></li>
        <li><i><a href="/register">Register</a></i></li>
      </ul>
      @endif
    </div>
  </nav> <!-- end nav id=top -->

  <div style="width: 100%; overflow: auto; border-top: 1px solid #CBCBCB"><span id="logo"><a href="/"><i>News</i><b>Test</b></a></span></div>
    
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

