@extends('layouts.master')
@section('title', 'Create a new article')
@section('content')

<span class="h1"><i>New article</i></span>
<div class="main"><hr>
<div class="show">

<form method="POST" action="/articles" enctype="multipart/form-data">
@csrf
<div class="custom-select" style="width:200px;">
<select name="category">
@foreach($categories as $category)
	<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>
</div>
<input class="regist" type="text"  name="title" placeholder="Title" required value="{{old('title')}}"><br><br>
<textarea class="textarea" name="body" placeholder="Text of an article" required >{{old('body')}}</textarea><br><br>
<label for="image">Article image</label><br><br>
<input type="file" name="image"><br><br>
<button class="btnSubm" type="submit">Create</button>
</form><br>
@include('layouts.errors')
 @include('layouts.session')
<table align="center">

 <tr>

@foreach($articles as $article)
    @foreach($article->categories as $category)
    <td><p><a href="/{{$category->name}}/{{$article->title}}">{{ucfirst(str_replace('-', ' ', $article->title))}}</a></p></td>

    <td><a href="/{{$category->name}}/{{$article->title}}/edit"><button>Edit</button></a></td>

<td><form method="POST" action="/{{$category->name}}/{{$article->title}}">
    @method('DELETE')
    @csrf
    <div><button>Delete</button></div>
</form></td>

</tr>
    
    @endforeach
@endforeach

</table><br>

 <a href="/logout"><button class="btnSubm">Logout</button></a>

 </div>
</div>
@endsection