

@extends('layout.master')
@section('container')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper" >

                    <div class="form-header">
                      <h4 class="text-center">Lender Information</h4></div>

                    <div class="form-body points">

                            <div class="table-responsive">
                                <table class="table table-striped" style="font-size:14px;">

                                    @if(session('success'))
                                    <tr>
                                        <div class="alert alert-success alert-dismissable fade in">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>{{session('success')}}</strong>
                                        </div>
                                    </tr>
                                     @endif

                                    <tr>
                                        <td colspan="2" class="image-detail">
                                            
                                                <a href="{{asset('uploads/Images/'.$lender['data'][0]['photo'])}}" target="_blank">
                                                    <img src="{{asset('uploads/Images/'.$lender['data'][0]['photo'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/download.png')}}';" class="img-rounded" alt="Cinque Terre" width="190" height="170">
                                                </a>
                                         
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                      <td><label>Name</label></td>
                                      <td>: {{$lender['data'][0]['name']}}</td>
                                    </tr>
                                    <tr>
                                      <td><label>Email</label></td>
                                      <td>: {{$lender['data'][0]['email']}}</td>
                                    </tr>
                                    
                                    <tr>
                                      <td><label>NRC</label></td>
                                      <td>: {{$lender['data'][0]['nrc']}}</td>
                                    </tr>
                                    <tr>
                                      <td><label>Dob</label></td>
                                      <td>: {{$lender['data'][0]['dob']}}</td>
                                    </tr>
                                    <tr>
                                      <td><label>Phone No</label></td>
                                      <td>: {{$lender['data'][0]['phone_no']}}</td>
                                    </tr>
                                    <tr>
                                      <td><label>Address</label></td>
                                      <td>: {{$lender['data'][0]['address']}}</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                      <td><label>Township</label></td>
                                      <td>: {{$lender['data'][0]['township']}}</td>
                                    </tr>
                                    <tr>
                                      <td><label>State</label></td>
                                      <td>: {{$lender['data'][0]['state']}}</td>
                                    </tr>
                                    

                                </table>

                            </div>
                        <br />
                        <form class="form-horizontal" name="lender_account_status" method="post">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Verified Account Status:</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <select name="verified" class="form-control">
                                            <option value="1" @if($lender['data'][0]['verified']==1) selected @endif>Verified</option>
                                            <option value="0" @if($lender['data'][0]['verified']==0) selected @endif>Unverified</option>
                                        </select>

                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="submit" class="btn btn-primary" >Update Status</button>
                                    <a class="btn btn-default" href="{{url('finance/lenders-listing')}}">Back</a>
                                </div>
                            </div>
                         </form>
                    
                </div>
            </div>
        </div>
        </div>

    </div>
    
        @include('layout.footer')
        <script src="{{asset('js/lender_account_verified.js')}}"></script>
@endsection


