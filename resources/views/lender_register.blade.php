    @extends('layout.master')
    @section('title','Lender Registration')
    @section('container')
        <div class="container">
            @if(!isset($lenders))
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p class="alert alert-info" style="font-family:Myanmar3;">
                        KYC သဘောတရားအရ ကျွန်တော်တို့အနေဖြင့် ကျွန်တော်တို့နှင့် လက်တွဲလုပ်ကိုင်လိုသောရင်းနှီးမြှပ်နှံသူများ၏ ပြည့်စုံမှန်ကန်သောသတင်းအချက်အလက်များကိုသိရှိရန်လိုအပ်ပါသည်။ ကျေးဇူးပြု၍ မိတ်ဆွေ၏ လက်ရှိရိုက်ကူးထားသောဓါတ်ပုံနှင့် မိတ်ဆွေ၏ နိုင်ငံသားစိစစ်ရေးကဒ်ပြားပုံကိုသာထည့်သွင်းပေးရန် မေတ္တာရပ်ခံပါသည်။ မိတ်ဆွေ၏ လျောက်ထားမှုအားစိစစ်လက်ခံပြီးမှသာCrowdeနှင် လက်တွဲ၍ ရင်းနှီးမြှပ်နှံမှုများစတင်လုပ်ကိုင်နိုင်မည်ဖြစ်ကြောင်းအသိပေးအပ်ပါသည်။
                    </p>
                </div>
            </div>
            @endif
        <div class="row">
            <div class="col-md-2 col-md-offset-2 text-center hidden-xs hidden-sm">
                @include('form-img')
            </div>

            
            <div class="col-md-6">
            <div class="form-wrapper">
                <div>
                    <div class="form-header"><h4 style="font-family: Myanmar3;">{{isset($lenders)? 'Lender Update (by Finance)':"ရင်းနှီးမြှပ်နှံသူအကောင့်သစ်ဖွင့်ရန"}}</h4></div>

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


                        <form class="form-horizontal" method="post"  name="registration" @if(isset($lenders)) action="{{url('lenders/edit',$lenders['data'][0]['id'])}}" @else action="{{url('lender/form')}}" @endif >
                            {{csrf_field()}}



                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="name" id="name"  value="{{isset($lenders)? $lenders['data'][0]['name']:''}}" >

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="nrc" class="col-sm-2 col-form-label">NRC:</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nrc" id="nrc"  value="{{isset($lenders)? $lenders['data'][0]['nrc']:''}}" >
                                    </div>
                                </div>
                                @if(!isset($lenders))
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" id="email" >
                                    </div>
                                </div>
                                @endif


                            <div class="form-group row">
                                <label for="dob" class="col-sm-2 col-form-label">DOB:</label>
                               <div class="col-sm-10">
                                         <input type="text" id="dob" class="form-control"  name="dob"  value="{{isset($lenders)? $lenders['data'][0]['dob']:''}}">
                                </div>
                            </div>

                           <div class="form-group row">
                               <label for="state" class="col-sm-2 col-form-label">State:</label>
                               <div class="col-sm-10">

                                       <select class="form-control" name="state" id="state">
                                        <option value="">Select State.......</option>
                                        @for($i=0;$i<count($states['data']);$i++)
                                            <option value="{{$states['data'][$i]['state']}}"
                                            @if(isset($lenders)) 
                                                @if($lenders['data'][0]['state']==$states['data'][$i]['state'])
                                                    selected="selected"
                                                @endif
                                             @endif >
                                                {{$states['data'][$i]['state']}}
                                            </option>
                                        @endfor

                                        </select>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="township" class="col-sm-2 col-form-label">Township:</label>
                                <div class="col-sm-10">
                                           <select class="form-control" name="township" id="township">
                                                @if(isset($lenders))
                                                     @for($i=0;$i<count($township['data']);$i++)
                                                    <option value="{{$township['data'][$i]['township']}}"
                                                                @if($lenders['data'][0]['township']==$township['data'][$i]['township'])
                                                                selected="selected"
                                                                @endif >
                                                              {{$township['data'][$i]['township']}}
                                                    </option>
                                                    @endfor
                                                @else
                                                    <option value="">Select Township.......</option>
                                                @endif
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_no" class="col-sm-2 col-form-label">Phone no:</label>
                               <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone_no" id="phone_no"  value="{{isset($lenders)? $lenders['data'][0]['phone_no']:''}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address:</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="address"  value="{{isset($lenders)? $lenders['data'][0]['address']:''}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Photo:</label>
                                <div class="col-sm-10">

                                    @if(isset($lenders))

                                          <div>
                                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone2-Modal">Browse</button>
                                          </div>

                                              @include('fileupload.dropzone', array('photo' => $lenders['data'][0]['photo'],'modal_id' => 'real-dropzone2-Modal', 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'photo' ,'preview_image' => 'real-dropzone2-preview','image'=>'Images','pdf'=>''))
                                          @else
                                              @include('fileupload.dropzoneImg', array('modal_id' => 'real-dropzone2-Modal', 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'photo' ,'preview_image' => 'real-dropzone2-preview'))

                                          @endif

                              </div>                                                       
                            </div>

                            <div class="form-group row">
                                <label for="attachment" class="col-sm-2 col-form-label">Attachment:</label>
                                <div class="col-sm-10">
                                @if(isset($lenders))
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone4-Modal">Browse</button>
                                        </div>
                                            @include('fileupload.dropzone', array('photo' => $lenders['data'][0]['attachment'],'modal_id' => 'real-dropzone4-Modal', 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ,'preview_image' => 'real-dropzone4-preview','image'=>'','pdf'=>'Pdf'))

                                        @else
                                        @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ))
                                        @endif

                                </div>                                                       
                            </div>

                           
                            <div class="form-group row">
                                <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
                                    <div class="col-sm-10">
                                            @if(isset($lenders))
                                                @if($lenders['data'][0]['gender'] == 'm')
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

                            @if(!isset($lenders))
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                    <div class="col-sm-10">
                                        <input id="password" type="password" class="form-control" name="password"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password:</label>
                                    <div class="col-sm-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                            @endif
                            

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary" >{{isset($lenders)? 'Update':'Register'}}</button>&nbsp;&nbsp;

                                    <a class="btn btn-default"
                                    @if(isset($lenders)) 
                                        href="{{url('finance/lenders-listing')}}"
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
        
    @endsection










