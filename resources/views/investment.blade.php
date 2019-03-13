@extends('layout.master')
@section('title','Bank Transfer')

@section('container')
    <div class="container" style="margin-top: 205px; margin-bottom: 150px;">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    @if(!empty($status))
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{$status}}</strong>
                        </div>
                    @endif
                <div class="panel panel-default" style="box-shadow: 1px 1px 1px black,-1px -1px 1px black;">

                    <div class="panel-heading" style="background-color:#222;color:white;"><h4 class="text-center">Bank Transfer Instruction</h4></div>

                    <div class="panel-body">

                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                           labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                           laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                           voluptate velitesse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                           non proident,sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td><label>Amount</label></td>
                                    <td>: {{number_format(session('investment')[0]['amount'],2)}} MMK</td>
                                </tr>
                                <tr>
                                    <td><label>Amount To Transfer</label></td>
                                    <td>:{{number_format(session('investment')[0]['display_amount'],2)}} MMK</td>
                                </tr>
                                @if(empty($investment) && empty($status))
                                <tr>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="{{url('payment/bank-transfer-successful')}}">Confirm</a>

                                            <a class="btn btn-default" href="{{url('/')}}">Cancel</a>

                                    </td>
                                </tr>
                                    @endif

                                @if(!empty($status))
                                <tr>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-default pull-right" href="{{url('/')}}">Cancel</a>
                                    </td>
                                </tr>
                                    @endif

                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    @include('layout.footer')

@endsection

