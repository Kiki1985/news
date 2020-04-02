@extends('layouts.master')
@section('title', 'Create a new article')
@section('content')
<p>Author: {{Auth::user()->fName}} {{Auth::user()->lName}}</p>
<h3>Create a new article</h3>

<form method="POST" action="/articles">
    @csrf
<label for="category">Select a category:</label>
<select name="tag">
@foreach($options as $option)
	<option value="{{$option}}">{{$option}}</option>
@endforeach

</select><br><br>
<input type="text" name="title" placeholder="Article title" required value="{{old('title')}}"><br><br>
<textarea name="body" placeholder="Text of an article" required >{{old('body')}}</textarea><br><br>
<button type="submit">Create</button>
</form><br>
@include('layouts.errors')
@foreach($articles as $article)
<p>{{$article->title}}</p>
@endforeach

 <a href="/logout"><button>Logout</button></a>
@endsection