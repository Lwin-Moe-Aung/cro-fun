@extends('layout.master')
@section('title','List of Lenders')
@section('container')
 
 

    <div class="container" style="margin-bottom: 150px;">
        <div class="row" style="margin-top:15px">
            <h3 class="text-center">Borrower's Projects Listing</h3>
           
            <div class="col-md-12">
           

                <div class="table-responsive finance" >
                    
                    <table id="users" class="table table-hover table-bordered" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Code No</th>
                            <th>Project Title</th>
                            <th>Loan Value</th>
                            <th>Return Estimation Proposed</th>
                            <th>Return Estimation Approved</th>
                            <th>Investment Amount</th>
                            
                        </tr>
                        </thead>
                    </table>
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
                    "url": "/borrowerData/"+{{$id}}

                },


                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'code_no', name: 'code_no'},
                    {data: 'project_title', name: 'project_title'},
                    {data: 'loan_value', name: 'loan_value'},
                    {data: 'return_estimation_proposed', name: 'return_estimation_proposed'},
                    {data: 'return_estimation_approved', name: 'return_estimation_approved'},
                    {data: 'totalinvest', name: 'totalinvest'},
                    



                ],
                "buttons": [
                   {
                       //extend: 'excel',
                       text: '<span class="fa fa-file-excel-o"></span> Excel Export',
                       action: function (e, dt, node, config)
                       {
                            var filename = "export_"+new Date().getTime()+".xls";
                            var data = $('#users').DataTable().ajax.params();
                            data.length = -1 ;
                            data.filename =  filename;
                           $.ajax({
                              method: "GET",
                              url: "/borrowerData/"+{{$id}}+"?"+$.param(data),
                              
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
               ]

            });
        });


    </script>




@endsection
