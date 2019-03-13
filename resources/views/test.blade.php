 @extends('layout.master')
    @section('container')


        <div class="slick-slider">
          
            <div class="slider slider-nav" >
            <div class="slick_wrapper">
              <div class="circle-chart">
              <h3 >1</h3>
              </div>
              </div>
              <div class="slick_wrapper">
              <div class="circle-chart">
              <h3 >2</h3>
              </div>
              </div>
              <div class="slick_wrapper">
              <div class="circle-chart">
              <h3 >3</h3>
              </div>
              </div>
              <div class="slick_wrapper">
              <div class="circle-chart">
              <h3 >4</h3>
              </div>
              </div>
             
              
              
            </div>
           
          </div>
      

 @include('layout.footer') 
<script src="{{asset('js/slick.js')}}"></script>

        <script>
          
      jQuery(document).ready(function(){
             jQuery('.slider-nav').slick({
             slidesToShow: 4,
             slidesToScroll: 4,
             asNavFor: '.slider-for',
            
             focusOnSelect: true
               });
      });
        </script>


        
   
@endsection

