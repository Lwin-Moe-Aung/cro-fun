<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Forbidden</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    </style>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Warning !</h4>
                <br>
                <p>You are not authorized to access.</p>
                <p>Please contact the administrator to get more details</p>
                <hr>
                Please click <a href="/logout">here</a> to go back.
            </div>
        </div>
    </div>



</div>
<script src="{{asset('js/jquery.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
</body>
</html>
