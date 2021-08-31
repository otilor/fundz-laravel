@component('mail::message')
# You have a new contact message


Name: {{ $data['name'] }} <br> 
Email: {{ $data['email'] }} <br>
Message: {{ $data['message'] }} <br>

@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
