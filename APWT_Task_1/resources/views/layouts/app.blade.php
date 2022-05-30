<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>No Intention Pharmaceuticals</title>
</head>
<body>
<div style="padding-left:30px">
<div style="display:flex">
            @include('inc.sideNav')
            <div style="padding-left:70px">
                <br>
                <h4>Welcome to No Intention Pharmaceuticals</h4><br>
                @yield('content')
            </div>
</div>
        </div>
</body>
</html>
