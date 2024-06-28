@component('mail::message')
# Hello 

The body of your message.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit our app
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
