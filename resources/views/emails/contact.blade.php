@component('mail::message')
# New Contact Message

Name: {{$data['name']}} <br>
Email: {{$data['email']}} <br>
Message: {{$data['message']}} <br>

@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
