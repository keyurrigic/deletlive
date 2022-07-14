@component('mail::message')
<p><b>Inquiry Type : </b>{{$inquiry->inquiry_type}}</p>
<p><b>Name : </b>{{$inquiry->name}}</p>
<p><b>Email : </b>{{$inquiry->email}}</p>
<p><b>Phone : </b>{{$inquiry->phone}}</p>
<p><b>Message : </b>{{$inquiry->message}}</p>
@endcomponent