@extends('layout.master')
@section('title','List of Lenders')
@section('container')
 

  <div class="container-fluid" style="margin-bottom: 150px;margin-top:100px;">
        <div class="row" style="margin-top: 15px;">
        <div class="col-md-3">
                 @include('layout.lender_sidebar')
        </div>

            <div class="col-md-9" >
            <p class="title">Available Revenue</p>
            <div class="row" >
            <div class="col-md-12 ">
                <div class="table-responsive finance" >
                    
                    <table id="users" class="table table-hover table-bordered" style="">
                        <thead>
                        <tr>
                                
                            <th>Project Title</th>
                            <th>Investment Amount</th>
                           <th>Profit </th>
                            <th>Revenue</th>
                             <th>Profit Distribution Percentage</th>
                             <th>Profit Paid Date</th>
                            

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

   
    <script type="text/javascript">
        $(document).ready(function() {
            var user = $('#users').DataTable({
                "processing": true,
                "dom": 'lBfrtip',
                "serverSide": true,
                "ajax": {
                    "url": "/lender/revenueData/"+{{$id}}

                },

                "columns": [

                    {data: 'project_title', name: 'project_title'},
                    {data: 'investment_amount', name: 'investment_amount', render: $.fn.dataTable.render.number(',')},
                    {data: 'profit', name: 'profit', render: $.fn.dataTable.render.number(',')},
                    {data: 'revenue', name: 'revenue', render: $.fn.dataTable.render.number(',')},
                    {data: 'profit_distribution_percentage', name: 'profit_distribution_percentage'},
                    {data: 'profit_paid_date', name: 'profit_paid_date'},
                    



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
                                url: "/lender/profitData/"+{{$id}}+"?"+$.param(data),

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
