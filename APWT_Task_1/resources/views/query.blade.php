@extends('layouts.app')
@section('content')
<h6>Your Given Informations</h6><br>
Name : {{$name}} <br>
Email : {{$mail}} <br>
Query : {{$info}} <br><br>
Your query will be answered through email. <br><br>
<a href="{{route('home')}}" class="btn btn-primary">Go Back to Home</a>
@endsection
