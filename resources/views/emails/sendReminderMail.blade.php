@component('mail::message')
# We Miss you at $Fundz 😥😥

Dear {{$user->name}},
<h5>We've noticed since you created your account with fundz, you've not been active. Kindly visit <a href="https://fundz.live/savings">Fundz</a> to make your first deposit.</h5>  

 @if($user->email_verified_at == null)
  <h5>We also noticed you haven't verified your email address</h5>
    <a href="http://fundz.live/savings">Click here to verify your email address</a>;
 @endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
