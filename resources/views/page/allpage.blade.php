@extends('layout.master')
@section('title','List of Pages')
@section('container')

    <div class="container-fluid" style="position:relative;  margin-bottom: 150px;margin-top:100px;">
        <div class="row" style="margin-top: 15px;">
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
                    <p class="title">CMS Pages Listing</p>
                    <br>
                <div class="table-responsive finance"  >
                    <table id="users" class="table table-hover table-bordered" >
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                           
                            <th>Url</th>
                            <th>Action</th>




                        </tr>
                        </thead>
                    </table>



                </div>

            </div>
        </div>
    </div>

   <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 85%">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Page Preview</h4>
          </div>
          <div class="modal-body" style="height: 500px">
            <iframe id="frame" src="" width="100%" height="100%">
            </iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 50%;">Close</button>
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
                    "url": "/pageData"

                },

                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                   
                    {data: 'route', name: 'route'},
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
                                url: "/pageData?"+$.param(data),

                            })
                                .done(function( msg ) {
                                    window.location = '/storage/export/'+filename;
                                });
                        }
                    },
                     {
                        //extend: 'excel',
                        text: '<span class="fa fa-file-o"></span> Add New Page',
                        className : 'addnew',
                        action: function (e, dt, node, config)
                        {
                        window.location='/pages';
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
            $(document).delegate('.cms-preview', 'click', function(e) {
                    url = $(this).parent().prev().text();

                    $('#myModal').modal('show');

                    $("#frame").attr("src", url);
            });

            $(document).delegate('.btn-warning', 'click', function(e) {
                e.preventDefault();

                if (confirm("Do you really want to delete this page's record")) {
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
