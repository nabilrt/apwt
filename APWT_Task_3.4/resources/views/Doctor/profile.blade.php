@extends('layouts.dash')
@section('content')
<div class="container">
    <div style="text-align:center;">

        <h3>Doctor's Profile</h3>

        <br>

        <img src="{{ 'storage/dp/'.$doctor->doctor_dp }}" alt="" title="" height="270" width="220" class="rounded mx-auto d-block" ><br>


       <p class="h4"> Name : {{ $doctor->doctor_name }} </p>
       <p class="h4">Email : {{ $doctor->doctor_email}}</p>
       <p class="h4"> Gender : {{ $doctor->doctor_gender }}</p>
       <p class="h4"> Doctor Type : {{ $doctor->doctor_type}} </p> <br>

       <a href="{{ route('edit_profile') }}" class="btn btn-outline-info">Edit</a><br><br>



    </div>
</div>
@endsection
