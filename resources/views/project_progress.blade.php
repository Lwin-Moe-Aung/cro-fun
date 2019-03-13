@extends('layout.master')
@section('container')
<div class="container" style="">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif
            <div class="form-wrapper">
                <div class="form-header">
                    <h4 class="text-center">Project Progress</h4>
                </div>
                <div class="form-body">
                    <form class="form-horizontal" method="post" id="project_progress"  name="project_progress" action="{{url('finance/project/progress/form')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="percentage" class="col-sm-4 control-label">Percentage % :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="percentage" id="percentage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="attachment" class="col-sm-4 control-label">Attachment :</label>
                            <div class="col-sm-6">
                                @include('fileupload.dropzoneImg', array( 'dropzone_id' => 'real-dropzone4', 'photo_value' => 'attachment' ))
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remark" class="col-sm-4 control-label">Remark :</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" required name="remark" id="remark"></textarea>
                                <input type="hidden" class="form-control" required name="project_id" id="project_id" value="{{session('project_id')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="progress_date" class="col-sm-4 control-label">Date:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="progress_date" id="progress_date" placeholder="Select Date">
                            </div>
                        </div>

                        <div class="form-group text-center ">
                           
                                <button type="submit" name="submit" class="btn btn-primary" >Insert</button>
                                 <a class="btn btn-default" href="{{url('projects/info/'.session('project_id')."#progress_grid")}}">Cancel</a>
                                 </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('layout.footer')
    @include('layout.form_script')
    <script src="{{asset('js/project_progress.js')}}"></script>




@endsection