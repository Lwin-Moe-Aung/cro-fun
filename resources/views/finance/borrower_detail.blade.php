@extends('layout.master')
@section('container')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
             <div class="form-wrapper">
                <div>

                    <div class="form-header"><h4>Borrower Information</h4></div>

                    <div class="form-body">

                            
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

                                           
                                                <a href="{{asset('uploads/Images/'.$borrowers['data'][0]['photo'])}}" target="_blank">
                                                    <img src="{{asset('uploads/Images/'.$borrowers['data'][0]['photo'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/download.png')}}';" class="img-rounded" alt="Cinque Terre" width="190" height="170">
                                                </a>
                                            

                                        </td>
                                        
                                    </tr>
                                    <tr>
                                      <td><label> Name</label></td>
                                      <td>: {{$borrowers['data'][0]['name']}}</td>
                                      
                                    </tr>
                                    <tr>
                                      <td><label> Email</label></td>
                                      <td>: {{$borrowers['data'][0]['email']}}</td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td><label>Nrc</label></td>
                                      <td>: {{$borrowers['data'][0]['nrc']}}</td>
                                      
                                    </tr>
                                    <tr>
                                      <td><label>Dob</label></td>
                                      <td>: {{$borrowers['data'][0]['dob']}}</td>
                                      
                                    </tr>

                                    <tr>
                                      <td><label>Phone No</label></td>
                                      <td>: {{$borrowers['data'][0]['phone_no']}}</td>
                                      
                                    </tr>
                                    <tr>
                                      <td><label>Address </label></td>
                                      <td>: {{$borrowers['data'][0]['address']}}</td>
                                      
                                    </tr>
                                    <tr>
                                      <td><label>State </label></td>
                                      <td>: {{$borrowers['data'][0]['state']}}</td>
                                      
                                    </tr>
                                    <tr>
                                      <td><label> Township</label></td>
                                      <td>: {{$borrowers['data'][0]['township']}}</td>
                                      
                                    </tr>
                                    
                                        <tr>
                                            <td><label>Point</label></td>
                                            <td>: {{$borrowers['data'][0]['points']}}</td>

                                        </tr>
                                         <tr>
                                            <td><label>Borrower Points</label></td>
                                            <td><form class="form-horizontal" name="lender_account_status" method="post">

                        {{csrf_field()}}
                        <div class="form-group">
                            
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <select name="points" class="form-control">
                                        <option value="a" @if($borrowers['data'][0]['points']=='a') selected @endif>A</option>
                                        <option value="b" @if($borrowers['data'][0]['points']=='b') selected @endif>B</option>
                                        <option value="c" @if($borrowers['data'][0]['points']=='c') selected @endif>C</option>
                                        <option value="d" @if($borrowers['data'][0]['points']=='d') selected @endif>D</option>
                                        <option value="e" @if($borrowers['data'][0]['points']=='e') selected @endif>E</option>

                                    </select>

                                </div>


                            </div>
                        </div>
                          
                         <div class="form-group">
                            <div class=" col-sm-10 points">
                                <button type="submit" name="submit" class="btn btn-primary" >Give Point</button>
                                <a class="btn btn-default" href="{{url('finance/borrowers-listing')}}">Back</a>
                            </div>
                        </div>
                    </form></td>

                                        </tr>

                                    
                                   
                                    
                                   
                                </table>




                         
                    </div>

                    
                </div>
            </div>
        </div>
</div>
    </div>
        @include('layout.footer')
        <script src="{{asset('js/lender_account_verified.js')}}"></script>
@endsection


