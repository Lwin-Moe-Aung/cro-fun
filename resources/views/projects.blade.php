
@extends('layout.master')

@section('title','Home')
@section('container')

  <div class="myslider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide">
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active"><img src="{{asset('slider/banner01.png')}}" class="img-responsive" alt=""></div>
          <div class="item"> <img src="{{asset('slider/banner02.png')}}" class="img-responsive" alt="" > </div>

          <div class="item"> <img src="{{asset('slider/banner03.png')}}" class="img-responsive" alt=""> </div>
        </div>

        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev"> <i class="fa fa-angle-left"></i> </a> <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a> 
      </div>
    </div>
  </div>
  <section id="investing" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="embed-responsive embed-responsive-16by9" style="background: #ffffff; border-radius: 8px; margin-top: 30px">
            <iframe width="500" height="350" src="https://www.youtube.com/embed/C6BoNgylcLQ" frameborder="0" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
      <div class="row"> <br>
        <br>
        <div class="col-md-12 text-center">
          <h2 class="section-heading" style="font-family:Myanmar3;"> အနာဂတ်ဘဝသာယာဖို့ စိုက်ပျိုးရေးမှာရင်းနှီးစို့  </h2>
          <p class="crowd_p" style="font-family:Myanmar3;"> မိတ်ဆွေတို့ နောင်ရေးစိတ်အေးနိုင်စေဖို့အတွက် မိတ်ဆွေတို့ရဲ့ ရင်းနှီးငွေများမှ ကောင်းမွန်သောအကျိုးအမြတ်များရရှိနိုင်အောင် CROWDE မှ ကူညီပေးပါရစေ။</p>
        </div>
      </div>
      

      <div class="row section-sub-features">
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="row">
            <div class="col-md-4">
              <h3 class="section-subheading" style="font-family:Myanmar3;">
                အကောင်းဆုံးလုပ်ဖော်ကိုင်ဖက်များ

              </h3> 
              <div class="divider"></div> 
              <p class="crowd_t" style="font-family:Myanmar3;">

                ကျွန်တော်များCrowdeလုပ်ငန်းသည်
                <br>စိတ်ချယုံကြည်ရပြီးအတွေ့အကြုံကောင်းများရှိ<br/>သောတောင်သူဦးကြီး ၃၀၀ ကျော် နှင့် အတူလက်တွဲလုပ်ကိုင်လျက်ရှိပါသည်။
                
              </p>
            </div> 
            <div class="col-md-4">
              <h3 class="section-subheading" style="font-family:Myanmar3;">
                လူတန်းစားအလွှာအားလုံးအတွက်
                
              </h3> 
              <div class="divider">
              </div> 
              <p class="crowd_t" style="font-family:Myanmar3;">
                မိတ်ဆွေအနေနှင့် အနည်းဆုံးငွေကျပ်<br> တစ်သောင်းမှ စတင်ရင်းနှီးမြှပ်နှံပြီး ကျွန်တော်တို့နှင့် အတူလက်တွဲလုပ်ကိုင် အကျိုးအမြတ်များရရှိနိုင်ပါသည်။
                
            </p>
          </div> 
          <div class="col-md-4">
            <h3 class="section-subheading" style="font-family:Myanmar3;">

              အကျိုးအမြတ်အတွက်အာမခံချက်ရှိခြင်း
              
            </h3> 
            <div class="divider">
            </div> 
            <p class="crowd_t" style="font-family:Myanmar3;">

              မိတ်ဆွေအနေဖြင့် ကျွန်ုပ်တို့နှင့်<br> လက်တွဲလုပ်ကိုင်လျက်ရှိသောလုပ်ငန်းများအားလေ့လာပြီးမိမိနှစ်သက်သောလုပ်ငန်းကိုသာရွေးချယ် ရင်းနှီးမြှပ်နှံနိုင်သည့်အတွက် အကျိုးအမြတ်ရှိမည်ဟုယူဆသောလုပ်ငန်းကိုသာရွေးချယ် ရင်းနှီးနိုင်ပါသည်။
                
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  <div id="how-it-works" class="section-how-it-works-v2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="section-heading-to-start-investing" style="font-family:Myanmar3;">

            ရင်းနှီးမြှပ်နှံမှုစတင်ရန် အလွန်လွယ်ကူသောအဆင့်လေးဆင့်
              
          </h2>
        </div>
      </div> 
      <div class="row text-center">
        <div class="col-md-3 col-sm-6 col-how-it-works">
          <div class="row">
            <div class="col-md-12 col-xs-3 img-farmer">
              <img src="{{asset('slider/register1.png')}}" alt="" class="img-farmer-height">
            </div> 
            <div class="col-md-12 col-xs-9">
              
                
              <h4 class="register_yourself" style="font-family:Myanmar3;">
                ၁. ကျွနု်ပ်တို့နဲ့ အတူလက်တွဲလုပ်ကိုင်နိုင်ရန် လက်ရှိစာမျက်နှာညာဘက်ထောင့်ရှိ Sign Up နှိပ်၍ အကောင့်သစ်တစ်ခုဖွင့်လှစ်လိုက်ပါ။
              </h4>
              

          </div>
        </div>
      </div> 
      <div class="col-md-3 col-sm-6 col-how-it-works">
        <div class="row">
          <div class="col-md-12 col-xs-3 img-farmer">
            <img src="{{asset('slider/select.png')}}" alt="">
          </div> 
          <div class="col-md-12 col-xs-9">
              
              <h4 class="register_yourself" style="font-family:Myanmar3;">
                ၂. မိမိရင်းနှီးမြှပ်နှံရန် သင့်တော်မည်ဟုယူဆသောလုပ်ငန်းတစ်ခုအားရွေးချယ်လိုက်ပါ။
              </h4>  
              
             

          </div>
        </div>
      </div> 
      <div class="col-md-3 col-sm-6 col-how-it-works">
        <div class="row">
          <div class="col-md-12 col-xs-3 img-farmer">
            <img src="{{asset('slider/start.png')}}" alt="">
          </div> 
          <div class="col-md-12 col-xs-9">
            <h4 class="register_yourself" style="font-family:Myanmar3;">

              ၃.မိမိရင်းနှီးမြှပ်နှံလိုသောငွေပမာဏအား ကျွန်ုပ်တို့ထံသို့ အပ်နှံလိုက်ပါ။
             </h4>

          </div>
        </div>
      </div> 
      <div class="col-md-3 col-sm-6 col-how-it-works">
        <div class="row">
          <div class="col-md-12 col-xs-3 img-farmer">
            <img src="{{asset('slider/monitor.png')}}" alt="">
          </div> 
          <div class="col-md-12 col-xs-9">
               
                <h4 class="register_yourself" style="font-family:Myanmar3;">
                  ၄.မိမိရွေးချယ်ရင်းနှီးထားသောလုပ်ငန်း၏ အခြေအနေအားမိမိအကောင့် Dashboard တွင် စောင့်ကြည့်လေ့လာပြီးအကျိုးအမြတ်များကိုရယူလိုက်ပါ။
                </h4>
                

        </div>
      </div>
    </div>
  </div>
