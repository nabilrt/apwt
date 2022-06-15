@extends('layouts.admin_dash')
@section('content')
<div class="container">
<div style="text-align:center;">
    <h4>Manage Doctors</h4>
    <small>As an admin you can modify the users</small>
</div><br>
<table class="table table-bordered">
    <tr class="table-primary">
    <th class="table-primary">Doctor ID</th>
    <th class="table-primary">Doctor Name</th>
    <th class="table-primary">Doctor Phone</th>
    <th class="table-primary"></th>
    <th class="table-primary"></th>
    <th class="table-primary"></th>
</tr>
@foreach($doctors as $doctor)
<tr class="table-info">
<td >{{ $doctor->doctor_id }}</td>
<td >{{ $doctor->doctor_name }}</td>
<td >{{ $doctor->doctor_phone }}</td>
<td ><a href="/d-{{ $doctor->doctor_id }}" class="btn btn-info">View</a></td>
<td ><a href="/dE-{{ $doctor->doctor_id }}" class="btn btn-warning">Edit</a></td>
<td ><a href="/dD-{{ $doctor->doctor_id }}" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
</table>
</div>
@endsection
