@extends('layout.master')
@section('title','Change Password')
@section('container')

    <div class="container" style="margin-top: 205px; margin-bottom: 150px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper">
                    <div class="form-header" style="text-align: center;"><h3><b>Change Password</b></h3></div>

                    <div class="form-body">
                        @if (session('status'))
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('status')}}</strong>
                            </div>
                        @endif
                            @if (session('error'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('error')}}</strong>
                                </div>
                            @endif


                        <form class="form-horizontal" role="form" method="post" name="change_password" >
                            {{csrf_field()}}


                            <div class="form-group">
                                <label for="old_password" class="col-md-4 control-label">Old Password:</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control" name="old_password" >


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password:</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="col-md-4 control-label">Confirm Password:</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Change Password
                                    </button>
                                    <a class="btn btn-default" href="{{url('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @include('layout.footer')


        <script src="{{asset('js/change_password.js')}}"></script>

@endsection
