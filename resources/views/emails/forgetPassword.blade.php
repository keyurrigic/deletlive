@component('mail::message')
<p>You can reset password from bellow link:</p>
 
</p>@component('mail::button', ['url' => route('reset.password.get', $token)])Reset Password
@endcomponent</p>
 
@endcomponent