@extends('layout.master')
@section('title','Investment To Borrower')

@section('container')

    <style type="text/css">
        .nav-tabs>li> a {
            color: black !important; 
        }
    </style>

    <div class="container" style="margin-top: 160px;">
        @if(session('status'))
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('status')}}</strong>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('success')}}</strong>
            </div>
        @endif
        <div style="margin-bottom:10px;text-align:right;">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#projectModal">View Project Details</button>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="form-wrapper">
             @include('project_loan_return')
            </div>
        </div>
        </div>
            @if(!$profit_transaction_no)
            <div class="borrower_container">
                <div class="form-wrapper">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#loan_from_borrower">Loan Return From Borrower</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#pft_distribution">Profit Distribution</a>
                    </li>
                </ul>

                <div class="tab-content">
                    @if(  $remaining_value != 0)
                    <div id="loan_from_borrower" class="tab-pane fade in active" style="padding-top: 25px;">
                        
                        <div class="form-body">
                            <form method="post" name="loan_return" class="form-horizontal" action="{{url('finance/loan-return/pay')}}">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" readonly="true" class="form-control" id="loan_value" name="loan_value" value="Revenue {{$revenue}}">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" readonly="true" class="form-control" id="remain_loan_value" name="remain_loan_value"  value="Remaining Value {{  $remaining_value}}">

                                            <input type="hidden" class="form-control" id="hd_remain_loan_value" name="hd_remain_loan_value"  value="{{$remaining_value}}">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" id="payment_date" class="form-control" name="payment_date" placeholder="Select Payment Date">
                                        <input type="hidden" class="form-control" id="project_id" name="project_id"  value="{{$project['data'][0]['id']}}">
                                        <input type="hidden" class="form-control" id="percent" name="percent"  value="{{$project['data'][0]['profit_sharing_estimation']}}">
                                        <!--input type="hidden" class="form-control" id="return_estimation" name="return_estimation"  value="{{$project['data'][0]['return_estimation_approved']}}"-->
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="revenue" name="amount" placeholder="Enter amount">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="5" cols="154" id="remark" name="remark"></textarea>
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-commenting-o"></i></span>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">

                                     @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ))

                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" id="">Receive Payment</button>

                                    <a class="btn btn-default" href="{{url('projects/info/'.$project['data'][0]['id'])}}" >Back</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    @else
                    <div id="loan_from_borrower" class="tab-pane fade in active">
                        <div class="container">
                            <h1>Loan Return From Borrower is successfully completed</h1>
                        </div>
                    </div>
                    @endif
                    <div id="pft_distribution" class="tab-pane fade" style="padding-top: 25px;">
                        @if( $project['data'][0]['loan_value'] <= $loan_amount )
                            <div class="form-body">
                                <form method="post" name="profit" class="form-horizontal" action="{{url('finance/profit-distribution')}}">
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" readonly="true" class="form-control" id="revenue" name="revenue"  value="{{$loan_amount}}">
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" id="profit_generated_date" class="form-control" name="profit_generated_date" placeholder="Select Profit Generated Date">
                                                <input type="hidden" class="form-control" id="project_id" name="project_id"  value="{{$project['data'][0]['id']}}">
                                                <input type="hidden" class="form-control" id="loan_value" name="loan_value"  value="{{$project['data'][0]['loan_value']}}">
                                                <input type="hidden" class="form-control" id="percent" name="percent"  value="{{$project['data'][0]['profit_sharing_estimation']}}">
                                            <!--input type="hidden" class="form-control" id="return_estimation" name="return_estimation"  value="{{$project['data'][0]['return_estimation_approved']}}"-->
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <textarea class="form-control" rows="5" cols="154" id="remark" name="remark"></textarea>
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-commenting-o"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">

                                            @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ))

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary">Profit Distribution</button>

                                            <a class="btn btn-default" href="{{url('projects/info/'.$project['data'][0]['id'])}}" >Back</a>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        @else
                            <div class="form-body">
                                <div class="container">
                                    <h1>There is no profit to distribute.</h1>
                                </div>
                            </div>
                        @endif
                    </div>  
                </div>
                </div>
            </div>
              
            @else
                <div class="alert alert-info alert-dismissable">
                    <strong>Loan payment is already received from borrower with Transaction ID: {{$profit_transaction_no}}</strong>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default"  href="{{url('projects/info/'.$project['data'][0]['id'])}}">Back</a>
                </div>
            @endif
            </div>







    @include('project_detail_modal')
        @include('layout.footer')
        @include('layout.form_script')
        <script src="{{asset('js/profit.js')}}"></script>
        <script src="{{asset('js/loan_return.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script>
            var id = {{$id}};
        </script>
        <script src="{{asset('js/loan_return_grid.js')}}"></script>

@endsection
