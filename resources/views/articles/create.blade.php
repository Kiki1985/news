<!DOCTYPE html>
<html>
<head>
	<title>Create a new article</title>
</head>
<body>
<p>Author: {{Auth::user()->fName}} {{Auth::user()->lName}}</p>
<h3>Create a new article</h3>

<form method="POST" action="/article">
    @csrf
<label for="category">Select a category:</label>
<select name="category" id="category">
	<option value="sport">Sport</option>
	<option value="politic">Politic</option>
	<option value="economy">Economy</option>
</select><br><br>
<input type="text" name="title" placeholder="Article title" required="required" value="{{old('title')}}"><br><br>
<textarea name="body" placeholder="Text of an article" required="required">{{old('title')}}</textarea><br><br>
<button type="submit">Create</button>
</form><br>

@foreach($articles as $article)
<p>{{$article->title}}</p>
@endforeach

 <a href="/logout"><button>Logout</button></a>
</body>
</html>