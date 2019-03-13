  <html>
      <head>
          <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
          <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script src="{{ asset('js/dropzone/dropzone.js') }}"></script>
          <script src="{{ asset('js/dropzone/bind.js') }}"></script>
          <script src="{{ asset('js/config.js') }}"></script>
         
      <body>
          <div class="container" style="margin-top: 40px;">
              <div class="row">
                  <div class="col-md-6 col-md-offset-3">


                  <form action="/proj/store" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="form-group">
                          <legend class="text-center">Add Project</legend>
                        </div>

                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                        <label for="photo">Upload  Photo</label>
                        <div class="dropzone dropzone-previews" id="real-dropzone2"></div>
                        <input type="hidden" name="photo" id="photo"> 

                        <label for="nrc">Nrc</label>
                        <input type="text" name="nrc" class="form-control">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" name="dob" class="form-control">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control">
                        <label for="pdf">Project File Upload</label>
                        <div class="dropzone dropzone-previews" id="real-dropzone1"></div>
                        <input type="hidden" name="pdf" id="pdf">

                        <div class="form-group">
                            <input type="submit" value="submit" class="form-control btn btn-primary" >
                        </div>
                      </form>
                      
                  </div>
              </div>
          </div>
      </body>
  
  </html>