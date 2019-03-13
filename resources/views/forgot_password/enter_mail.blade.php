@extends('layout.master')
@section('title','Reset Password')
@section('container')



    <div class="container" style="margin-top:205px;margin-bottom:252px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper">
                    <div class="form-header" style="text-align: center;"><h3><b>Reset Password</b></h3></div>
                    <div class="form-body">
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

                        <form class="form-horizontal" role="form" method="POST" action="{{url('forgot/password')}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


        @include('layout.footer')





@endsection
