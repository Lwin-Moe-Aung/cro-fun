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
      @endif
        @if(session('error'))
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{session('error')}}</strong>
          </div>
        @endif
        @if($payment_transaction_no & $profit_transaction_no)
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Investment status cannot be modified because the project is not available for funding.</strong>
          </div>
        @endif
        <div class="form-wrapper">

          <div class="form-header">
            <h4>Investment Details</h4>
          </div>

          <div class="form-body">


              <table class="table table-striped" style="font-size:14px;">
                <tr>
                  <td><label>Transaction ID</label></td>
                  <td>: {{$investment['data'][0]['transaction_no']}}</td>
                </tr>
                <tr>
                  <td><label class="">Project Title</label></td>
                  <td>: {{$investment['data'][0]['project_title']}}</td>
                </tr>
                <tr>
                  <td><label>Lender ID</label></td>
                  <td>: {{$investment['data'][0]['code_no']}}</td>
                </tr>
                <tr>
                  <td><label>Lender Name</label></td>
                  <td>: {{$investment['data'][0]['name']}}</td>
                </tr>
                <tr>
                  <td><label>Amount</label></td>
                  <td>: {{number_format($investment['data'][0]['amount'],2)}} MMK</td>
                </tr>
                <tr>
                  <td><label>Display Amount</label></td>
                  <td>: {{number_format($investment['data'][0]['display_amount'],2)}} MMK</td>
                </tr>
                <tr>
                  <td><label>Investment Date</label></td>
                  <td>: {{$investment['data'][0]['investment_date']}}</td>
                </tr>
                
                <tr>
                  <td><label>Investment Type</label></td>
                  <td>: {{$investment['data'][0]['investment_type']}}</td>
                </tr>
                <tr>
                  <td><label>Loan Value</label></td>
                  <td>: {{number_format($investment['data'][0]['loan_value'],2)}} MMK</td>
                </tr>
              
                <tr><td></td><td></td></tr>
              </table>
              @if($payment_transaction_no & $profit_transaction_no)
              <a class="btn btn-default pull-right" href="{{url('projects/info/'.$investment['data'][0]['project_id'])}}">Back</a>
              @endif
            </div>

          @if(!$payment_transaction_no & !$profit_transaction_no)
            <form class="form-inline text-center" method="post" action="{{url('investment/update')}}">
                {{csrf_field()}}  

              <label for="collateral_evidence" class="control-label">&nbsp;&nbsp;Investment Status:</label>

              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <select name="status" class="form-control">
                  
                  <option value="approved"
                                             @if($investment['data'][0]['status']=='approved')
                                             selected @endif
                                     >Approved</option>
                  <option value="pending"
                                             @if($investment['data'][0]['status']=='pending')
                                             selected @endif
                                     >Pending</option>
                  <option value="rejected"
                                             @if($investment['data'][0]['status']=='rejected')
                                             selected @endif
                                     >Rejected</option>
                  <option value="refunded"
                                             @if($investment['data'][0]['status']=='refunded')
                                             selected @endif
                                     >Refunded</option>
               
                </select>

              </div>
              
              <input type="hidden" class="form-control" name="id" value="{{$investment['data'][0]['id']}}">

              <input type="hidden" class="form-control" name="code_no" value="{{$investment['data'][0]['project_code']}}">
              <input type="hidden" class="form-control" name="project_id" value="{{$investment['data'][0]['project_id']}}">

              <input type="hidden" class="form-control" name="loan_value" value="{{$investment['data'][0]['loan_value']}}">

              <input type="hidden" class="form-control" name="amount" value="{{$investment['data'][0]['amount']}}">
              <input type="hidden" class="form-control" name="email" value="{{$investment['data'][0]['email']}}">
              <input type="hidden" class="form-control" name="project_title" value="{{$investment['data'][0]['project_title']}}">
              <input type="hidden" class="form-control" name="name" value="{{$investment['data'][0]['name']}}">
              <input type="hidden" class="form-control" name="transaction_no" value="{{$investment['data'][0]['transaction_no']}}">
              <input type="hidden" class="form-control" name="investment_date" value="{{$investment['data'][0]['investment_date']}}">

              <button type="submit" name="submit" class="btn btn-primary" >Update</button>
              <a class="btn btn-default" href="{{url('projects/info/'.$investment['data'][0]['project_id']."#investment_grid")}}">Cancel</a>
            </form>
            @endif

          </div>
        </div>

  </div>
</div>


 @include('layout.footer')


@endsection
