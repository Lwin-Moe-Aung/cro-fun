@if($role=='finance' || $role=='admin')

                <div>

                    <div class="grid-heading">
                        Project Investments
                    </div>

                    <div class="table-container">
                        <div class="table-responsive finance" >
                            <table id="project_invest" class="table table-hover table-bordered" style="">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Lender ID</th>
                                        <th>User Name</th>
                                        <th>Investment Date</th>
                                        <th>Amount</th>
                                        <th>Display Amount</th>
                                        <th>Investment Type</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>

                </div>

@endif