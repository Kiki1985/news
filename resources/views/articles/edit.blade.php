@extends('layouts.master')
@section('title', 'Edit atricle')
@section('content')

<b><i>Edit an article</i></b><hr>

<form method="POST" action="/{{$category}}/{{$article->title}}">
    @method('PATCH')
    @csrf
<label for="category">Select a category:</label>
<select name="category">
@foreach($categories as $category)
	<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach

</select><br><br>
<input type="text" name="title" placeholder="Article title" required value="{{ucfirst(str_replace('-', ' ', $article->title))}}"><br><br>
<textarea name="body" placeholder="Text of an article" required >{{$article->body}}</textarea><br><br>
<button type="submit">Edit</button>
</form><br>
@include('layouts.errors')

@endsection