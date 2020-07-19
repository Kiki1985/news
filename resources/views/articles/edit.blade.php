@extends('layouts.master')
@section('title', 'Edit atricle')
@section('content')

<span class="h1"><i>Edit an article</i></span>

<div class="main"><hr>
<div class="show">

<form method="POST" action="/{{$category}}/{{$article->title}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
<div class="custom-select" style="width:200px;">
<select name="category">
@foreach($categories as $category)
	<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach

</select><br><br>
</div>

<input class="regist" type="text"  name="title" placeholder="Article title" required value="{{ucfirst(str_replace('-', ' ', $article->title))}}"><br><br>

<textarea class="textarea" name="body"   placeholder="Text of an article" required >{{$article->body}}</textarea><br><br>
<label for="image">Article image</label><br><br>
<input type="file" name="image"><br><br>
<button class="btnSubm" type="submit">Edit</button>
</form><br>
@include('layouts.errors')
	</div>
</div>


@endsection