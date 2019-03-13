<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login</title>

</head>
<body style="background-color:white;">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="{{url('/')}}">Crowd Funding</a>



        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                @if(session('token'))
                    <li><a href="{{url('welcome')}}">Home</a></li>
                @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(session('token'))
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                @else
                    <li><a href="{{url('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                    <li><a href="{{url('register')}}">Register</a></li>
                @endif



            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
@include('p_info')
    <div class="container" style="margin-top:152px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('error')}}</strong>
                            </div>
                        @endif
                            @if(session('status'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('status')}}</strong>
                                </div>
                            @endif
                        <form class="form-horizontal" method="POST" action="" name="registration">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container text-center"  style="position:absolute;bottom:0;width:100%;">


    <footer >
        <p >Alright Reserved 2017</p>
    </footer>
</div>


<script src="{{asset('js/jquery.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script>
    $(function() {

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='registration']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name:"required",
                email: "required",
                password: "required",
                password_confirmation:{
                    required:true,
                    equalTo:"#password"

                }
            },
            // Specify validation error messages
            messages: {
                name:"* Please enter your name",
                email: "* Please enter your email",
                password: "* Please enter password",
                password_confirmation:{
                    required:"*Please enter password confirmation",
                    equalTo:"*Please enter the same password as above "
                }
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>


