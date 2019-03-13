@if($role=='finance' || $role=='admin')

    <div>

        <div class="grid-heading" >
            Project Log Details
        </div>
            <div class="table-container" style="width: 100%;">
                <div class="table-responsive finance">

                    <table id="project-log" class="table table-hover table-bordered" style="width:100%">
                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Project Title</th>
                            <th>Message</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>

                        </tr>



                        </thead>
                    </table>

                </div>
            </div>
    </div>

@endif






