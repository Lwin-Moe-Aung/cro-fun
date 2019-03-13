@extends('layout.master')
@section('title','List of Lenders')
@section('container')

    <div class="container-fluid" style="margin-bottom: 150px;">
        <h3 class="text-center" style="margin-top:100px;">Finance Dashboard</h3>
        <div class="row">
            <div class="col-md-3">
                @include('layout.left_sidebar')
            </div>
            <div class="col-md-9">

                <div class="table-responsive finance" >
                    <table id="users" class="table table-hover table-bordered" style="">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Project Title</th>
                            <th>User Name</th>
                            <th>Investment Date</th>
                            <th>Amount</th>
                            <th>Display Amount</th>
                            <th>Transaction No</th>
                            <th>Investment Type</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                    </table>

                </div>

            </div>
        </div>
    </div>



    @include('layout.footer')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/investments/getdata"

                },

                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'project_title', name: 'project_title'},
                    {data: 'name', name: 'name'},
                    {data: 'investment_date', name: 'investment_date'},
                    {data: 'amount', name: 'amount'},
                    {data: 'display_amount', name: 'display_amount'},
                    {data: 'transaction_no', name: 'transaction_no'},
                    {data: 'investment_type', name: 'investment_type'},
                    {data: 'status', name: 'status'}



                ]

            });
        });


    </script>




@endsection
