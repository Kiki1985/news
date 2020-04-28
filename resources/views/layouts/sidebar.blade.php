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
    <p class="subsMsg">We will send you breaking news right to your inbox</p>
    <input class="btnSubm" type="submit" value="Subscribe"> 
    <input type="email" name="email" size="1" placeholder="Your E-mail" required >
</aside> 

<aside id="latestNews">
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
            <p>
              <i class="commentsI">By </i> 
              <i class="commentsI">{{$article->user->fName}} {{$article->user->lName}}</i>
              <i class="fa fa-clock-o"></i>
              <i class="commentsI">{{$article->created_at->diffForHumans()}}</i>
            </p>
            </div>
            <hr class="hr2">
            </article>
        @endforeach 
    @endforeach
</aside>  

<aside>

    <span><i>Most commented</i></span>
    <hr>

    @foreach($topComments->slice(0,4) as $topCom)
        @foreach($topCom->categories as $categ)
        <article>
        <div style=" position: relative;">
        <div class="imgCateg">
            <a href="/{{$categ->name}}"><i>{{ucfirst($categ->name)}}</i></a>
        </div>
            <img src="/img/news.jpg" width="100%">
            <a href="/{{$categ->name}}/{{$topCom->title}}">
              <div id="smallTitle">
                <h2>
                  {{ucwords(str_replace('-', ' ', $topCom->title))}}
                </h2>  
                <p>
                <i class="commentsI">By </i>
                <i class="commentsI">{{$topCom->user->fName}} {{$topCom->user->lName}}</i>
                <i class="fa fa-clock-o"></i>
                <i class="commentsI">{{$topCom->created_at->diffForHumans()}}</i>
                </p>
              </div>
            </a>
        </div>
        </article>
            @endforeach
        @endforeach
</aside>

<aside style="clear: both;">
@if(count($recentComments))
    <span><i>Recent comments</i></span>
    <hr>
@endif
    <article id="recentComm">
        <div>
        <ul>
        @foreach($recentComments->slice(0,4) as $comment)
        <li>
          <p>
            <i class="commentsI">By</i>
            <i class="commentsI">{{$comment->user->fName}} {{$comment->user->lName}}</i>
            <i class="fa fa-clock-o"></i>
            <i class="commentsI">{{$comment->created_at->diffForHumans()}}</i>
          </p>

        <a href="/news/{{$comment->article->title}}"><h5 id="h5">{{rtrim(ucwords(substr($comment->body,0,60)), '.')}}</h5></a><hr class="hr2"></li>
        @endforeach
        </ul>
        </div> 
    </article> 
</aside>

   