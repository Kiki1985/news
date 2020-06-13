@component('mail::message')
# New Response: {{$response->body}}

By: {{$response->user->fName}} {{$response->user->lName}}

@component('mail::button', ['url' => url('/'. $response->comment->article->categories[0]->name . '/' . $response->comment->article->title . '#r' )])
View Response
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
