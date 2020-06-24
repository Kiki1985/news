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
    

    @if (session('msg'))
        <p class="subsMsg">{{ session('msg') }}</p>

    @else
    <p class="subsMsg">We will send you breaking news right to your inbox</p>
    @endif

    <form method="POST" action="/subscribers">
    @csrf
      <input class="btnSubm" type="submit" value="Subscribe"> 
      <input type="email" name="email" size="1" placeholder="@if(count($errors))@foreach($errors->all() as $error){{$error}}@endforeach @else Your e-mail @endif" required>
    </form>

</aside> 

<aside id="latestNews" class="noPadding">
@if(count($latestNews))
    <div>
    <span><i>Latest news</i></span>
    <hr>
    </div>
@endif
    <div id="latNew">
    @foreach($latestNews->slice(0,4) as $article)
        @foreach($article->categories as $category)
        <article data-title="{{ucfirst($article->title)}}">
            <div>
                <img src="/img/news.jpg" alt="&#9786" width="40%">
            </div>

            <div>
            <h2 style="margin-bottom: 0">
            <a href="/{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a>
            </h2>
            <p style="margin-top: 0; margin-bottom: 5px">
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
    </div>
</aside>  

<aside class="noPadding">
@if(count($topComments))
    <div>
    <span><i>Most commented</i></span>
    <hr>
    </div>
@endif
    <div id="mostComm">
    @foreach($topComments->slice(0,4) as $topCom)
        @foreach($topCom->categories as $categ)
        
        <div data-title="{{ucwords($topCom->title)}}" style=" position: relative; margin-top: 55px; margin-bottom: 30px">
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
        <hr class="hr2">
        
            @endforeach
        @endforeach
    </div>
</aside>

<aside class="noPadding">
@if(count($recentComments))
    <div>
    <span><i>Recent comments</i></span>
    <hr>
    </div>
@endif
    <article id="recentComm">
        <div>
        <ul>
        @foreach($recentComments->slice(0,4) as $comment)
        <li data-id="{{$comment->id}}" data-title="{{ucfirst($comment->article->title)}}">
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

<aside class="noPadding">
<span><i>Calendar</i></span>
    <hr>

    <div id="monthAndYear"></div>

    <table id="calendar">
        <thead>
            <tr>
            @for ($i = 0; $i < 7; $i++)
                <th class="day">{{$days[$i]}}</th>
            @endfor
            </tr>
        </thead>


        <tbody id='calendar-body'>
            
        </tbody>
   
    </table>
        
    <div id="prev-next" style="clear: both;">

        <div id="previous" class="fa fa-angle-left"></div>

        <div id="next" class="fa fa-angle-right"></div>


    </div>
   
</aside>



   