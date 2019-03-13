@extends('../layout.master')
@section('container')
<div class="container" style="min-height:100%;margin-top:70px;">
  <h3 class="text-center">Lists of Borrowers</h3>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive" style="margin-bottom:100px;">
        <table id="users" class="table table-hover table-bordered" style="">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>NRC</th>
              <th>DOB</th>
              <th>State</th>
              <th>Township</th>
              <th>Address</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@include('layout/footer')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "borrowerData"

                },

                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'dob', name: 'dob'},
                    {data: 'state', name: 'state'},
                    {data: 'township', name: 'township'},
                    {data: 'address', name: 'address'}



                ]

            });
        });


    </script>

@endsection 