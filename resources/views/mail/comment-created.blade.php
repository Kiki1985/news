@component('mail::message')
# New Comment: {{$comment->body}}

By: {{$comment->user->fName}} {{$comment->user->lName}}

{{$comment->article->categories[0]->name}}

@component('mail::button', ['url' => url('/'. $comment->article->categories[0]->name . '/' . $comment->article->title . '#r' )])
Show Comment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
