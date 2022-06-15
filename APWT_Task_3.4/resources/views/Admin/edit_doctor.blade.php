@extends('layouts.admin_dash')
@section('content')
<div class="container">
    <div style="text-align:center;">
        <h4>Edit Doctor's Profile</h4>
        <small>Not all given informations can be edited</small>
    </div><br>
<form action="{{ route('upProfile') }}" method="post" class="row g-3" enctype="multipart/form-data">
    @csrf
    <div class="col-6">
        <input type="hidden" name="d_id" value="{{ $doctor->doctor_id}}">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="{{ $doctor->doctor_username }}"><span class="text-danger">
            @error('username'){{$message}}@enderror
        </span>
      </div>
      <div class="col-6">

        <label  class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $doctor->doctor_name }}"><span class="text-danger">
            @error('name'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">
        <br>
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="inputPassword4" value="{{ $doctor->doctor_pass }}"><span class="text-danger">
            @error('pass'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">
        <br>
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="mail" placeholder="Email" value="{{ $doctor->doctor_email }}"<span class="text-danger">
            @error('mail'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">
          <br>
        <label class="form-label">Contact No</label>
        <input type="text" class="form-control" name="contact" placeholder="Phone Number" value="{{ $doctor->doctor_phone}}"><span class="text-danger">
            @error('contact'){{$message}}@enderror
        </span>
      </div>

    </div>
    <div class="col-6" style="padding-left:260px">
        <br>

        <input type="submit" value="Edit" class="btn btn-primary"> <br>

      </div><br>

</form>
</div>
@endsection
