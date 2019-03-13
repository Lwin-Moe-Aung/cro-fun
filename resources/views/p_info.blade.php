 @if(session('status'))
<div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('status')}}</strong>
</div>
@endif @if(session('success'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('success')}}</strong>
</div>
@endif
 <div class="grid-heading">
     Project Detail
 </div>
<div class="project-detail-container">
    <div class="prj_detail-info">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="">
                        <div class="heading">Project Info</div>
                        <div class="">
                            <div class="row">
                                <div class="">
                                    <div class="project-information">
                                        <div class="project-detail">
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Title</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['project_title']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Category </div>
                                                <div class="col-xs-7 right"> : {{$project['data'][0]['category']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Risk </div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['project_risk']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Grade</div>
                                                <div class="col-xs-7 right"> : {{$project['data'][0]['project_grade']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Period(days)</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['project_period']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> State</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['state']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Township</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['township']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Address</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['project_location']}}</div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div>
                                                <div class="col-xs-5 left"> Project Status</div>
                                                <div class="col-xs-7 right">: @if(array_key_exists($project['data'][0]['status'],$p_status)) {{$p_status[$project['data'][0]['status']]}} @endif
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div>
                                                <div class="col-xs-5 left"> Commodity</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['commodity']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Comment By Finance</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['comment']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Project Description</div>
                                                <div class="col-xs-7 right ">:
                                                    <span class="comment more">{{$project['data'][0]['project_description']}}  </span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="">
                        <div class="heading">Borrower Info</div>
                        <div class="">
                            <div class="row">
                                <div class="">
                                    <div class="project-information">
                                        <div class="project-detail">
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Borrower Name</div>
                                                <div class="col-xs-7 right">:<a href="#" id="borrower">{{$project['data'][0]['name']}}</a></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Borrower NRC</div>
                                                <div class="col-xs-7 right"> : {{$project['data'][0]['nrc']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="">
                        <div class="heading">Project Date</div>
                        <div class="">
                            <div class="row">
                                <div class=" ">
                                    <div class="project-information">
                                        <div class="project-detail">
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Fund Closing Date</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['fund_closing_date']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Project Start Date</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['project_start_date']}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Project End Date</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['project_end_date']}}</div>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="">
                        <div class="heading">Finanicial Info</div>
                        <div class="">
                            <div class="row">
                                <div class=" ">
                                    <div class="project-information">
                                        <div class="project-detail">
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Loan Amount</div>
                                                <div class="col-xs-7 right">: {{number_format($project['data'][0]['loan_value'])}} MMK</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Return Estimation(Proposed) </div>
                                                <div class="col-xs-7 right"> : {{number_format($project['data'][0]['return_estimation_proposed'])}} MMK</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Return Estimation(Approved) </div>
                                                <div class="col-xs-7 right">: {{number_format($project['data'][0]['return_estimation_approved'])}} MMK</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Profit Sharing Estimation</div>
                                                <div class="col-xs-7 right"> : {{$project['data'][0]['profit_sharing_estimation']}} %</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Current Investment Amount</div>
                                                <div class="col-xs-7 right">: @if($total_funded) {{number_format($total_funded)}} MMK @else 0 MMK @endif
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Profit Sharing Description</div>
                                                <div class="col-xs-7 right">:
                                                    <span class="comment more">{{$project['data'][0]['profit_sharing_description']}}</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Expected Revenue </div>
                                                <div class="col-xs-7 right"> : {{number_format($project['data'][0]['loan_value']+$project['data'][0]['return_estimation_approved'])}} MMK</div>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="">
                        <div class="heading">Collateral Info</div>
                        <div class="">
                            <div class="row">
                                <div class="">

                                    <div class="project-information">

                                        <div class="project-detail">

                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Collateral Availability</div>
                                                <div class="col-xs-7 right">: {{$project['data'][0]['collateral_availability']==0 ? "No" : "Yes"}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left"> Collateral Estimated Value </div>
                                                <div class="col-xs-7 right">: {{number_format($project['data'][0]['collateral_estimated_value'])}} MMK</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <div class="col-xs-5 left">Collateral Evidence</div>
                                                <div class="col-xs-7 right">: @if($project['data'][0]['collateral_evidence'])
                                                    <a href="{{asset('uploads/Pdf/'.$project['data'][0]['collateral_evidence'])}}" download>download</a> @else N/A @endif

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div>
                                                <div class="col-xs-5 left">Collateral Description</div>
                                                <div class="col-xs-7 right">:
                                                    <span class="comment more">{{$project['data'][0]['collateral_description']}}</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($role=='lender')
                <div class="col-md-12">
                    <div class="">
                        <div class="heading">Investment</div>
                        <div class="">
                            <div class="row">
                                <div class="project-information">
                                    <div class="project-detail">
                                        <div class="col-md-12 col-xs-12">
                                            <form method="post" name="project_info" id="project_info">

                                                {{csrf_field()}}

                                                <div>
                                                    <div class="col-xs-6 left">Minimum Investment Amount</div>
                                                    <div class="col-xs-6 right">
                                                        <div class="form-group">
                                                            : {{number_format($project['data'][0]['minimum_investment_amount'])}} MMK</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div>

                                                    <div class="col-xs-6 left">Investment Amount:</div>
                                                    <div class="col-xs-6 right">
                                                        <div class="form-group">
                                                            <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>
                                                <div>
                                                    <div class="col-xs-6 left"> Investment Type:</div>
                                                    <div class="col-xs-6 right">
                                                        <div class="form-group">
                                                            <label class="radio-inline"><input type="radio" name="investment_type" id="investment_type" value="bank" checked>Bank Transfer</label>
                                                            <label class="radio-inline"><input type="radio" name="investment_type" id="investment_type" value="mpu">MPU</label>

                                                            <input type="hidden" name="lender_id" value="{{session('current')['id']}}" />
                                                            <input type="hidden" name="project_id" value="{{$project['data'][0]['id']}}" />
                                                            <input type="hidden" name="return_estimation_approved" value="{{$project['data'][0]['return_estimation_approved']}}" />
                                                            <input type="hidden" name="profit_sharing_estimation" value="{{$project['data'][0]['profit_sharing_estimation']}}" />
                                                            <input type="hidden" name="loan_value" value="{{$project['data'][0]['loan_value']}}" />
                                                        </div>

                                                        <input type="submit" class="btn btn-primary" id="invest" value="Invest Now" /></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        </form>
    </div>
</div>

@include('borrower_detail_modal')