

@extends('layout.master')
@section('container')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper">

                    <div class="form-header"><h4>Field Officer Information</h4></div>

                    <div class="form-body">


                                <table class="table table-striped" style="font-size:14px;">

                                    <tr>
                                        <td colspan="2" class="image-detail">
                                            

                                                <a href="{{asset('uploads/Images/'.$officers['data'][0]['photo'])}}" target="_blank">
                                                    <img src="{{asset('uploads/Images/'.$officers['data'][0]['photo'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/download.png')}}';" class="img-rounded" alt="Cinque Terre" width="190" height="170">
                                                </a>


                                        </td>

                                    </tr>
                                    <tr>
                                      <td><label> Name</label></td>
                                      <td>: {{$officers['data'][0]['name']}}</td>
                                      
                                    </tr>
                                    <tr>
                                      <td><label> Email</label></td>
                                      <td>: {{$officers['data'][0]['email']}}</td>
                                      
                                    </tr>
                                   
                                    <tr>
                                      <td><label>NRC</label></td>
                                      <td>: {{$officers['data'][0]['nrc']}}</td>
                                      
                                    </tr>

                                    <tr>
                                      <td><label>DOB</label></td>
                                      <td>: {{$officers['data'][0]['dob']}}</td>
                                      
                                    </tr>

                                    <tr>
                                      <td><label>Phone No </label></td>
                                      <td>: {{$officers['data'][0]['phone_no']}}</td>
                                      
                                    </tr>

                                    <tr>
                                      <td><label> Address</label></td>
                                      <td>: {{$officers['data'][0]['address']}}</td>
                                      
                                    </tr>

                                    <tr>
                                      <td><label> State</label></td>
                                      <td>: {{$officers['data'][0]['state']}}</td>
                                      
                                    </tr>

                                    <tr>
                                      <td><label>Township </label></td>
                                      <td>: {{$officers['data'][0]['township']}}</td>
                                      
                                    </tr>

                                    
                                   
                                </table>
                                <div class="form-group">
                                  <div class="col-sm-offset-5 col-sm-7">
                                     <a class="btn btn-default" href="{{url('finance/field-officers-listing')}}">Back</a>
                                      
                                  </div>
                                </div>

                            </div>
                        <br />
                </div>
            </div>
        </div>

    </div>
        @include('layout.footer')
        <script src="{{asset('js/lender_account_verified.js')}}"></script>
@endsection


