 @extends('layout.master')
    @section('container')
<div class="invest-page">
<div class="container">
 <div class="row">
    <div class="col-md-3 left-side">
     <div class="image-wrapper" >
       @if($profile_image)
        <img id="avatar_preview" src="{{asset('uploads/Images/'.$profile_image)}}" alt="" width="100%" class="image"/>

         @else
            <img id="avatar_preview" src="{{asset('uploads/Images/no.png')}}" alt="" width="100%" class="image img-responsive"/>
           @endif

      </div>
        <div class="image-footer-text">
            Investment Journal
        </div>
          <br>
            <div class="vertical-menu" style="width:100%;">
                <a href="{{url('lender/profile')}}" >Dashboard</a>
                <a href="{{url('profile')}}">Profile</a>
                <a href="{{url('lender/my-investments/'.session('current')['id'])}}">My Investments</a>
                <a href="{{url('logout')}}">Sign Out</a>
            </div>


    </div>
    <div class="col-md-8 col-md-offset-1">

    <div class="first-part">
      <div class="row invest-header">
        <div class="col-md-12">
          <div class="invest-greeting" >Welcome,</div>
          <div class="invest-name">{{session('current')['name']}}</div>
          <div class="invest-opp">Investor | {{session('current')['township']}},{{session('current')['state'] }} | <a href="mailto:{{session('current')['email']}}">{{session('current')['email']}}</a></div>
        </div>
      </div>
      <div class="first-section">
      <div class="row chart-body">

        <div class="col-md-8 col-sm-8">
          <div class="invest-wrapper">
              <div class="row">
                <div class="col-md-6 invest-active">
                
                    Active Investment
                </div>
                <div class="col-md-6 invest-line">
                  <h4 class="line"></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 invest-active">
                    <p class="amount">{{number_format($lenderprofile['data']["active"][0]['totalinvest'],2)}} MMK</p>
                      
                </div>
                <div class="col-md-6 invest-right">
                <p class="amount"># {{$lenderprofile['data']["active"][0]['projectnumbers']}} Project</p>
                </div>
              </div>
             <div class="row">
                <div class="col-md-6 invest-active">
                    Funding Process
                </div>
                <div class="col-md-6 invest-line">
                    <h4 class="line"></h4>
                </div>
              </div>
               <div class="row">
                <div class="col-md-6 invest-active">
                <p class="amount">
                    <?php
                    if($lenderprofile['data']["funding"][0]['totalinvest']==null)
                        echo 0;
                    else
                        echo number_format($lenderprofile['data']["funding"][0]['totalinvest'],2);
                    ?>
                  MMK</p>

                  </div>
                <div class="col-md-6 invest-right">
                <p class="amount"># {{$lenderprofile['data']["funding"][0]['projectnumbers']}} Project</p>
                </div>
                </div>
              </div>
        </div>
          <div class="col-md-4 col-sm-4">
              <canvas id="mycanvas" width="200" height="200">
              </canvas>
          </div>

      </div>
      </div>
      </div>
      <div class="second-part">
        <div class="first-section">
          <div class="row">
            <div class="col-md-6 invest-active">
              
                   SUMMARY OF INVESTMENT

              </div>
              <div class="col-md-6 invest-line">
                    <h4 class="line"></h4>
              </div>

          </div>
          <div class="row">
          <div class="col-md-6">
                  
                      <p class="amount">
                        <?php
                          if($lenderprofile['data']["total_profit_exception"][0]['total_profit']==null)
                              echo 0;
                          else
                              echo number_format($lenderprofile['data']["total_profit_exception"][0]['total_profit'],2);

                        ?> &nbsp;MMK</p>
                      <p>Profit Exceptions</p>
          </div>
          <div class="col-md-6 ">
                    
                      <p class="amount">
                        <?php
                        if($lenderprofile['data']["total_profit"][0]['total_profit']==null)
                            echo 0;
                        else
                            echo number_format($lenderprofile['data']["total_profit"][0]['total_profit'],2);
                        ?>
                      MMK</p>
                      <p>Total Profit Realization</p>
          </div>
          </div>
          <div class="seperator">&nbsp;</div>
          <div class="row">
          <div class="col-md-6">
                 
                      <p class="amount"># {{$lenderprofile['data']["total_invest_projects"][0]['total_invest_projects']}}</p>
                      <p> Total Investment Project</p>
          </div>
           <div class="col-md-6">
                    
                      <p class="amount">
                      <?php
                              if($lenderprofile['data']["total_profit_exception"][0]['total_profit']!=null & $lenderprofile['data']["active"][0]['totalinvest']!=0)
                        echo round((float)$lenderprofile['data']["total_profit_exception"][0]['total_profit']/(float)$lenderprofile['data']["active"][0]['totalinvest'],2);
                              else
                                  echo 0;
                              ?>
                        %

                      </p>
                      <p> ROI </p>
            </div>
            </div>
            </div>
          </div>

        @if(count($lenderprofile['data']['lender_projects_profits'])>0)
      <div class="third-part">
        <div class="third-section">
          <div class="row">
            <div class="col-md-6 invest-active">
               Profit Projection
            </div>
            <div class="col-md-6 invest-line">
                   <h4 class="line"></h4>
            </div>
               
          </div>
              <div class="regular slider">
                  @for($i=0;$i<count($lenderprofile['data']['lender_projects_profits']);$i++)

                    <div class="col-xs-4">
                      <div class="circle">
                        <div class="value">
                          <div class="month">{{date("M",strtotime($lenderprofile['data']['lender_projects_profits'][$i]['project_end_date']))}}</div>
                          <div>{{date("d",strtotime($lenderprofile['data']['lender_projects_profits'][$i]['project_end_date']))}}
                            -{{date("m",strtotime($lenderprofile['data']['lender_projects_profits'][$i]['project_end_date']))}}
                            -{{date("Y",strtotime($lenderprofile['data']['lender_projects_profits'][$i]['project_end_date']))}}
                          </div>
                          <div class="profit-amount"> {{number_format($lenderprofile['data']['lender_projects_profits'][$i]['profit_estimation'],2)}} MKK</div>
                          <div class="percent">{{$lenderprofile['data']['lender_projects_profits'][$i]['profit_percentage']}} %</div>

                        </div>
                        </div>
                      <div class="txt">{{$lenderprofile['data']['lender_projects_profits'][$i]['project_title']}}</div>
                    </div>
                     @endfor
                </div>
               
              @endif
                <a class="btn btn-default pull-right" href="{{url('/')}}">Back</a>

