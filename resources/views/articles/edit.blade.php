@extends('layouts.master')
@section('title', 'Update atricle')
@section('content')
<b><i>Update an article</i></b><hr>


<form method="POST" action="/{{$category}}/{{$article->title}}">
    {{ method_field('PATCH') }}
    @csrf
<label for="category">Select a category:</label>
<select name="category">
@foreach($categories as $category)
	<option value="{{$category}}">{{$category}}</option>
@endforeach

</select><br><br>
<input type="text" name="title" placeholder="Article title" required value="{{ucfirst(str_replace('-', ' ', $article->title))}}"><br><br>
<textarea name="body" placeholder="Text of an article" required >{{$article->body}}</textarea><br><br>
<button type="submit">Publish</button>
</form><br>
@include('layouts.errors')

@endsection