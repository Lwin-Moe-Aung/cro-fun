@extends('layout.master')
@section('title','Borrower Registration')
@section('container')
<div class="container">

    <div class="row">
    <div class="col-md-2 col-md-offset-2 text-center hidden-xs hidden-sm">
            @include('form-img')
        </div>

        <div class="col-md-6">
        <div class="form-wrapper">
            <div>
                <div class="form-header" ><h4>{{isset($borrowers)? 'Borrower Update (by Finance)':"Let's register Borrower!"}}</h4></div>

                <div class="form-body">
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

                    <form class="form-horizontal" method="post" id="registration"  name="registration" @if(isset($borrowers)) action="{{url('borrowers/edit',$borrowers['data'][0]['id'])}}" @else action="{{url('borrower/form')}}" @endif >
                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"> 
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{isset($borrowers)? $borrowers['data'][0]['name']:''}}" >
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="nrc" id="nrc" placeholder="NRC" value="{{isset($borrowers)? $borrowers['data'][0]['nrc']:''}}">
                                   <span class="input-group-addon" id="basic-addon1"><i class="fa fa-id-card-o"></i></span>
                                </div>
                            </div>
                        </div>
                        @if(!isset($borrowers))
                          <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                 <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                 <span class="input-group-addon" id="basic-addon1">@</span>
                                </div>
                            </div>
                          </div>
                        @endif
                        

                        <div class="form-group">
                           <div class="col-sm-12">
                              <div class="input-group">
                                <input type="text" id="dob" class="form-control" name="dob" placeholder="Date of Birth" value="{{isset($borrowers)? $borrowers['data'][0]['dob']:''}}">
                                 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                              </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                   
                                    <select class="form-control" name="state" id="state">
                                    <option value="">Select State.......</option>
                                    @for($i=0;$i<count($states['data']);$i++)
                                        <option value="{{$states['data'][$i]['state']}}"
                                        @if(isset($borrowers)) 
                                            @if($borrowers['data'][0]['state']==$states['data'][$i]['state'])
                                                selected="selected"
                                            @endif
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
                           <div class="col-sm-12">
                              <div class="input-group">
                                   <select class="form-control" name="township" id="township">
                                      @if(isset($borrowers))
                                          @for($i=0;$i<count($township['data']);$i++)
                                          
                                            <option value="{{$township['data'][$i]['township']}}"
                                              @if($borrowers['data'][0]['township']==$township['data'][$i]['township'])
                                                selected="selected"
                                              @endif >
                                              {{$township['data'][$i]['township']}}
                                            </option>
                                          @endfor
                                      @else
                                          <option value="">Select Township.......</option>
                                      @endif
                                  </select>
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone no" value="{{isset($borrowers)? $borrowers['data'][0]['phone_no']:''}}">
                                     <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                         <div class="col-sm-12">
                            <div class="input-group">
                              <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{isset($borrowers)? $borrowers['data'][0]['address']:''}}">
                               <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-12">

                                      @if(isset($borrowers))
                                  <div class="input-group">
                                      <div>
                                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone2-Modal">Browse</button>
                                      </div>
                                  </div>
                                          @include('fileupload.dropzone', array('photo' => $borrowers['data'][0]['photo'],'modal_id' => 'real-dropzone2-Modal', 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'photo' ,'preview_image' => 'real-dropzone2-preview','image'=>'Images','pdf'=>''))
                                      @else
                                          @include('fileupload.dropzoneImg', array('modal_id' => 'real-dropzone2-Modal', 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'photo' ,'preview_image' => 'real-dropzone2-preview'))

                                      @endif

                          </div>                                                       
                        </div>

                         <div class="form-group">
                           <div class="col-sm-12">

                            @if(isset($borrowers))
                                <div class="input-group">
                                    <div>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone4-Modal">Browse</button>
                                    </div>
                                        @include('fileupload.dropzone', array('photo' => $borrowers['data'][0]['attachment'],'modal_id' => 'real-dropzone4-Modal', 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ,'preview_image' => 'real-dropzone4-preview','image'=>'','pdf'=>'Pdf'))


                                </div>
                                    @else
                                    @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ))
                                    @endif

                            </div>                                                       
                        </div>

                        <div class="form-group">
                                 <div class="col-sm-12">
                                    <div class="input-group">
                                        @if(isset($borrowers))
                                            @if($borrowers['data'][0]['gender'] == 'm')
                                               <label class="radio-inline"><input type="radio" name="gender" id="gender" value="f" >Female</label>
                                                <label class="radio-inline"><input type="radio" name="gender" id="gender" value="m" checked>Male</label>
                                            @else
                                                <label class="radio-inline"><input type="radio" name="gender" id="gender" value="f" checked>Female</label>
                                                <label class="radio-inline"><input type="radio" name="gender" id="gender" value="m">Male</label>
                                            @endif
                                        @else
                                                <label class="radio-inline"><input type="radio" name="gender" id="gender" value="f" checked>Female</label>
                                                <label class="radio-inline"><input type="radio" name="gender" id="gender" value="m">Male</label>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        
                        @if(!isset($borrowers))
                          <div class="form-group">
                            <div class="col-sm-12">
                              <div class="input-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" >
                                 <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-lock"></i></span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                 <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-lock"></i></span>
                              </div>
                            </div>
                          </div>
                        @endif

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary" >{{isset($borrowers)? 'Update':'Register'}}</button>
                            <a class="btn btn-default"
                                @if(isset($borrowers)) 
                                    href="{{url('finance/borrowers-listing')}}"
                                @else 
                                    href="{{url('/')}}" 
                                @endif >
                                    Cancel
                              </a>
                          </div>
                        </div>
                    </form>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>

      @include('layout.footer')
      @include('layout.form_script')
      <script src="{{asset('js/form.js')}}"></script>
   


<!--  <footer> -->

@endsection
