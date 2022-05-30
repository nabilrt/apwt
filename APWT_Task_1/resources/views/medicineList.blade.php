@extends('layouts.app')
@section('content')
<h5>Currently Available Medicines</h5>
<small>Prices for 10 tablets are shown</small>
<br>
    <div class="col"><br>
        <h5>Medicine 1</h5>
        @foreach ($medicine1 as $m1=>$m1_value)
        <li>{{$m1." : ".$m1_value}}</li>
        @endforeach
        <br><button type="button" class="btn btn-info" disabled>Buy</button>
    </div><br>
    <div class="col">
        <h5>Medicine 2</h5>
        @foreach ($medicine2 as $m2=>$m2_value)
        <li>{{$m2." : ".$m2_value}}</li>
        @endforeach
        <br><button type="button" class="btn btn-info" disabled>Buy</button>
    </div><br>
    <div class="col">
        <h5>Medicine 3</h5>
        @foreach ($medicine3 as $m3=>$m3_value)
        <li>{{$m3." : ".$m3_value}}</li>
        @endforeach
        <br><button type="button" class="btn btn-info" disabled>Buy</button>
    </div>

@endsection
