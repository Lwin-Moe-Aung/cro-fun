@extends('layout.master')
<style>
    /*
       DEMO STYLE
   */
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


    /*body {
        font-family: 'Poppins', sans-serif;
        background: #fafafa;
    }
*/
   /* p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }
*/
    a, a:hover, a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar {
        padding: 15px 10px;
        background: #fff;
        border: none;
        border-radius: 0;
        margin-bottom: 40px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* ---------------------------------------------------
        SIDEBAR STYLE
    ----------------------------------------------------- */
    .wrapper {
        display: flex;
        align-items: stretch;
        perspective: inherit;
    }

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #f9f9f9;
        color: #fff;
        transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
        transform-origin: bottom left;
        box-shadow:2px 1px 2px 0 rgba(0,0,0,0.2);
        min-height: 600px;
    }

    #sidebar.active {
        margin-left: -250px;
        transform: rotateY(100deg);
    }
    #sidebar>ul>li.active>a, #sidebar>ul>li.active>a:hover, #sidebar>ul>li.active>a:focus, #sidebar>ul>li.active>a:active {
        background-color: #fff;
        color: #0b6cbc;
        font-weight: bold;
        font-size: 13px;
    }
    #sidebar>ul>li .submenu li {
        list-style: none;
        margin: 0;
        padding: 0;
        position: relative;
        background-color: #fff;
        border-top: 1px solid #e5e5e5;
    }
    #sidebar .sidebar-header {
        padding: 20px;
        background: #f9f9f9;
    }

    #sidebar ul.components {
        padding: 20px 0;

    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        color: #585858;
    }
    #sidebar ul li a:hover {
        color: #1963aa;
        background: #fff;
    }
    #sidebar>ul>li{
        border-bottom-color: #e5e5e5;
        border-bottom-style: solid;
        border-bottom-width: 1px;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
        color: #1963aa;
        background: #f9f9f9;
    }


    a[data-toggle="collapse"] {
        position: relative;
    }

    a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
        content: '\e259';
        display: block;
        position: absolute;
        right: 20px;
        font-family: 'Glyphicons Halflings';
        font-size: 0.6em;
    }
    a[aria-expanded="true"]::before {
        content: '\e260';
    }

    #sidebar>ul>li .submenu li:after{
        content: "";
        display: inline-block;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 18px;
        width: 0;
        border-left: 1px dashed #b1c9e0;
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;

    }
    ul ul a:hover {
        color: #0b6cbc;

    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #7386D5;
        color: #f9f9f9;
        color: #fff !important;
    }

    a.article, a.article:hover {
        background: #1963aa !important;
        color: #fff !important;
        margin-bottom:20px !important;
    }

    .panel-heading{
        border : none !important;
    }

    /* ---------------------------------------------------
        CONTENT STYLE
    ----------------------------------------------------- */
    #content {
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;

    }

    #sidebarCollapse {
        width: 40px;
        height: 40px;
        background: #f5f5f5;
    }

    #sidebarCollapse span {
        width: 80%;
        height: 2px;
        margin: 0 auto;
        display: block;
        background: #555;
        transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
        transition-delay: 0.2s;
    }

    #sidebarCollapse span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }


    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    .panel_style{
        border: none !important;
        box-shadow: none !important;
        border-radius: 0px !important;
    }

    .row{padding-top: 0px !important;}
    /* ---------------------------------------------------
        MEDIAQUERIES
    ----------------------------------------------------- */
    @media (max-width: 900px) {
        .move-container{
            margin-top: 0px !important;
        }
    }
    @media (max-width: 768px) {

        #sidebarCollapse{
            display: block !important;
        }
        #sidebar {
            margin-left: -250px;
            transform: rotateY(90deg);
        }
        #sidebar.active {
            margin-left: 0;
            transform: none;
        }
        #sidebarCollapse span:first-of-type,
        #sidebarCollapse span:nth-of-type(2),
        #sidebarCollapse span:last-of-type {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }
        #sidebarCollapse.active span {
            margin: 0 auto;
        }
        #sidebarCollapse.active span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
        }
        #sidebarCollapse.active span:nth-of-type(2) {
            opacity: 0;
        }
        #sidebarCollapse.active span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
        }

    }
    @media (min-width: 768px){
        .move-container .container{ margin-top : 0px !important;}
    }
    @media (max-width: 979px) and (min-width: 768px){
       .move-container,.move-container .container{ margin-top : 0px !important;}
       .navbar-fixed-top {margin-bottom: 0px !important;}
    }
    @media (min-width: 992px){
        .move-container .container{ margin-top : 0px !important;}
    }
    #project_invest,#project-progress,#project_loan_return,#project-log {
      table-layout: fixed;
      width: 100% !important;
    }
    #project_invest td,#profit td,
    #project_invest th,#project_log th,#project_log td,#profit th,#project-progress td , #project-progress th{
      width: auto !important;
      white-space: normal;
      text-overflow: ellipsis;
      overflow: hidden;
    }
    .padding-right{padding-right: 0px;}
    .heading{
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd;
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .grid-heading{
        margin-top: 30px;
        border-bottom: 1px dotted #000;
        padding-bottom: 5px;
        font-size: 25px;
        font-weight: bold;
    }
    .table-container,.project-detail-container{
        margin-top: 20px;
    }
    .project-detail-container{ margin-left: -30px; }
    .prj_detail-info{margin-top:20px;}

    #projectSubmenu  li.selected {
        background: #dddddd !important;
    }

    #projectSubmenu a:hover {
        background: #dddddd !important;
        text-decoration: none;
    }

    #projectSubmenu a:active {
        background: #dddddd !important;

    }

    #pageSubmenu a:hover {
        background: #dddddd !important;
        text-decoration: none;
    }
