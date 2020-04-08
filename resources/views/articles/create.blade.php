@extends('layouts.master')
@section('title', 'Create a new article')
@section('content')

<b><i>Create an article</i></b><hr>

<form method="POST" action="/articles">
    @csrf
<label for="category">Select a category:</label>
<select name="category">
@foreach($categories as $category)
	<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach

</select><br><br>
<input type="text" name="title" placeholder="Article title" required value="{{old('title')}}"><br><br>
<textarea name="body" placeholder="Text of an article" required >{{old('body')}}</textarea><br><br>
<button type="submit">Create</button>
</form><br>
@include('layouts.errors')
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

 <a href="/logout"><button>Logout</button></a>
 @include('layouts.session')
@endsection