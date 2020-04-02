@foreach($categories as $category)
	<a href="/categories/{{$category}}"><button>{{$category}}</button></a>
@endforeach