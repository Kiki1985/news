<footer>
    <aside class="subscription">
        <span><i>Get latest news delivered daily!</i></span>
        <p>We will send you breaking news right to your inbox</p>
        <form method="POST" action="/subscribers">
        @csrf
            <input type="email" name="email" placeholder="Your E-mail" required value="{{old('email')}}">
            <input class="btnSubm" type="submit" value="Subscribe">
        </form>
    </aside>

    <aside class="categories">
        <h3>Categories</h3>
        <ul>
        @foreach($categories as $category)
            <li><i><a href="/{{$category}}">{{ucfirst($category)}}</a></i></li>
            @endforeach
        </ul>
    </aside>

    <div id="archives">
        <h3>Archives</h3>
        <ul>

        @foreach($archives as $stats)
          <li>
            <i>
              <a href="/?month={{$stats['month']}}&year={{$stats['year']}}">
                {{$stats['month'] . ' ' . $stats['year']}}
              </a>
            </i>
          </li>
        @endforeach  
        </ul>
    </div>

    <aside id="tags">
        <h3>Tags</h3>

        <ul>
        @foreach($categories as $category)
            <li><a href="/{{$category}}"><div class="tag" style=""><i>{{ucfirst($category)}}</i></div></a></li>
        @endforeach
            <li><a href="#"><div class="tag"><i>Art</i></div></a></li>
            <li><a href="#"><div class="tag"><i>Tech</i></div></a></li>
            <li><a href="#"><div class="tag"><i>World</i></div></a></li>
        </ul>
        
    </aside>

    <hr style="clear: both; margin-bottom: 30px;">

    <aside class="follow">
        <div id="networks"">
            <ul>
            @foreach($networks as $network)
              <li><a href="#" class="fa fa-{{$network}}"></a></li>
            @endforeach
            </ul>
        </div>
    </aside>
    <span id="logo"><a href="/"><i>News</i><b>Test</b></a></span>

</footer>  