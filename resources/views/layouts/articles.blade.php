@if($category->name == 'news')
@include('layouts.index')
@endif

<span class="h1"><i>{{ucfirst($category->name)}}</i></span>

<div class="main"><hr>

@foreach($articles as $article)
    @foreach($article->categories as $category)

    <div class="article">
        <div class="divImg">

            <img src='/img/news.jpg' alt="&#9786" width="160"  height="120">
            <a href="/{{$category->name}}"><div class="imgCateg"><i>{{ucfirst($category->name)}}</i></div></a>
        </div>

        <h2>
            <a class="title-href" href="/{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a>
        </h2>

        <p>{{substr($article->body,0,200)}} ... <a href="/{{$category->name}}/{{$article->title}}">Read more</a></p>

        <p><i>by {{$article->user->fName}} {{$article->user->lName}}, {{$article->created_at->diffForHumans()}}</i></p>
       
   

    <div style="float: left;">
    @can('update', $article) 
   
        <div class="edit-article">
        <a href="/{{$category->name}}/{{$article->title}}/edit"><button class="btnSubm">Edit</button></a>
        </div> 

        <div class="delete-article">
            <button class="btnSubm">Delete</button>
        </div>

    @endcan
    </div>
    <hr class="hr2">
     </div> <!-- end div article -->
    @endforeach
@endforeach

</div> <!-- end div main -->

   

       

       


