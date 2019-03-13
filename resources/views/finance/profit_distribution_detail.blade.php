@extends('layout.master')
@section('title','Project Details')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('status')}}</strong>
                    </div>
                @else

                    @if($profit_distribution['data'][0]['status']=="delivered")
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Profit is already delivered to the lender</strong>
                        </div>
                    @endif
                @endif

                <div class="form-wrapper" >

                    <div class="form-header">
                        <h4>Profit Distribution Details</h4>
                    </div>

                    <div class="form-body" style="">

                        <div class="table-responsive">
                            <table class="table table-striped" style="font-size:14px;">
                                <tr>
                                    <td><label>Transaction ID</label></td>
                                    <td>: {{$profit_distribution['data'][0]['transaction_no']}}</td>
                                </tr>
                                <tr>
                                    <td><label class="">Project Title</label></td>
                                    <td>: {{$profit_distribution['data'][0]['project_title']}}</td>
                                </tr>
                                <tr>
                                    <td><label>Lender ID</label></td>
                                    <td>: {{$profit_distribution['data'][0]['code_no']}}</td>
                                </tr>
                                <tr>
                                    <td><label>Lender Name</label></td>
                                    <td>: {{$profit_distribution['data'][0]['name']}}</td>
                                </tr>
                                <tr>
                                    <td><label>Investment</label></td>
                                    <td>: {{number_format($profit_distribution['data'][0]['investment'])}} MMK</td>
                                </tr>
                                <tr>
                                    <td><label>Profit</label></td>
                                    <td>: {{number_format($profit_distribution['data'][0]['profit'])}} MMK</td>
                                </tr>
                                <tr>
                                    <td><label>Revenue</label></td>
                                    <td>: {{number_format($profit_distribution['data'][0]['total_revenue'])}} MMK</td>
                                </tr>
                                <tr>
                                    <td><label>Profit Distribution Percentage</label></td>
                                    <td>: {{$profit_distribution['data'][0]['profit_distribution_percentage']}} %</td>
                                </tr>

                            </table>
                        </div>
                        @if($profit_distribution['data'][0]['status']=="delivered")
                        <a class="btn btn-default pull-right" href="{{url('projects/info/'.session('project_id')."#profit_grid")}}">Back</a>
                            @endif
                    </div>
                </div>
            </div>

        </div>

    </div>

    @if($profit_distribution['data'][0]['status']=="pending")
    <div class="container" style="margin-top:-100px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="form-wrapper">

                 <div class="form-header">
                     <h4 class="text-center">Profit Deliver To Lender</h4>
                 </div>
                    <div class="form-body">
                        <form method="post" name="profit_distribution" class="form-horizontal">
                            {{csrf_field()}}

                            <div class="form-group">
                                <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" id="profit_paid_date" class="form-control" name="profit_paid_date" placeholder="Select Date">
                                    <input type="hidden" class="form-control" id="profit_distribution_id" name="profit_distribution_id"  value="{{$profit_distribution['data'][0]['id']}}">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Deliver</button>
                                <a class="btn btn-default" href="{{url('projects/info/'.session('project_id')."#profit_grid")}}">Cancel</a>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>

    @endif

        @include('layout.footer')
        @include('layout.form_script')
        <script src="{{asset('js/profit_distribution.js')}}"></script>
@endsection
