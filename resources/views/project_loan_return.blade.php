@if($role=='finance' || $role=='admin')

    <div>

        <div class="grid-heading">
            Project Loan Returns
        </div>

        <div class="table-container">
            <div class="table-responsive finance" >
                <table id="project_loan_return" class="table table-hover table-bordered" style="width: 100%;">
                    <thead>

                    <tr>
                        <th>Transaction ID</th>
                        <th>Project Title</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Remark</th>
                    </tr>

                    </thead>
                </table>

            </div>
        </div>

    </div>

@endif