@extends('layouts.app')
@section('content')
<div class="container">
    <div style="text-align:center;">
        <h4>Doctor Registration Form</h4>
        <small>Please Fill up this form correctly</small>
    </div><br>
<form action="{{ route('registerSubmit') }}" method="post" class="row g-3" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username"><span class="text-danger">
            @error('username'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="inputPassword4"><span class="text-danger">
            @error('pass'){{$message}}@enderror
        </span>
      </div>
      <div class="col-12">
        <br>
        <label  class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name"><span class="text-danger">
            @error('name'){{$message}}@enderror
        </span>
      </div>
      <div class="col-12">
        <br>
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="mail" placeholder="Email"><span class="text-danger">
            @error('mail'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">
          <br>
        <label class="form-label">Contact No</label>
        <input type="text" class="form-control" name="contact" placeholder="Phone Number"><span class="text-danger">
            @error('contact'){{$message}}@enderror
        </span>
      </div>
      <div class="col-6">
          <br>
        <label class="form-label">Gender</label>
        <select class="form-control" name="gender">
          <option>Choose One</option>
          <option>Male</option>
          <option>Female</option>
        </select><span class="text-danger">
            @error('gender'){{$message}}@enderror
        </span>
      </div>
      <div class="col-12">
        <br>
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob"><span class="text-danger">
            @error('dob'){{$message}}@enderror
        </span>
      </div>
      <div class="col-6">
        <br>
        <label class="form-label">Picture</label>
      <input type="file" name="dp" class="form-control"><span class="text-danger">
        @error('dp'){{$message}}@enderror
    </span>
    </div>
    <div class="col-6">
        <br>
        <label class="form-label">Degree</label>
      <input type="file" name="degree" class="form-control"><span class="text-danger">
        @error('degree'){{$message}}@enderror
    </span>
    </div>
    <div class="col-12">
        <br>
      <label class="form-label">Doctor Type</label>
      <select class="form-control" name="doc_type">
        <option>Choose One</option>
        <option>Normal</option>
        <option>Specialist</option>
      </select><span class="text-danger">
          @error('doc_type'){{$message}}@enderror
      </span>


    </div>
      <div class="col-12">
          <br>
        <input type="submit" value="Register" class="btn btn-primary"> <br>
        @if(!empty($msg)){{ $msg }}@endif
      </div>
</form>
</div>
@endsection
