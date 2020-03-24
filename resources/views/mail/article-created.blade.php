@component('mail::message')
New article: {{$article->title}}

{{$article->body}}

@component('mail::button', ['url' => url('/' . $article->category . '/article/' . $article->id )])
View Article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
