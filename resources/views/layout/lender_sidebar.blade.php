<div class="vertical-menu">
    <a href="{{url('lender/my-investments/'.session('current')['id'])}}" >My Investment Listing</a>
    <a href="{{url('lender/available-revenue/'.session('current')['id'])}}">Available Project Profit</a>
     <a href="{{url('lender/not-available-revenue/'.session('current')['id'])}}">Not Available Project Profit</a>
    <a href="{{url('lender/project-progress/'.session('current')['id'])}}">Project Progress</a>
   
</div>