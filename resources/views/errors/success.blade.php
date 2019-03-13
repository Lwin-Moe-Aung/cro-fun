@extends('layout.master')
@section('title','Bank Transfer')

@section('container')
    <div class="container" style="margin-bottom:220px;">
        <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <br><br><br><br><br><br><br><br>
        <div class="panel">
            @if(!empty($message))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p style="font-weight:bold;">Success!</p>
                    <strong class="text-center">{{$message}}</strong>
                    <hr>
                    @if(session('current')['role']=="lender")
                            <a class="btn btn-primary " href="{{url('/')}}">OK</a>
                    @else
                        <a class="btn btn-primary" href="{{url('finance/projects-listing')}}">OK</a>
                    @endif


                </div>
            @endif
        </div>
      </div>
        </div>
    </div>
    
        @include('layout.footer')
  
@endsection
