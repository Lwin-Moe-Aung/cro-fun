    @extends('layout.master')

    @section('container')


    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>

     <div class="container" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-wrapper">
                    <div class="form-header"><h4 class="text-center">{{isset($page)?'Update Page':'Add Page'}}</h4></div>

                    <div class="form-body">

                        @if(session('status'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('status')}}</strong>
                            </div>
                        @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('error')}}</strong>
                                </div>
                            @endif


                        <form class="form-horizontal" name = "route_registration" method="post" @if(isset($page)) action="{{url('pages/edit', $page['data']['id'])}}" @else action="{{url('pages')}}" @endif>
                            {{csrf_field()}}
                            

                            <div class="form-group">
                                    <label for="title" class="col-sm-12">Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="title" value="{{isset($page)?$page['data']['title']:''}}">
                                    </div>
                         </div>

                        <div class="form-group">
                                <label for="description" class="col-sm-12 ">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" id="description" >@if(isset($page)){{trim($page['data']['description'])}}@endif</textarea>
                                </div>
                         </div>

                          <div class="form-group">
                                    <label for="route" class="col-sm-12">URL</label>
                                   <div class="col-sm-4">
                                       <label style="margin-top:6px;">{{url('/pages/').'/'}}</label>
                                   </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="route" id = "route" value="{{isset($page)?$page['data']['route']:''}}">
                                    </div>
                         </div>


                         <div class="form-group">
                          <div class="col-sm-12">
                         <button type="submit" name="submit" class="btn btn-primary">
                             @if(isset($page))
                                 Update
                                 @else
                                 Save
                             @endif
                         </button>
                              <a class="btn btn-default" href="{{url('finance/page')}}">Cancel
                              </a>
                         </div>
                         </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

        @include('layout.footer')
        <script src="{{asset('js/page.js')}}"></script>
        <script type="text/javascript">
        	
        	CKEDITOR.replace( 'description' );

        </script>


    @endsection