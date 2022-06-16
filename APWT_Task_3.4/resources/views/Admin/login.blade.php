@extends('layouts.app')
@section('content')
<div class="container">
    <div style="text-align:center;">

        <h4>Admin Login</h4>
        <small>Please enter correct credentials</small>
        <br><br>

    </div>
    <form action="{{ route('admin_login') }}" method="post" class="row g-3">
        @csrf
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} ?>"><span class="text-danger">
                @error('username'){{$message}}@enderror
            </span>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <br>
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" id="passw" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>"><span class="text-danger">
                @error('pass'){{$message}}@enderror
                </span><br>
        </div>
        <div class="col-md-4">

        </div><br>

        <div class="col-md-4">
            <br>
        </div>
        <div class="col-md-4">

            <input type="checkbox" name="remember" id="" class="form-select"> Remember Me <br><br>

            <input type="submit" value="Login" class="btn btn-info" ><span class="text-danger">
            @if(!empty($message)){{ $message }}@endif
            </span><br>
        </div>
        <div class="col-md-4">
        </div><br>
    </form>
</div><br>
@endsection