</div>
</div>



  <section id="project" class="section">
    <div class="container">
      <div class="clearfix"></div>

      <div class="col-md-4 text-right hidden-xs hidden-sm">
        <img src="{{asset('slider/chickent.png')}}" alt="">
      </div>
      <div class="col-md-4 text-center">
        <h2  style="margin-bottom: 60px;font-family:Myanmar3;">

          <b>ကဲမိတ်ဆွေတို့ နောင်ရေးစိတ်အေးရအောင် အခုပဲအကျိုးအမြတ်ရရှိနိုင်မယ့် လုပ်ငန်းတစ်ခုကိုစတင် ရွေးချယ်လိုက်ပါတော့</b>
        </h2>
      </div>
      <div class="col-md-4 text-left hidden-xs hidden-sm">
        <img src="{{asset('slider/fruits.png')}}" alt="">
      </div>
      <div class="clearfix"></div>
      <div class="row">

        @for($i=0;$i<count($projects['data']);$i++)
          <a class="link-invest" href="{{url('projects/info',$projects['data'][$i]['id'])}}" style="color:black;">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 project-wrapper">

            <div class="porject-inner">
              <div class="image-wrapper">
                <div class="porject-image">
                  <img src="{{asset('uploads/Images/'.$projects['data'][$i]['project_image'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/No_Image_Available.jpg')}}';" class="img-responsive" style="width:100%"/>
                </div>
              </div>
              <div class="project-information">


                <div class="project-heading">
                  <h3>  {{$projects['data'][$i]['project_title']}}</h3>
                  <small>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12"> Min Investment.
                      {{number_format($projects['data'][$i]['minimum_investment_amount'],2)}}
                    </div>

                  </small>
                </div>


                <div class="project-detail">

                  <div class="clearfix"></div>
                  <div>
                    <div class="col-xs-5 left"> Expected Profit</div>
                    <div class="col-xs-7 right"> : {{$projects['data'][$i]['profit_sharing_estimation']}}% </div>
                  </div>
                  <div class="clearfix"></div>
                  <div>
                    <div class="col-xs-5 left"> Period </div>
                    <div class="col-xs-7 right"> : {{$projects['data'][$i]['project_period']}} days</div>
                  </div>
                  <div class="clearfix"></div>
                  <div>
                    <div class="col-xs-5 left"> Location </div>
                    <div class="col-xs-7 right"> : {{$projects['data'][$i]['project_location']}}</div>
                  </div>
                  <div class="clearfix"></div>
                  <div>
                    <div class="col-xs-5 left"> Project Risk</div>
                    <div class="col-xs-7 right"> : {{$projects['data'][$i]['project_risk']}}</div>
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
                      @if($projects['data'][$i]['id']==$project_investment['data'][$j]['project_id'])
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
                        @if($projects['data'][$i]['id']==$project_investment['data'][$j]['project_id'])

                          @if(in_array($project_investment['data'][$j]['project_id'],$projects['data'][$i]))
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
                        $start=$projects['data'][$i]['project_start_date'];
                        $end=$projects['data'][$i]['project_end_date'];
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
                    <div class="col-xs-7 right"> : {{number_format($projects['data'][$i]['loan_value'],2)}} MMK </div>
                  </div>

                </div>
                <div class="clearfix"></div>
                @if(!empty($role))
                  @if($role=='lender')
                    <div class="col-md-12 text-center button"> <a href="{{url('projects/info',$projects['data'][$i]['id'])}}" class="btn btn-block btn-warning btn-checkout"> INVEST NOW! </a> </div>
                  @endif

                @endif
                <div class="clearfix"style="margin-top:20px;"></div>

              </div>
            </div>

          </div>
          </a>
        @endfor
      </div>

    </div>
  
      <div class="row hidden-xs hidden-sm">
        <div class="col-md-7 col-md-offset-5 more-project" style="margin-top: 65px;">
           <a class="btn btn-warning" style="margin-top:-174px;" href="{{url('projects/page')}}">SEE OTHER PROJECTS</a>
        </div>
      </div>
      <div class="row hidden-md hidden-lg">
        <div class="col-md-7 col-md-offset-5 more-project" style="margin-top: 65px; text-align: center;">
           <a class="btn btn-warning" style="margin-top:-174px;" href="{{url('projects/page')}}">SEE OTHER PROJECTS</a>
        </div>
      </div>
    
  </section>

  <div class="section-testimonial" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center" style="margin-bottom: 35px;">
          <h2 style="font-weight: 200;font-size: 29px;line-height: 35px;margin-bottom: 40px;margin-top: 22px;font-family: inherit;color: inherit;box-sizing: inherit;text-align: center;" >
            What they said about investing in crowde 
          </h2> 
          <br>
          <br>
        </div>
      </div> 
      <div class="row home-testimonial" style="font-family:Myanmar3;">
        <div class="col-md-3 text-center" >
          <div class="card card-testimonial card-testimonial-blue1">
            <p class="text-testimonial">
              Crowdeနဲ့ လက်တွဲပြီး ကျွန်တော် အတွက် အကျိုးအမြတ်တွေရရှိသလိုတောင်သူဦးကြီးတွေကိုလည်းတစ်ဖက်တစ်လမ်းကကူညီပေးနိုင်ခဲ့ပါတယ်။ နောက်ပြီးစိုက်ပျိုးရေးလုပ်ငန်းတွေပိုမိုဖွံ့ဖြိုးတိုးတက်လာစေဖို့ တစ်တပ်တစ်အားပါဝင်လုပ်ဆောင်နိုင်ခဲ့တဲ့အတွက်လဲကျေနပ်မိပါတယ်။ Crowde က တောင်သူတွေကိုရောရင်းနှီးမြှပ်နှံချင်သူတွေကိုပါ အကျိုးရှိအောင် ကူညီပေးနိုင်တဲ့ လုပ်ငန်းတစ်ခုပါပဲ။ အရမ်း<br/>ကောင်းပါတယ်။
            </p>
          </div> 
          <br>
          <br>
          <br> 
          <img src="{{asset('slider/no_img.png')}}" alt="" width="140" class="img-circle">
          <h3>ဦးမြတ်လှိုင် <br> <small>Director of Telematics iProtection</small></h3>
        </div> 
        <div class="col-md-3 text-center">
          <div class="card card-testimonial card-testimonial-green1 text-center">
            <p class="text-testimonial">
              Crowde က အရမ်းမိုက်တယ်ဗျာ။<br/>ကျွန်တော်တော့ သဘောကျတယ်။ လူငယ်တွေအတွက် လုပ်ငန်းလုပ်ကိုင်ဖို့ အခွင့်အလမ်းတွေရစေချင်တဲ့ ရည်ရွယ်ချက်လေးကအရမ်းကောင်းတယ်။ ကျွန်တော်ကတော့ ယုံကြည်စိတ်ချရတဲ့<br/> Crowdeနဲ့ပဲလက်တွဲပြီးလုပ်ငန်းတွေဆက်လုပ်သွားဦးမှာပါ။
            </p>
          </div> 
          <br>
          <br>
          <br> 
          <img src="{{asset('slider/no_img.png')}}" alt="" width="140" class="img-circle">
          <h3>ကိုနန္ဒ <br> <small>Financial consultant</small></h3>
        </div> 
        <div class="col-md-3 text-center">
          <div class="card card-testimonial card-testimonial-blue text-center">
            <p class="text-testimonial">
              ကျွန်တော့်အမြင်ပြောရရင် Crowde က ယုံကြည်စိတ်ချရတယ်ဗျ။ <br>ကျွန်တော့် ရင်းနှီးမြှပ်နှံငွေရဲဲ့ ၅% ကိုလစဉ် အကျိုးအမြတ်အနေနဲ့<br> ပြန်ရတယ်ဗျာ။ နောက်ပြီးစိုက်ပျိုးရေးလုပ်ငန်းလုပ်ကိုင်နေသူတွေကိုကူညီပေးရာလဲရောက်တယ်။ ငွေတစ်<br/>သောင်းကျပ် ရှိရုံနဲ့ Crowdeနဲ့စတင်<br/>ရင်းနှီးလို့ ရပြီဆိုတော့ မိတ်ဆွေတို့လဲ<br/>Crowdeနဲ့ လက််တွဲကြည့်သင့်တယ်လို့ အကြံပေးပါရစေဗျာ။
            </p>
          </div> 
          <br>
          <br>
          <br> 
          <img src="{{asset('slider/no_img.png')}}" width="140" alt="" class="img-circle">
          <h3>ကိုမိုးသူ <br> <small>Businessman</small></h3></div>
          <div class="col-md-3 text-center">
            <div class="card card-testimonial card-testimonial-green text-center">
              <p class="text-testimonial">
                Crowdeမှာတစ်သောင်းကျပ်လောက်နဲ့ စတင်ရင်းနှီးပြီးတော့ ကိုယ့်အတွက်<br/>ရင်းနှီးမြှပ်နှံတယ်ဆိုတာဘယ်လိုလဲဘာတွေလုပ်ရတာလဲဆိုတဲ့ အတွေ့အကြံုတွေယူလို့ရတယ်ဗျ။ နောက်ပြီးတစ်သောင်းကျပ်ဆိုတဲ့ ပမာဏလောက်နဲ့ စပြီးစမ်းသပ်ကြည့်လို့ရတော့ ကိုယ့်<br/>အတွက် နောက်ဆံတင်းစရာဝန်ထုပ်ဝန်ပိုးလဲဖြစ်မနေဘူးပေါ့။ တကယ်ကောင်းပါတယ်။ ကျွန်တော်တို့လိုလူငယ်တွေစမ်းသပ်လေ့လာကြည့်သင့်တယ်လို့ ထင်ပါတယ်။
              </p>
            </div> 
            <br><br><br> 
            <img src="{{asset('slider/no_img.png')}}" alt="" width="140" class="img-circle">
            <h3> သီဟအောင်<br> <small>IT Students</small>
            </h3>
          </div>
        </div>
      </div>
    </div>

    <div class="section-end-cta">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">

            @if(session('token'))
              <h2 style="font-family:Myanmar3"><b>
                  Crowdeနဲ့ လက်တွဲလုပ်ကိုင်ဖို့ အခုပဲ START INVEST လုပ်လိုက်ပါတော့။
                </b></h2>

              <p>
              <p style="font-family:Myanmar3">
                အသေးစိ်တ် အချက်အလက်တွေထပ်မံသိရှိချင်သေးတယ် ဆိုရင်တော့ ကျွန်တော်တို့ထံဆက်သွယ် မေးမြန်းနိုင်ပါတယ်။
              </p> <br>
              <a href="{{url('projects/page')}}" class="btn btn-red btn-wide btn-margin-right btn-lg btn btn-danger">
              START INVEST
              </a>
            @else
              <h2 style="font-family:Myanmar3"><b>
                  Crowdeနဲ့ လက်တွဲလုပ်ကိုင်ဖို့ အခုပဲ Sign Up လုပ်လိုက်ပါတော့။
                </b></h2>

              <p>
              <p style="font-family:Myanmar3">
                အသေးစိ်တ် အချက်အလက်တွေထပ်မံသိရှိချင်သေးတယ် ဆိုရင်တော့ ကျွန်တော်တို့ထံဆက်သွယ် မေးမြန်းနိုင်ပါတယ်။
              </p> <br> 
              <a href="{{url('lender/form')}}" class="btn btn-red btn-wide btn-margin-right btn-lg btn btn-danger">
              SIGN UP NOW
              </a>
            @endif

            <a data-scroll="" href="#" class="btn btn-default btn-hero-red-outline btn-wide btn-lg">
            HOW TO WORK
            </a>
            </p> 
          <div class="clearfix">
          </div>
          </div>
        </div>
      </div>
    </div>



  
    @include('layout.footer')

 

@endsection




