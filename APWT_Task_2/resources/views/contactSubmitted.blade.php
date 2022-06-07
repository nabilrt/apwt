@extends('layouts.app')
@section('content')
<div class="container">
    <div style="text-align:center;">
        <h4>Given Details</h4>
        <small>Please check the provided details</small>
<br>
    </div>
    Email : {{$mail}} <br>
    Name  : {{$name}} <br>
    Query : {{$info}} <br>
    <br>
    Please wait for response on email. <br><br>
    <a href="{{route('home')}}" class="btn btn-primary">Go to Home</a><br>

</div>
@endsection

