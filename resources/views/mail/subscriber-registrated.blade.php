@component('mail::message')
Weclome {{$subscriber->name}}

You will get latest news to your email adres {{$subscriber->email}}

@component('mail::button', ['url' => '/'])
Latest News
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