</style>
@section('container')

       <div class="wrapper">
        <!-- Sidebar Holder -->

                <nav id="sidebar">


                    <ul class="list-unstyled components">

                        <li style="text-align: center;padding-bottom: 10px;">
                            <img src="{{asset('uploads/Images/'.$project['data'][0]['project_image'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/no-image.png')}}';"width="200" />
                        </li>

                        @if($role=="finance" || $role=='admin')
                            <li class="manage_list">

                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                                    <i class="fa fa-laptop" aria-hidden="true"></i> Payment Processing
                                </a>

                                <ul class="collapse list-unstyled submenu" id="pageSubmenu">
                                    <li>

                                            @if($payment_transaction_no)
                                                <a href="{{url('projects/info/'.$id)}}#loan_grid" id="loan_grid_link">
                                                    <div class="alert alert-info alert-dismissable">
                                                        <strong>Loan is already given to borrower with Transaction ID: {{$payment_transaction_no}}</strong>
                                                    </div>
                                                </a>
                                            @else

                                                <a href="{{url('/finance/give-loan-to-borrower/' . $project['data'][0]['id']  )}}" class="p_side_bar">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                    Give Loan to Borrower
                                                </a>

                                            @endif


                                    </li>
                                    <li>

                                            @if($profit_transaction_no)
                                                <a href="{{url('projects/info/'.$id)}}#profit_dist_grid" id="profit_dist_grid_link">
                                                    <div class="alert alert-info alert-dismissable">
                                                        <strong>Loan payment is already received from borrower with Transaction ID : {{$profit_transaction_no}}</strong>
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{url('/finance/receive-payment/' . $project['data'][0]['id']  )}}" class="p_side_bar">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        Profit Distribution
                                                </a>
                                            @endif
                                    </li>

                                </ul>
                            </li>
                            <li class="manage_list">
                                <a href="#projectSubmenu" data-toggle="collapse" aria-expanded="false">
                                    <i class="fa fa-laptop" aria-hidden="true"></i> Manage Listing
                                </a>
                                <ul class="collapse list-unstyled submenu" id="projectSubmenu">
                                    <li>
                                        <a href="{{url('projects/info/'.$id)}}#investment_grid" id="investment_grid_link" class="p_side_bar">
                                            <i class="fa fa-angle-double-right" aria-hidden="true">
                                            </i> Investment Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('projects/info/'.$id)}}#profit_grid" id="profit_grid_link" class="p_side_bar">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> Profit Distribution Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('projects/info/'.$id)}}#detail" id="detail_link" class="p_side_bar">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> Project Update by Finance
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('projects/info/'.$id)}}#progress_grid" id="progress_grid_link" class="p_side_bar">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> Project Progress
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('projects/info/'.$id)}}#log_grid" id="log_grid_link" class="p_side_bar">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> Log Detail
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>

                    <ul class="list-unstyled CTAs">
                        @if($role=="finance" || $role=='admin')
                        <li><a href="{{url('finance/projects-listing')}}" class="article">Back to Projects</a></li>
                        @else
                        <li><a href="{{url('projects/page')}}" class="article">Back to Projects</a></li>
                        @endif
                    </ul>
                </nav>



                <!-- Page Content Holder -->

                <button type="button" id="sidebarCollapse" class="navbar-btn hide">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                @if($role=='lender')
                    <div id="content" class="container">
                        <div class="project_info" >
                            <div class="row">
                                <div class="col-md-12 ">                                   
                                    @include('p_info')
                                </div>
                            </div>

                        </div>
                    </div>


            </div>
            @include('layout.footer')
            <script src="{{asset('js/invest.js')}}"></script>






            @elseif($role=='finance' || $role=='admin')
                <div id="content" class="container">
                    <div class="project_info" >
                        <div class="row">
                            <div class="col-md-12 ">
                                @include('p_info')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 " id="detail">
                                @include('project_detail')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 " id="investment_grid">
                                @include('projectinvestments')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 " id="profit_grid">
                                @include('project_profit_distribution')
                                @if($total_revenue['data'] !== "")
                                     <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label>Total Revenue</label>
                                            </td>
                                            <td>
                                                : {{number_format($total_revenue['data'][0]['totalrevenue'])}} MMK
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 " id="progress_grid">
                                @include('projectprogress')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 " id="log_grid">
                                @include('projectlog')
                            </div>
                        </div>
                        @if($giveLoanToBorrower)
                        <div class="row">
                            <div class="col-sm-12 " id="loan_grid">
                                    @include('finance.give_loan_to_borrower')
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12 " id="profit_dist_grid">
                                @include('project_loan_return')
                                @if(!empty($total_loan_from_borrower))
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label>Total Loan Return From Borrower</label>
                                            </td>
                                            <td>
                                                :  {{number_format($total_loan_from_borrower['data'][0]['totalloanreturn'])}} MMK
                                            </td>
                                        </tr>
                                    </table>
                                    <div>
                                        
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @include('layout.footer')
        @include('layout.form_script')
        <script src="{{asset('js/project_update.js')}}"></script>
        <script src="{{asset('js/project_progress.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('js/dataTables.fixedColumns.min.js')}}"></script>
        <script>
            var id = {{$id}};
        </script>
        <script src="{{asset('js/loan_return_grid.js')}}"></script>


        <script type="text/javascript">

            $(document).ready(function() {

                all_hide();
                if ( window.location.hash ) {
                    var hash_value =window.location.hash.substr(1) ;
                    show_and_highlight(hash_value); //clicks on element specified by hash
                    //document.location.href= window.location.hash;
                    setTimeout(function(){document.location.href = window.location.hash},500);
                }

                $('#projectSubmenu li a').click(function(){

                    var url = $(this).attr('href');
                    var split = url.split("#");
                    project_show_and_highlight(split[1]);
                });
                function all_hide(){
                    $('.project_info>div>div:not(:first)').hide();
                }

                function project_show_and_highlight(hash_value){
                    all_hide();
                    var arr = ["profit_grid","investment_grid","detail","progress_grid","log_grid"];

                    if(jQuery.inArray(hash_value , arr ) >= 0){
                        $("#"+hash_value).css('display','block');
                        $('#projectSubmenu li').css("background-color", "#fff");
                        $(".manage_list .collapse").collapse("show");
                        $("#"+hash_value+"_link").parent().css("background-color", "#ddd");

                    }


                }
                $('#pageSubmenu li a').click(function(){

                    var url = $(this).attr('href');
                    var split = url.split("#");

                    show_and_highlight(split[1]);
                });
                function all_hide(){
                    $('.project_info>div>div:not(:first)').hide();
                }

                function show_and_highlight(hash_value){
                    all_hide();
                    var arr = ["loan_grid", "profit_dist_grid"];

                    if(jQuery.inArray(hash_value , arr ) >= 0){
                        $("#"+hash_value).css('display','block');
                        $('#pageSubmenu li').css("background-color", "#fff");
                        $(".manage_list .collapse").collapse("show");
                        $("#"+hash_value+"_link").parent().css("background-color", "#ddd");

                    }


                }


                $('#profit').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "fixedColumns": true,
                    "ajax": {
                        "url": "/project/profit/distribution/getdata/"+{{$id}}

                    },

                    "columns": [
                        {data: 'transaction_no', name: 'transaction_no'},
                        {data: 'lender_id', name: 'lender_id'},
                        {data: 'name', name: 'name'},
                        {data: 'investment', name: 'investment',render: $.fn.dataTable.render.number(',')},
                        {data: 'profit', name: 'profit', render: $.fn.dataTable.render.number(',')},
                        {data: 'total_revenue', name: 'total_revenue', render: $.fn.dataTable.render.number(',')},
                        {data: 'profit_distribution_percentage', name: 'profit_distribution_percentage'},
                        {data: 'profit_paid_date', name: 'profit_paid_date'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}




                    ]

                });

                $('#profit').hover(function(){
                    $('[data-toggle="tooltip"]').tooltip();

                });


                $('#project_invest').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "responsive": true,

                    "ajax": {
                        "url": "/projectinvestment/getdata/"+{{$id}}

                    },

                    "columns": [
                        {data: 'transaction_no', name: 'transaction_no'},
                        {data: 'code_no', name: 'code_no'},
                        {data: 'name', name: 'name'},
                        {data: 'investment_date', name: 'investment_date'},
                        {data: 'amount', name: 'amount',  render: $.fn.dataTable.render.number(',') },
                        {data: 'display_amount', name: 'display_amount', render: $.fn.dataTable.render.number(',')},
                        {data: 'investment_type', name: 'investment_type'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}




                    ]



                });
                $('#project_invest').hover(function(){
                    $('[data-toggle="tooltip"]').tooltip();

                });

                $('#project-progress').DataTable({
                    "processing": true,
                    "dom": 'lBfrtip',
                    "serverSide": true,
                    "responsive": true,

                    "ajax": {
                        "url": "/project/progress/"+{{$id}}

                    },

                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'percentage', name: 'percentage'},
                        {data: 'remark', name: 'remark'},
                        {data: 'progress_date', name: 'progress_date'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}





                    ],
                    "buttons": [

                        {
                            //extend: 'excel',
                            text:'<span class="fa fa-file-o"> </span>  Add Project Progress',
                            className : 'addnew',
                            action: function (e, dt, node, config)
                            {
                                window.location='/finance/project/progress/form';
                            }
                        }

                    ]


                });
                $('#project-progress').hover(function(){
                    $('[data-toggle="tooltip"]').tooltip();

                });

                $('#project-log').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "/project/log/{{"projects".$id}}",
                        "type":"GET"

                    },

                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'project_title', name: 'project_title'},
                        {data: 'message', name: 'message'},
                        {data: 'from', name: 'from'},
                        {data: 'to', name: 'to'},
                        {data: 'date', name: 'date'}





                    ]


                });






            });


        </script>


        @else
            <div id="content" class="">
                <div class="project_info" >
                    <div class="row">
                        <div class="col-md-12 ">
                            @include('p_info')
                        </div>
                    </div>
                </div>
            </div>

            </div>
    @include('layout.footer')
    <script src="{{asset('js/invest.js')}}"></script>


    @endif


    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });


        });
        $('#borrower').click(function(e) {
            e.preventDefault();

            $('#myModal').modal('show');



        });

    </script>





@endsection