<div id="index">
    <div id="bigRight">
        <img src="/img/news.jpg" alt="&#9786" width="100%">
        <div class="imgCateg">
            <a href="/"><i>{{ucfirst($category->name)}}</i></a>
        </div>
        @foreach($articles as $article)
            @foreach($article->first()->categories as $categ)
            <a href="/{{$categ->name}}/{{$articles->first()->title}}">
                <div id="bigTitle">
                    <h2>{{ucwords(str_replace('-', ' ', $articles->first()->title))}}</h2>
                </div>
            </a>
            @endforeach
        @endforeach
    </div> <!-- end of div id=bigRight --> 
    <div id="bigLeft">
    @foreach($categories->slice(0, 4) as $categ)
        <div class="smallLeft">
            <div class="imgCateg">
                <a href="/{{$categ->name}}"><i>{{ucfirst($categ->name)}}</i></a>
            </div>
            <img src="/img/news.jpg" alt="&#9786" width="100%">
            @foreach($categ->articles->slice(0, 1) as $art)
                <a href="/{{$categ->name}}/{{$art->title}}">
                    <div id="smallTitle">
                        <h2>{{ucwords(str_replace('-', ' ', $art->title))}}</h2>
                    </div>
                </a>
            @endforeach
        </div> <!-- end of div smallLeft -->
        @endforeach
    </div> <!-- end of div id=bigLeft -->
</div> <!-- end of div id=index -->