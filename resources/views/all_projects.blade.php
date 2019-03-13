
@extends('layout.master')
@section('title','Home')
@section('container')

    <section id="project" class="section">
        <div class="container">
            <div class="clearfix"></div>

      <div class="col-md-4 text-right hidden-xs hidden-sm">
        <img src="https://crowde.co/img/xayam.png.pagespeed.ic.8uOlHPukfP.webp" alt="">
      </div>
      <div class="col-md-4 text-center">
        <h2  style="margin-bottom: 60px;font-family:Myanmar3;">

            <b>ကဲမိတ်ဆွေတို့ နောင်ရေးစိတ်အေးရအောင် အခုပဲအကျိုးအမြတ်ရရှိနိုင်မယ့် လုပ်ငန်းတစ်ခုကိုစတင် ရွေးချယ်လိုက်ပါတော့</b>
        </h2>
      </div>
      <div class="col-md-4 text-left hidden-xs hidden-sm">
        <img src="https://crowde.co/img/xsayur.png.pagespeed.ic._EeARiOVAz.webp" alt="">
      </div>
      <div class="clearfix"></div>
            <div class="row">

                @for($i=0;$i<count($projects['data']['data']);$i++)
                    <a class="link-invest" href="{{url('projects/info',$projects['data']['data'][$i]['id'])}}" style="color:black;">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 project-wrapper">

                        <div class="porject-inner">
                            <div class="image-wrapper">
                                <div class="porject-image">
                                    <img src="{{asset('uploads/Images/'.$projects['data']['data'][$i]['project_image'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/No_Image_Available.jpg')}}';" class="img-responsive" style="width:100%"/>
                                </div>
                            </div>
                            <div class="project-information">


                                <div class="project-heading">
                                    <h3>  {{$projects['data']['data'][$i]['project_title']}}</h3>
                                    <small>
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12"> Min Investment.
                                            {{number_format($projects['data']['data'][$i]['minimum_investment_amount'],2)}}
                                        </div>

                                    </small>
                                </div>


                                <div class="project-detail">

                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left"> Expected Profit</div>
                                        <div class="col-xs-7 right"> : {{$projects['data']['data'][$i]['profit_sharing_estimation']}}% </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left"> Period </div>
                                        <div class="col-xs-7 right"> : {{$projects['data']['data'][$i]['project_period']}} days</div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left"> Location </div>
                                        <div class="col-xs-7 right"> : {{$projects['data']['data'][$i]['project_location']}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left"> Project Risk</div>
                                        <div class="col-xs-7 right"> : {{$projects['data']['data'][$i]['project_risk']}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left"> Scheme</div>
                                        <div class="col-xs-7 right">: Profit Sharing</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>

                            <div class="project-footer" >
                                <div class="project-footer-inner" style="font-style:italic">
                                    <div class="progress progress-thin">


                                        @for($j=0;$j<count($project_investment['data']);$j++)
                                            @if($projects['data']['data'][$i]['id']==$project_investment['data'][$j]['project_id'])
                                                <div class="progress-bar progress-bar-striped progress-bar-success active pulse" role="progressbar" aria-valuenow="49.8394" aria-valuemin="0" aria-valuemax="100" style="width:{{$project_investment['data'][$j]['percent']}}%">
                                                    <span style="">{{$project_investment['data'][$j]['percent']}} %</span>

                                                </div>

                                            @endif
                                        @endfor

                                        <div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="50.1606" aria-valuemin="0" aria-valuemax="100" style="width:50.1606%">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-xs-5 left"> Total Funded</div>
                                        <div class="col-xs-7 right">:
                                            @for($j=0;$j<count($project_investment['data']);$j++)
                                                @if($projects['data']['data'][$i]['id']==$project_investment['data'][$j]['project_id'])

                                                    @if(in_array($project_investment['data'][$j]['project_id'],$projects['data']['data'][$i]))
                                                        {{number_format($project_investment['data'][$j]['total_funded'],2)}} MMK

                                                    @endif

                                                @endif
                                            @endfor

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left">Time Left </div>
                                        <div class="col-xs-7 right">
                                            :  <?php
                                            $start=$projects['data']['data'][$i]['project_start_date'];
                                            $end=$projects['data']['data'][$i]['project_end_date'];
                                            $s=strtotime($start);
                                            $e=strtotime($end);
                                            $d=$e-$s;
                                            $day="";
                                            $left=floor($d/ (60 * 60 * 24));
                                            if($left>1)
                                            {
                                                echo $left." days";
                                            }
                                            else{
                                                echo $left." day";
                                            }
                                            //echo $left.$day;

                                            ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="col-xs-5 left"> Total Needs </div>
                                        <div class="col-xs-7 right"> : {{number_format($projects['data']['data'][$i]['loan_value'],2)}} MMK </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                @if(!empty($role))
                                    @if($role=='lender')
                                        <div class="col-md-12 text-center button"> <a href="{{url('projects/info',$projects['data']['data'][$i]['id'])}}" class="btn btn-block btn-warning btn-checkout"> INVEST NOW! </a> </div>
                                    @endif

                                @endif
                                <div class="clearfix"style="margin-top:20px;"></div>

                            </div>
                        </div>

                    </div>
                    </a>
                @endfor


            </div>
            @include('pagination')
        </div>

    </section>




        @include('layout.footer')



@endsection




