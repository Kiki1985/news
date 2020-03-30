@foreach($categories as $category)
	<a href="/categories/{{$category->id}}"><button>{{strtoupper($category->category)}}</button></a>
@endforeach