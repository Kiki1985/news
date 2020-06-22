@if($category->name == 'news')
@include('layouts.index')
@endif

<span class="h1"><i>{{ucfirst($category->name)}}</i></span>

<div class="main">

@include('layouts.articlesPagination')

</div> <!-- end div main -->

   

       

       


