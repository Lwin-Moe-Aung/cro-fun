@extends('layout.master')
@section('title','List of Lenders')
@section('container')
 

  <div class="container-fluid" style="margin-bottom: 150px;margin-top:100px;">
        <div class="row" style="margin-top: 15px;">
        <div class="col-md-3">
                 @include('layout.lender_sidebar')
        </div>

            <div class="col-md-9" >
            <p class="title">Project Progress</p>
            <div class="row" >
            <div class="col-md-12 ">
                <div class="table-responsive finance" >
                    
                    <table id="users" class="table table-hover table-bordered" style="">
                        <thead>
                        <tr>
                                
                            <th>Project Title</th>
                            <th>Percentage</th>
                            <th>Attachement</th>
                            <th>Remark</th>
                            <th>progress_date</th>
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
                    "url": "/lender/progressData/"+{{$id}}

                },

                "columns": [

                    {data: 'project_title', name: 'project_title'},
                    {data: 'percentage', name: 'percentage'},
                    {data: 'attachment', name: 'attachment'},
                    {data: 'remark', name: 'remark'},
                    {data: 'progress_date', name: 'progress_date'},
                   
                    



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
