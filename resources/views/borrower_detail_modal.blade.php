<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Borrower Info</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td>
                            <div class="test">
                                <a href="{{asset('uploads/Images/'.$project['data'][0]['photo'])}}" target="_blank">
                                    <img src="{{asset('uploads/Images/'.$project['data'][0]['photo'])}}" onerror="this.onerror=null;this.src='{{asset('uploads/Images/download.png')}}';" class="img-rounded" alt="" width="190" height="170">
                                </a>
                            </div>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                        <td>: {{$project['data'][0]['name']}}</td>
                    </tr>
                    <tr>
                        <td><label>NRC</label></td>
                        <td>: {{$project['data'][0]['nrc']}}</td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td>: {{$project['data'][0]['email']}}</td>
                    </tr>
                    <tr>
                        <td><label>Phone No</label></td>
                        <td>: {{$project['data'][0]['phone_no']}}</td>
                    </tr>
                    <tr>
                        <td><label>State</label></td>
                        <td>: {{$project['data'][0]['state']}}</td>
                    </tr>
                    <tr>
                        <td><label>Township</label></td>
                        <td>: {{$project['data'][0]['township']}}</td>
                    </tr>
                    <tr>
                        <td><label>Address</label></td>
                        <td>: {{$project['data'][0]['address']}}</td>
                    </tr>
                    <tr>
                        <td><label>Point</label></td>
                        <td>: {{$project['data'][0]['points']}}</td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
