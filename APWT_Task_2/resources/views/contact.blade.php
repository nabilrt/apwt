@extends('layouts.app')
@section('content')
<div class="container">
    <div style="text-align:center;">
        <h4>Contact Us</h4>
        <small>Please Fill up this form with proper details</small>
        <br>
    </div>
    <form action="{{route('contactSubmitted')}}" method="post">
        @csrf
        <div class="mb-3">
          <label  class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="mail"><span class="text-danger">
                @error('mail'){{$message}}@enderror
                </span><br>
          </div>
        </div>
        <div class="mb-3">
          <label  class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name"><span class="text-danger">
                @error('name'){{$message}}@enderror
                </span><br>
         </div><br>
         <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Query</label>
            <textarea class="form-control" rows="3" name="info"></textarea><span class="text-danger">
                @error('info'){{$message}}@enderror
                </span><br>
        </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-info">
    </form>
</div>
@endsection

