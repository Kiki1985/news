@foreach($categories as $categ)
	<a href="/category/{{$categ->category}}"><button>{{strtoupper($categ->category)}}</button></a>
@endforeach