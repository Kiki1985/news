
 <aside id="search">
    <span><i>Search</i></span><br>
    <input type="text" name="search" placeholder="I 'm looking for">
    <input class="btnSubm" type="submit" value="Search">
</aside>

    <aside class="follow">
        <span ><i>Folow us</i></span>
        <p>Read our latest news on any of these social networks!</p>
        <ul>
        @foreach($networks as $network)
          <li><a href="#" class="fa fa-{{$network}}"></a></li>
        @endforeach
        </ul>
        <hr>
    </aside>
    
    <aside class="subscription">
        <span><i>Get latest news delivered daily!</i></span>
        <p>We will send you breaking news right to your inbox</p>
        <form method="POST" action="/subscribers">
        @csrf
            <input class="btnSubm" type="submit" value="Subscribe"> 
            <input type="email" name="email" size="1" placeholder="Your E-mail" required value="{{old('email')}}">
        </form>
        @include('layouts.session')
    </aside> 

    <aside>
        <span><i>Latest news</i></span>
        <hr>

        @foreach($latestNews->slice(0,4) as $article)
    @foreach($article->categories as $category)
            
            <article>
            <div>
                <img src="/img/news.jpg" alt="&#9786" width="160"  height="120">
            </div>

            <div>
            <h2>
            <a href="/{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a>
            </h2>
                <p><i>{{$article->created_at->diffForHumans()}}</i></p>
            </div>
            <hr class="hr2">
            </article>
            @endforeach 
        @endforeach
        
    </aside>  
