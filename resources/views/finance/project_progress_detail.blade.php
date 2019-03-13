

@extends('layout.master')
@section('container')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper" >

                    <div class="form-header"><h4>Project Progress Detail</h4></div>

                    <div class="form-body">


                            <table class="table table-striped" style="font-size:14px;">

                                <tr>
                                    <td><label>Project Title</label></td>
                                    <td>: {{$progress['data'][0]['project_title']}} </td>

                                </tr>
                                <tr>
                                    <td><label>Project Progressed Percentage</label></td>
                                    <td>: {{$progress['data'][0]['percentage']}} %</td>

                                </tr>
                                <tr>
                                    <td><label>Project Progressed Remark</label></td>
                                    <td>: {{$progress['data'][0]['remark']}}</td>

                                </tr>
                                <tr>
                                    <td><label>Project Progressed Date</label></td>
                                    <td>: {{$progress['data'][0]['progress_date']}}</td>

                                </tr>
                                <tr>
                                    <td><label>Attachment</label></td>
                                    <td>:
                                            @if($progress['data'][0]['attachment'])
                                            <a href="{{asset('uploads/Pdf/'.$progress['data'][0]['attachment'])}}" download>Download</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                </tr>








                            </table>
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-7">
                                    <a class="btn btn-default" href="{{url('projects/info/'.session('project_id')."#progress_grid")}}">Back</a>

                                </div>
                            </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layout.footer')
    <script src="{{asset('js/lender_account_verified.js')}}"></script>
@endsection


