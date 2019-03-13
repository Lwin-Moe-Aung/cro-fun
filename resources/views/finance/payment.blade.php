@extends('layout.master')
@section('title','Give Loan To Borrower')

@section('container')



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
                @if(!$payment_transaction_no)
                <div class="form-wrapper">
                   <div>
                    <div class="form-header"><h4>Give Loan to Borrower</h4></div>
                       <div class="form-body">
                        <form method="post" name="payment" class="form-horizontal">
                            {{csrf_field()}}


                            <div class="form-group">
                                <div class="col-sm-12">
                                <div class="input-group">
                                <input type="text" id="payment_date" class="form-control" name="payment_date" placeholder="Select Date">
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
                                <div class="col-sm-12">
                                <label for="amount">Amount:</label>
                                  <div class="input-group">
                                    <p>{{number_format($total_funded,2)}} MMK</p>
                                    <input type="hidden" class="form-control" id="amount" name="amount" value="{{$total_funded}}">
                                    <input type="hidden" class="form-control" id="project_id" name="project_id"  value="{{$project['data'][0]['id']}}">
                                    <input type="hidden" class="form-control" id="loan_value" name="loan_value"  value="{{$project['data'][0]['loan_value']}}">
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Give Loan</button>
                                    <a class="btn btn-default"  href="

                                    {{url('projects/info/'.$project['data'][0]['id'])}}

                                            ">Back</a>
                                </div>
                            </div>

                         </form>


                </div>
                   </div>
                </div>
                @else

                                <div class="alert alert-info alert-dismissable">
                                    <strong>Loan is already given to borrower with Transaction ID: {{$payment_transaction_no}}</strong>
                                </div>
                               <div class="pull-right">
                               <a class="btn btn-default"  href="{{url('projects/info/'.$project['data'][0]['id'])}}">Back</a>
                               </div>

                @endif
            </div>
        </div>

        </div>

    </div>



        @include('project_detail_modal')
        @include('layout.footer')
        @include('layout.form_script')


        <script src="{{asset('js/payment.js')}}"></script>
    <script>
        $('#borrower').click(function(e) {
            e.preventDefault();

            $('#myModal').modal('show');



        });
    </script>
    

@endsection
