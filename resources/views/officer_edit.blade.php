@extends('layout.master')
@section('title','Field Officer Registration')
@section('container')
    <div class="container" style="margin-top: 205px; margin-bottom: 150px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="box-shadow: 1px 1px 1px black,-1px -1px 1px black;">
                    <div class="panel-heading" style="background-color:#222;color:white;"><h4 class="text-center">Field Officer Register</h4></div>

                    <div class="panel-body">

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


                            <form class="form-horizontal" method="post" name="registration">
                               {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" >
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nrc" class="col-sm-2 control-label">NRC:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-id-card-o"></i></span>
                                            <input type="text" class="form-control" name="nrc" id="nrc" placeholder="NRC" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@</span>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dob" class="col-sm-2 control-label">DOB:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="dob" class="form-control" name="dob" placeholder="Select Date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="state" class="col-sm-2 control-label">State:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                            <select class="form-control" name="state" id="state">
                                                <option value="">Select State.......</option>
                                                @for($i=0;$i<count($states['data']);$i++)
                                                    <option value="{{$states['data'][$i]['state']}}">{{$states['data'][$i]['state']}}</option>
                                                @endfor

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="township" class="col-sm-2 control-label">Township:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                            <select class="form-control" name="township" id="township">

                                                <option value="">Select Township.......</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="address" class="col-sm-2 control-label">Address:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Photo:</label>
                                    <div class="col-sm-10">
                                    
                                    @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'photo' ))

                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-sm-2 control-label">Gender:</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="f" checked>Female</label>
                                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="m">Male</label>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-lock"></i></span>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-lock"></i></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary" >Register</button>&nbsp;
                                        &nbsp;<a class="btn btn-default" href="{{url('/')}}">Cancel</a>

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