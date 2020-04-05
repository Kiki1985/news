@extends('layouts.master')
@section('title', 'Create a new article')
@section('content')
<b><i>Create a new article</i></b><hr>
<form method="POST" action="/articles">
    @csrf
<label for="category">Select a category:</label>
<select name="category">
@foreach($categories as $category)
	<option value="{{$category}}">{{$category}}</option>
@endforeach

</select><br><br>
<input type="text" name="title" placeholder="Article title" required value="{{old('title')}}"><br><br>
<textarea name="body" placeholder="Text of an article" required >{{old('body')}}</textarea><br><br>
<button type="submit">Publish</button>
</form><br>
@include('layouts.errors')

@foreach($articles as $article)
<p>{{ucfirst(str_replace('-', ' ', $article->title))}}</p>
@endforeach

 <a href="/logout"><button>Logout</button></a>
 @include('layouts.session')
@endsection