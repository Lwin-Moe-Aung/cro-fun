@extends('layout.master')
@section('title','My Investment')
@section('container')
 


    <div class="container-fluid" style="margin-top:120px;" >

        <div class="row" >
            <div class="col-md-3">
                <div class="vertical-menu" style="width:100%;">
                    <a href="{{url('lender/profile')}}" >Dashboard</a>
                    <a href="{{url('profile')}}">Profile</a>
                    <a href="{{url('lender/my-investments/'.session('current')['id'])}}">My Investments</a>
                    <a href="{{url('/logout')}}">Sign Out</a>
                </div>
            </div>
            <div class="col-md-9">
                <p class="title">Lender's Investments Listing</p>

                <div class="table-responsive finance" >
                    
                    <table id="users" class="table table-hover table-bordered" style="">
                        <thead>
                        <tr>
                           
                            <th>Project Title</th>
                            <th>Category Title</th>
                            <th>Transaction No</th>
                            <th>Investment Date</th>
                            <th>Amount</th>
                            <th>Profit Estimation</th>
                            <th>Profit Percentage</th>
                            <th>Status</th>
                           

                        </tr>
                        </thead>
                    </table>

                </div>
                </div>
                </div>

            </div>
        </div>
        <br>
        <a class="btn btn-default pull-right" href="{{url('/')}}">Back</a>
    </div>


    @include('layout.footer')
     <script type="text/javascript" src="{{asset('js/left_sidebar.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('js/left_sidebar.js') }}"></script>
   
    <script type="text/javascript">
        $(document).ready(function() {
            var user = $('#users').DataTable({
                "processing": true,
                "dom": 'lBfrtip',
                "serverSide": true,
                "ajax": {
                    "url": "/lenders/getdata/"+{{$id}}

                },

                "columns": [ 
                    {data: 'project_title', name: 'project_title'},
                    {data: 'title', name: 'title'},
                    {data: 'transaction_no', name: 'transaction_no'},
                    {data: 'investment_date', name: 'investment_date'},
                    {data: 'amount', name: 'amount', render: $.fn.dataTable.render.number(',')},
                    {data: 'profit_estimation', name: 'profit_estimation'},
                    {data: 'profit_percentage', name: 'profit_percentage'},
                    {data: 'status', name: 'status'},
                    



                ],

                  "buttons": [
                    {
                       // extend: 'excel',
                        text: ' <span class="fa fa-file-excel-o"></span>Excel Export',
                        action: function (e, dt, node, config)
                        {


                            var filename = "export_"+new Date().getTime()+".xls";
                            var data = $('#users').DataTable().ajax.params();
                            data.length = -1 ;
                            data.filename =  filename;

                            $.ajax({
                                method: "GET",
                                url: "/lenders/getdata/"+{{$id}}+"?"+$.param(data),

                            })
                                .done(function( msg ) {

                                    window.location = '/storage/export/'+filename;
                                });
                        }
                    },
                    {
                        //extend: 'excel',
                        text: '<span class="fa fa-refresh"></span> Refresh',
                        className : 'addnew',
                        action: function (e, dt, node, config)
                        {
                            user.ajax.reload();
                        }
                    }
                ],
            });
        });
                
         

    </script>




@endsection
