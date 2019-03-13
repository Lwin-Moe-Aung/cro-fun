@extends('layout.master')
@section('title','List of Lenders')
@section('container')
 


    <div class="container-fluid" style="margin-bottom: 150px;margin-top:100px;">
        <div class="row" style="margin-top:15px">
            <div class="col-md-3">
                @include('layout.left_sidebar')
            </div>
            <div class="col-md-9">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissable" style="text-align: center;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('status')}}</strong>
                    </div>
                @endif
                    <p class="title">Lenders Listing</p>
                    <br>
                <div class="table-responsive finance" >
                    
                    <table id="users" class="table table-hover table-bordered" style="">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Code No</th>
                            <th>Name</th>
                            <th>NRC</th>
                            <th>DOB</th>
                            <th>State</th>
                            <th>Township</th>
                            <th>Address</th>
                            <th>Action</th>



                        </tr>
                        </thead>
                    </table>

                </div>

            </div>
        </div>
    </div>



    @include('layout.footer')
     <script type="text/javascript" src="{{asset('js/left_sidebar.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           var user= $('#users').DataTable({

                "processing": true,
                "dom": 'lBfrtip',
                "serverSide": true,
                "ajax": {
                    "url": "/lenders/getdata"

                },



                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'code_no', name: 'code_no'},
                    {data: 'name', name: 'name'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'dob', name: 'dob'},
                    {data: 'state', name: 'state'},
                    {data: 'township', name: 'township'},
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,"width":"100px"}



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
                              url: "/lenders/getdata?"+$.param(data),
                              
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
           $('#users').hover(function(){
                   $('[data-toggle="tooltip"]').tooltip();

               });

            $(document).delegate('.btn-warning', 'click', function(e) {

                e.preventDefault();

                if (confirm("Do you really want to delete this lender's record")) {
                    var url= $(this).attr('href');
                    var parent = $(this).parent().parent();
                    $.ajax({
                        method: "GET",
                        url:url

                    }).success(function(data) {

                        //parent.fadeOut('slow', function() {$(this).remove();});
                        if(data)
                        {
                            alert(data);
                        }
                        else {
                            parent.fadeOut('slow', function () {
                                $(this).remove();
                                user.ajax.reload();
                            });
                        }

                    });

                }


            });
        });


    </script>




@endsection
