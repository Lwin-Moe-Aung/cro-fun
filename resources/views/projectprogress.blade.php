@if($role=='finance' || $role=='admin')

                <div>

                    <div class="grid-heading" >
                        Project Progress
                    </div>

                    <div class="table-container" style="width: 100%;">
                        <div class="table-responsive finance" >
                            <table id="project-progress" class="table table-hover table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Percentage %</th>
                                        <th>Remark</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>

                </div>

@endif