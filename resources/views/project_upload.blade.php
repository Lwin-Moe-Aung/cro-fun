@extends('layout.master')
@section('title','Project Upload')
@section('container')
<div class="container" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-wrapper">
                <div>
                <div class="form-header"><h4>{{isset($project)? "Project Update" :"Project Upload" }}</h4></div>

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

                    <form class="form-horizontal" method="post" id="project_upload"  name="project_upload"

                    @if(isset($project))
                       action="{{url('finance/projects/detail/update/'.$project['data'][0]['id'])}}"
                    @else
                        action="{{url('project/form')}}"
                    @endif

                    >
                        {{csrf_field()}}

                        <div class="form-group">

                            <div class="col-sm-12">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="project_title" id="project_title"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['project_title']}}"
                                       @endif

                                       placeholder="Project Title" >
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-industry"></i></span>
                                 </div>
                            </div>
                        </div>


                        @if(isset($project))
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input type="text" class="form-control" readonly="true" name="code_no" id="code_no" value="{{$project['data'][0]['code_no']}}">
                                     <span class="input-group-addon" id="basic-addon1"><i class="fa fa-industry"></i></span>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if(isset($project))
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input type="text" class="form-control" readonly="true" name="borrower_name" id="borrower_name" value="{{$project['data'][0]['name']}}">
                                    <input type="hidden" class="form-control" readonly="true" name="borrower_id" id="borrower_id" value="{{$project['data'][0]['borrower_id']}}">
                                     <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if(isset($project))
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly="true" name="nrc" id="nrc" value="{{$project['data'][0]['nrc']}}">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-id-card-o"></i></span>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if(!isset($project))
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <select class="form-control" name="borrower_id" id="borrower_id">
                                       <option value="">Select Borrower...</option>
                                    @for($i=0;$i<count($borrowers['data']);$i++)
                                        <option value="{{$borrowers['data'][$i]['id']}}">{{$borrowers['data'][$i]['name']}}</option>
                                    @endfor

                                </select>
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-id-card-o"></i></span>
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="form-group nrc">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input type="text" class="form-control" name="nrc" id="nrc" readonly>
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-id-card-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">Select.......</option>
                                  @for($i=0;$i<count($categories['data']);$i++)
                                        <option value="{{$categories['data'][$i]['id']}}"
                                        @if(isset($project))
                                           @if($project['data'][0]['category_id']==$categories['data'][$i]['id'])
                                             selected
                                            @endif
                                                @endif
                                        >{{$categories['data'][$i]['title']}}</option>
                                  @endfor
                                </select>
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-list"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input type="text" class="form-control" name="loan_value" id="loan_value" placeholder="Loan amount"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['loan_value']}}"
                                        @endif
                                >
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input type="text" class="form-control" name="return_estimation_proposed" id="return_estimation_proposed" placeholder="Return Estimation (Proposed)"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['return_estimation_proposed']}}"
                                        @endif
                                >
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="radio-inline"><input type="radio" name="collateral_availability" id="collateral_availability" value="1"
                                    @if(isset($project))
                                        @if($project['data'][0]['collateral_availability']==1)
                                            checked
                                          @endif
                                        @else
                                            checked
                                            @endif
                                    >Yes
                                </label>
                                <label class="radio-inline"><input type="radio" name="collateral_availability" id="collateral_availability" value="0"
                                          @if(isset($project))
                                             @if($project['data'][0]['collateral_availability']==0)
                                                   checked
                                            @endif
                                            @endif

                                    >
                                    No

                                </label>

                            </div>
                        </div>


                        <div class="form-group collateral">
                            <div class="col-sm-12">
                              <div class="input-group">
                                <input type="text" class="form-control" name="collateral_estimated_value" id="collateral_estimated_value" placeholder="Collateral estimated value"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['collateral_estimated_value']}}"
                                        @endif

                                >
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money"></i></span>
                              </div>
                            </div>
                        </div>


                        <div class="form-group collateral">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <textarea class="form-control" rows="5" id="collateral_description" name="collateral_description" placeholder="Collateral Description">@if(isset($project)){{trim($project['data'][0]['collateral_description'])}}@endif</textarea>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-text-width"></i></span>
                                </div>
                            </div>
                        </div>

                        @if(!isset($project))
                        <div class="form-group collateral" >
                            <div class="col-sm-12">

                                @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone3', 'photo_value' => 'collateral_evidence' ))
                            </div>
                        </div>
                        @endif

                        @if(isset($project))
                            <div class="form-group collateral">

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone3-Modal">Browse</button>
                                        </div>

                                        @include('fileupload.dropzone', array('photo' =>$project['data'][0]['collateral_evidence'],'modal_id' => 'real-dropzone3-Modal', 'dropzone_id' => 'real-dropzone3', 'photo_value' => 'collateral_evidence' ,'preview_image' => 'real-dropzone3-preview','image'=>'Images','pdf'=>'Pdf'))
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input id="project_period" type="text" class="form-control" name="project_period" placeholder="Project period"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['project_period']}}"
                                        @endif
                                >
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-o"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">


                                    <select class="form-control" name="state" id="state">

                                        <option value="">Select State ....</option>

                                        @for($i=0;$i<count($states['data']);$i++)

                                            <option value="{{$states['data'][$i]['state']}}"
                                                    @if(isset($project))
                                              @if($project['data'][0]['state']==$states['data'][$i]['state'])
                                                  selected
                                                  @endif
                                              @endif

                                            >{{$states['data'][$i]['state']}}</option>
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
                                        @if(isset($project))
                                            @for($i=0;$i<count($township['data']);$i++)

                                                <option value="{{$township['data'][$i]['township']}}"

                                                        @if($project['data'][0]['township']==$township['data'][$i]['township'])
                                                        selected

                                                        @endif

                                                >{{$township['data'][$i]['township']}}</option>
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
                                <input id="project_location" type="text" class="form-control" name="project_location" placeholder="Project location"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['project_location']}}"
                                        @endif
                                >
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                               </div>
                            </div>
                        </div>


                        @if(!isset($project))
                        <div class="form-group">
                            <div class="col-sm-12">
                               
                                    @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'project_image' ))
                            </div>
                        </div>
                        @endif

                        @if(isset($project))
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#real-dropzone2-Modal">Browse</button>
                                        </div>

                                        @include('fileupload.dropzone', array('photo' =>$project['data'][0]['project_image'],'modal_id' => 'real-dropzone2-Modal', 'dropzone_id' => 'real-dropzone2', 'photo_value' => 'project_image' ,'preview_image' => 'real-dropzone2-preview','image'=>'Images','pdf'=>''))
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <textarea class="form-control" rows="5" id="project_description" name="project_description" placeholder="Project Description">@if(isset($project)){{trim($project['data'][0]['project_description'])}}@endif</textarea>
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-text-width"></i></span>
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input id="fund_closing_date" type="text" class="form-control startdate" name="fund_closing_date" placeholder="Fund closing date"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['fund_closing_date']}}"
                                        @endif
                                >
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input id="project_start_date" type="text" class="form-control sdate"  name="project_start_date" placeholder="Project start date"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['project_start_date']}}"
                                        @endif
                                >
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input id="project_end_date" type="text" class="form-control edate" name="project_end_date" placeholder="Project end date"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['project_end_date']}}"
                                        @endif
                                >
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input id="commodity" type="text" class="form-control" name="commodity" placeholder="commodity"
                                       @if(isset($project))
                                       value="{{$project['data'][0]['commodity']}}"
                                        @endif
                                >
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 text-center">

                                <button class="btn btn-primary" >

                                   {{isset($project)? "Update" :"Register" }}
                                </button>&nbsp;
                                @if(!isset($project))
                                <a class="btn btn-default" href="{{url('/')}}">Cancel</a>&nbsp;
                                @else
                                 <a class="btn btn-default" href="{{url('finance/projects-listing')}}">Cancel</a>&nbsp;
                                @endif

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
    <script src="{{asset('js/project_upload.js')}}"></script>

    <script>
        $(document).ready(function(){

            var check_value = $('input[type="radio"]:checked').val();
            if(check_value==0)
            {
                //$('.collateral').hide();
                //$('#collateral_estimated_value').val(0);
                //$('#collateral_description').val(null);
                //$('#collateral_evidence').val('');
                //$("#zip").hide();
                $('.collateral').hide();
            }
            if(check_value==1)
            {
                $('.collateral').show();
                //$("#zip").show();

            }
        });

            $('input[type="radio"]').change(function(){
                if ($(this).is(':checked'))
                {
                    var res=$(this).val();
                    if(res==0)
                    {

                        $('#collateral_estimated_value').val(0);
                        $('#collateral_description').val("");
                        $('#collateral_evidence').val("");
                        $("#zip").hide();
                        $('.collateral').hide();

                        //alert(c);

                        //$("#collateral_estimated_value").prop('disabled', false);




                    }
                    if(res==1) {
                        $('.collateral').show();
                        //$("#zip").show();


                    }

                }
            });





    </script>



@endsection

