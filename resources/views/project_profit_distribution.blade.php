@if($role=='finance' || $role=='admin')
                 <div>
                    <div class="grid-heading">
                       Profit Distributions to Lenders
                    </div>

                    <div class="table-container" >
                     <div class="table-responsive finance">
                            <table id="profit" class="table table-hover table-bordered" 
                            style="width:100%;font-size:14px;">
                                <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Lender ID</th>
                                    <th>Name</th>
                                    <th>Investment</th>
                                    <th>Profit</th>
                                    <th>Revenue</th>
                                    <th>Profit %</th>
                                    <th>Profit Paid Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

@endif