@component('mail::message')
# مرحبا : {{ $mailData['name'] }}


# ايميل :  {{ $mailData['title'] }}


{{-- @component('mail::button', ['url' => $mailData['url']]) --}}
 {{ $mailData['message'] }}
{{-- @endcomponent --}}

شكرا,<br>
{{ config('app.name') }}
@endcomponent