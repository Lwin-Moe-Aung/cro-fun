@extends('layout.master')
    @section('container')
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper">
                    <div class="form-header">
                        <h4 class="text-center">Edit Profile</h4>
                    </div>

                    <div class="form-body">

                        <form class="form-horizontal" method="post" action="{{url('edit/profile',session('current')['id'])}}" name="registration" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" id="name" value="{{session('current')['name']}}">

                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nrc" class="col-sm-2 control-label">Nrc:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="nrc" id="nrc" value="{{session('current')['nrc']}}">

                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="dob" class="col-sm-2 control-label">DOB:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                         <input type="text" id="dob" class="form-control"  name="dob" value="{{session('current')['dob']}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Role:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="role" id="role" value="{{session('current')['role']}}" readonly="true">

                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-sm-2 control-label">Gender:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        @if(session('current')['gender'] == 'f')
                                            <label class="radio-inline"><input type="radio" name="gender" id="gender" value="f" checked>Female</label>
                                            <label class="radio-inline"><input type="radio" name="gender" id="gender" value="m">Male</label>
                                        @else
                                            <label class="radio-inline"><input type="radio" name="gender" id="gender" value="f" >Female</label>
                                            <label class="radio-inline"><input type="radio" name="gender" id="gender" value="m" checked>Male</label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-sm-2 control-label">Photo:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone2-Modal">Browse</button>
                                        </div>

                                         @include('fileupload.dropzone', array('photo' => session('current')['photo'],'modal_id' => 'real-dropzone2-Modal', 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'photo' ,'preview_image' => 'real-dropzone2-preview','image'=>'Images','pdf'=>''))
                                     </div>
                                </div>                                                       
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-sm-2 control-label">Attachment:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone4-Modal">Browse</button>
                                        </div>

                                         @include('fileupload.dropzone', array('photo' => session('current')['attachment'],'modal_id' => 'real-dropzone4-Modal', 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ,'preview_image' => 'real-dropzone4-preview','image'=>'','pdf'=>'Pdf'))
                                     </div>
                                </div>                                                       
                            </div>                      

                            <div class="form-group">
                                    <label for="state" class="col-sm-2 control-label">State:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            
                                           
                                            <select class="form-control" name="state" id="state">
                                               
                                                @for($i=0;$i<count($states['data']);$i++)
                                                    <option value="{{$states['data'][$i]['state']}}"
                                                    @if(session('current')['state']==$states['data'][$i]['state'])
                                                    selected="selected"
                                                    @endif >
                                                    
                                                  {{$states['data'][$i]['state']}}

                                                  </option>
                                                @endfor

                                            </select>
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="township" class="col-sm-2 control-label">Township:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        
                                        <select class="form-control" name="township" id="township">


                                            @for($i=0;$i<count($township['data']);$i++)
                                                
                    <option value="{{$township['data'][$i]['township']}}"
                                                @if(session('current')['township']==$township['data'][$i]['township'])
                                                selected="selected"
                                                @endif >
                    
                                                
                                              {{$township['data'][$i]['township']}}

                                              
                    </option>
                    
                                            @endfor


                                        </select>
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Phone no:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{session('current')['phone_no']}}">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Address:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="address" id="address" value="{{session('current')['address']}}">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-primary" >Update</button>&nbsp;&nbsp;
                                    <a class="btn btn-default" href="{{url('profile')}}">Back</a>&nbsp;&nbsp;

                                </div>
                            </div>

                        </form>
                    </div>

  </div>
</div>
</div>
</div>
  @include('layout.footer')
    @include('layout.form_script')
    <script src="{{asset('js/form.js')}}"></script>

@endsection
