@extends('layout')
@section('title', 'Create a new article')
@section('content')
<p>Author: {{Auth::user()->name}}</p>
<h3>Create a new article</h3>

<form method="POST" action="/article">
    @csrf
<label for="category">Select a category:</label>
<select name="category" id="category">
	<option value="sport">Sport</option>
	<option value="politic">Politic</option>
	<option value="economy">Economy</option>
</select><br><br>
<input type="text" name="title" placeholder="Article title" required="required"><br><br>
<textarea name="body" placeholder="Text of an article" required="required"></textarea><br><br>
<button type="submit">Create</button>
</form><br>
@foreach($articles as $article)
<p>{{$article->title}}</p>
@endforeach
 <a href="/logout"><button>Logout</button></a>
@endsection