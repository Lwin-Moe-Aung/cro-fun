
          <div class="grid-heading">
           Project Status Update By Finance
          </div>
          <br>
          <form class="form-horizontal" method="post" id="project_status_finance"  name="project_status_finance" action="{{url('projects/update')}}">
            {{csrf_field()}}
            <div class="form-group">
              <label for="return_estimation_approved" class="col-sm-4 control-label">Return estimation (Approved) :</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" required name="return_estimation_approved" id="return_estimation_approved"
                                   @if($project['data'][0]['return_estimation_approved']!=0)value="{{$project['data'][0]['return_estimation_approved']}}" @endif placeholder="Return Estimation">
              </div>
            </div>
            <div class="form-group">
              <label for="collateral_estimated_value"  class="col-sm-4 control-label">Collateral Estimate Value :</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" required name="collateral_estimated_value" id="collateral_estimated_value" value="{{$project['data'][0]['collateral_estimated_value']}}" placeholder="Collateral Estimate Value">
              </div>
            </div>
            <div class="form-group">
              <label for="profit_sharing_estimation" class="col-sm-4 control-label">Profit Sharing Estimation %:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" required @if($project['data'][0]['profit_sharing_estimation']!=0.00) value="{{$project['data'][0]['profit_sharing_estimation']}}" @endif name="profit_sharing_estimation" id="profit_sharing_estimation" placeholder="Profit Sharing Estimation">
              </div>
            </div>
            <div class="form-group">
              <label for="profit_sharing_description" class="col-sm-4 control-label">Profit Sharing Description:</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="5" required id="profit_sharing_description" name="profit_sharing_description">{{$project['data'][0]['profit_sharing_description']}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="gender" class="col-sm-4 control-label">Project Risk :</label>
              <div class="col-sm-6">
                <label class="radio-inline">
                <input type="radio" name="project_risk" required id="project_risk" value="low" checked>
                Low</label>
                <label class="radio-inline">
                <input type="radio" name="project_risk" id="project_risk" value="moderate"
                                         @if($project['data'][0]['project_risk']=='moderate')
                                             checked @endif
                                         >
                Moderate</label>
                <label class="radio-inline">
                <input type="radio" name="project_risk" required id="project_risk" value="high"
                                          @if($project['data'][0]['project_risk']=='high')
                                          checked @endif
                                         >
                High</label>
              </div>
            </div>
            <div class="form-group">
              <label for="project_grade" class="col-sm-4 control-label">Project Grade:</label>
              <div class="col-sm-6">
                <label class="radio-inline">
                <input type="radio" name="project_grade" required id="project_grade" value="a" checked>
                A</label>
                <label class="radio-inline">
                <input type="radio" name="project_grade"  required id="project_grade" value="b"
                                       @if($project['data'][0]['project_grade']=='b')
                                       checked @endif
                                     >
                B</label>
                <label class="radio-inline">
                <input type="radio" name="project_grade" required id="project_grade" value="c"
                                       @if($project['data'][0]['project_grade']=='c')
                                       checked @endif
                                     >
                C</label>
                <label class="radio-inline">
                <input type="radio" name="project_grade" required id="project_grade" value="d"
                                       @if($project['data'][0]['project_grade']=='d')
                                       checked @endif
                                     >
                D</label>
                <label class="radio-inline">
                <input type="radio" name="project_grade" required id="project_grade" value="e"
                                         @if($project['data'][0]['project_grade']=='e')
                                          checked @endif
                                     >
                E</label>
              </div>
            </div>
            <div class="form-group">
              <label for="collateral_evidence" class="col-sm-4 control-label">Project Status:</label>
              <div class="col-sm-6">
                <select name="status" class="form-control" required>
                  <option value="">Select.......</option>
                  <option value="draft"
                                             @if($project['data'][0]['status']=='draft')
                                             selected @endif
                                     >Draft</option>
                  <option value="open_for_funding"
                                             @if($project['data'][0]['status']=='open_for_funding')
                                             selected @endif>Open for funding</option>
                  <option value="unfunded"
                                             @if($project['data'][0]['status']=='unfunded')
                                             selected @endif
                                     >Unfunded</option>
                  <option value="fully_funded"
                                             @if($project['data'][0]['status']=='fully_funded')
                                     selected @endif>Fully funded</option>
                  <option value="project_on_going"
                                             @if($project['data'][0]['status']=='project_on_going')
                                             selected @endif
                                     >Project on going</option>
                  <option value="harvesting_period"
                                             @if($project['data'][0]['status']=='harvesting_period')
                                             selected @endif
                                     >Harvesting period</option>
                  <option value="close_finished"
                                             @if($project['data'][0]['status']=='close_finished')
                                             selected @endif
                                     >Close Finished</option>
                  <option value="late_payment_status"
                                             @if($project['data'][0]['status']=='late_payment_status')
                                             selected @endif
                                     >Late payment status</option>
                  <option value="close_cancelled"
                                             @if($project['data'][0]['status']=='close_cancelled')
                                             selected @endif
                                     >Close Cancelled</option>
                  <option value="close_defaulted"
                                             @if($project['data'][0]['status']=='close_defaulted')
                                             selected @endif
                                     >Close Defaulted</option>
                </select>
              </div>
            </div>

            <br>
            <div class="form-group">
              <label for="comment" class="col-sm-4 control-label">Project Comment:</label>
              <div class="col-sm-6">
                  <textarea class="form-control" rows="5" required id="comment" name="comment">{{$project['data'][0]['comment']}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <input type="hidden" class="form-control" name="id" value="{{$project['data'][0]['id']}}">
              </div>
            </div>

            <div class="form-group">
              <label for="featured" class="col-sm-4 control-label">Featured:</label>
              <div class="col-sm-6">
                <label class="radio-inline">
                <input type="radio" name="featured" required id="featured" value="1" @if($project['data'][0]['featured']==1)
                                       checked @endif>
                Yes
                </label>
                <label class="radio-inline">
                <input type="radio" name="featured"  required id="featured" value="0"
                                       @if($project['data'][0]['featured']==0)
                                       checked @endif
                                     >
                No</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <button  class="btn btn-primary pull-right" >Update</button>
              </div>
              <a class="btn btn-default" href="{{url('projects/info/'.$project['data'][0]['id'])."#detail"}}">Cancel</a>
            </div>

          </form>

