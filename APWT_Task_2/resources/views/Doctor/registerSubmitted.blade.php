@extends('layouts.app')
@section('content')
<div class="container">
    <div style="text-align:center">
        <h4>Your Provided Informations</h4>
        <small>Doctor Details</small>

    </div><br>
    <table class="table">
        <thead class="table-dark">
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Contact No</th>
        </thead>
        <tbody>
          <td>{{$name}}</td>
          <td>{{$email}}</td>
          <td>{{$gender}}</td>
          <td>{{$contact}}</td>
        </tbody>
      </table><br>
      <a href="{{route('home')}}" class="btn btn-primary">Go Back to Home</a>
</div>
@endsection
