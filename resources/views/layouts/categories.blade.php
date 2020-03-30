@foreach($categories as $categ)
	<a href="/categories/{{$categ->id}}"><button>{{strtoupper($categ->category)}}</button></a>
@endforeach