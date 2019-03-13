

     @extends('layout.master')
        @section('container')
     <div class="container">

            <div class="row">
                @if(session('current')['role']=="lender")
                <div class="col-md-4">
                    <div class="vertical-menu" style="width:100%;">
                        <a href="{{url('lender/profile')}}" >Dashboard</a>
                        <a href="{{url('profile')}}">Profile</a>
                        <a href="{{url('lender/my-investments/'.session('current')['id'])}}">My Investments</a>
                        <a href="{{url('/logout')}}">Sign Out</a>
                    </div>
                </div>
                @endif
                <div
                        @if(session('current')['role']=="lender")
                        class="col-md-8"
                         @else
                         class="col-md-8 col-md-offset-2"
                        @endif


                 >
                    <div class="form-wrapper">

                        <div class="form-header"><h4 class="text-center">User Information</h4></div>
                        @if(session('change'))
                            <div class="alert alert-success alert-dismissable fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong></strong>
                            </div>
                        @endif


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

                        <div class="form-body">

                            <table class="table table-striped" style="font-size:14px;">
                                <tr>
                                    <td colspan="2" class="image-detail">
                                        
                                            <a href="{{asset('uploads/Images/'.session('current')['photo'])}}" target="_blank">
                                                <img src="{{asset('uploads/Images/'.session('current')['photo'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/download.png')}}';" class="img-rounded" alt="Cinque Terre" width="190" height="170"> 
                                            </a>
                                        

                                      </td>
                                      
                                      
                                  </tr>
                                  <tr>
                                      <td><label>Name</label></td>
                                      <td>: {{session('current')['name']}}</td>
                                  </tr>
                                  <tr>
                                      <td><label>NRC</label></td>
                                      <td>: {{session('current')['nrc']}}</td>
                                  </tr>
                                  <tr>
                                      <td><label>Dob</label></td>
                                      <td>: {{session('current')['dob']}}</td>
                                  </tr>
                                   <tr>
                                       <td><label>Email</label></td>
                                       <td>: {{session('current')['email']}}</td>
                                   </tr>
                                    <tr>
                                        <td><label>Phone No</label></td>
                                        <td>: {{session('current')['phone_no']}}</td>
                                    </tr>
                                      <tr>
                                          <td><label>State</label></td>
                                          <td>: {{session('current')['state']}}</td>
                                      </tr>
                                      <tr>
                                          <td><label>Township</label></td>
                                          <td>: {{session('current')['township']}}</td>
                                      </tr>
                                      <tr>
                                          <td><label>Address</label></td>
                                          <td>: {{session('current')['address']}}</td>
                                      </tr>
                                      <tr>
                                          <td colspan="2" style="text-align: center;"><a href="{{url('edit/profile')}}">Edit Profile</a> |
                                          <a href="{{url('change/password')}}">Change Password</a> |
                                          <a href="{{url('/')}}">Back</a></td>
                                          
                                      </tr>
                                  </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
   
    @include('layout.footer')
     <script src="{{ asset('js/left_sidebar.js') }}"></script>
  
        @endsection 


