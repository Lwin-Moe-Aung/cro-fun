

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-3.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="well">
    <h2>Password Reset</h2>
    <p>
        Email :{{$email}}
</p>
<p>You are receiving this email because we received a password reset request for your account</p>
<a href="{{url('reset/password/'.$email.'/'.$token)}}"><button class="btn btn-primary">Reset Password</button> </a>
</div>
</body>
</html>