</div>     
          </div>
        </div>
      </div>
</div>
@include('layout.footer')
<script src="{{ asset('js/Chart.js') }}"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="{{ asset('js/left_sidebar.js') }}"></script>
<script>
          $(document).ready(function(){
            var ctx = $("#mycanvas").get(0).getContext("2d");

            var lender_chart = JSON.parse('<?php echo json_encode($result); ?>');
           
            //pie chart data
            //sum of values = 360
            var data = lender_chart;
               
           

            //draw
            var piechart = new Chart(ctx).Pie(data);

             //slick slide show
              $(".regular").slick({
                  dots: true,
                  infinite: true,
                  slidesToShow: 4,
                  slidesToScroll: 4,
                  responsive: [
                      {
                          breakpoint: 1024,
                          settings: {
                              slidesToShow: 4,
                              slidesToScroll: 4,
                              infinite: true,
                              dots: true
                          }
                      },
                      {
                          breakpoint: 600,
                          settings: {
                              slidesToShow: 2,
                              slidesToScroll: 2
                          }
                      },
                      {
                          breakpoint: 480,
                          settings: {
                              slidesToShow: 1,
                              slidesToScroll: 1
                          }
                      }
                      // You can unslick at a given breakpoint now by adding:
                      // settings: "unslick"
                      // instead of a settings object
                  ]

              });

          });
        </script>


@endsection

