@extends('layout.master')
@section('title','Login')
@section('container')
<div class="container" style="margin-top: 160px; margin-bottom: 150px;">
  <div class="row" style="">
  <div class="col-md-2 col-md-offset-2 text-center hidden-xs hidden-sm">
                @include('form-img')
    </div>
    <div class="col-md-5" style="">
    <div class="form-wrapper">
      <div>
        <div class="form-header">
          <h4 class="text-center">အေကာင့္ဝင္ရန္</h4>
        </div>
        <div class="form-body">
          @if(session('error'))
          <div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>{{session('error')}}</strong> </div>
          @endif
          @if(session('status'))
          <div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>{{session('status')}}</strong> </div>
          @endif
          <form method="post" name="login">
            {{csrf_field()}}
            <div class="form-group">

              <div class="input-group">

                <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                 <span class="input-group-addon" id="basic-addon1"><strong>@</strong></span>
              </div>
            </div>
            <div class="form-group">
             <div class="input-group"> 
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-lock"></i></span>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-md btn-block"> Sign in </button>
               </div>
               <div class="form-group">
               <a class="btn btn-link pull-right" href="{{url('forgot/password')}}"> Forgot Password? </a>
               </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>


    @include('layout.footer')


  <script src="{{asset('js/login.js')}}"></script>

@endsection 