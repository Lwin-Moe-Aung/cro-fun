Dropzone.autoDiscover = false;

var default_config = {
    url : '/upload/file',
    acceptedFiles : '.jpg, .png, .jpeg, .gif',
    maxFiles : 1 ,
    acceptedFiles : 1 ,
    addRemoveLinks: true,
    dictRemoveFile : 'Remove',
    dictDefaultMessage : 'Drap and Drop Project File',
    maxFilesize : 1 ,
    dictInvalidFileType : 'This Form only accepts File',
    dictFileTooBig : "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
    dictResponseError : "Server responded with {{statusCode}} code.",
    dictMaxFilesExceeded : "You can not upload any more files.",
    createImageThumbnails : false,
    X_CSRF_Token : $('input[name="_token"]').val()

};

 $(document).ready(function() {
    

	(function($){   
	   $.fn.fileuploader_load=function(config){       
	   		var dropzone_element = $(this);
            var id = $(this).attr('id');

	      	$(this).dropzone({

                url: config.url ? config.url : default_config.url,
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                maxFiles : config.maxFiles ? config.maxFiles : default_config.maxFiles,
                acceptedFiles : config.acceptedFiles ? config.acceptedFiles : default_config.acceptedFiles,
                dictInvalidFileType : config.dictInvalidFileType ? config.dictInvalidFileType : default_config.dictInvalidFileType,
                addRemoveLinks : config.addRemoveLinks ? config.addRemoveLinks : default_config.addRemoveLinks,
                dictRemoveFile : config.dictRemoveFile ? config.dictRemoveFile : default_config.dictRemoveFile,               
                dictDefaultMessage : config.dictDefaultMessage ? config.dictDefaultMessage : default_config.dictDefaultMessage,
                maxFilesize : config.maxFilesize ? config.maxFilesize : default_config.maxFilesize,
                dictFileTooBig : config.dictFileTooBig ? config.dictFileTooBig : default_config.dictFileTooBig,
                createImageThumbnails : config.createImageThumbnails ? config.createImageThumbnails : default_config.createImageThumbnails,
                dictResponseError : config.dictResponseError ? config.dictResponseError : default_config.dictResponseError,
                dictMaxFilesExceeded : config.dictMaxFilesExceeded ? config.dictMaxFilesExceeded : default_config.dictMaxFilesExceeded,
                init: function () {



                    // For remark
                    var remark = "Remarks:<br/><ul>";
                    remark += '<li>File type must be '+config.acceptedFiles+ '.</li>';
                    remark += '<li>File size must be smaller than '+config.maxFilesize+ 'MB.</li>';
                    remark += '</ul>';
                    dropzone_element.nextAll('.remark').html(remark);

                    this.on("success", function (file, response) {

                        // For Preview Image, Link & Set Value
                        var path;
                        //console.log(file.type);
                        if(file.type=="image/png" || file.type=="image/jpg" || file.type=="image/jpeg")
                        {
                            //if(file.type)
                            path = "/uploads/Images/" + response;
                            dropzone_element.next().attr('value',response);
                            $('.'+id+'-preview').attr('src',path);
                            $('.'+id+'-preview').parent().attr('href',path);
                            $( '.'+id +'-preview #zip').text('');



                        }
                        else
                        {
                            path="/uploads/Pdf/"+response;
                            $('#zip').text(response);
                            $('#zip').parent().attr('href',path);
                            dropzone_element.next().attr('value',response);
                            $('.'+id+'-preview').attr('src',"");
                            $('.'+id+'-preview').parent().attr('href',"");
                            //dropzone_element.next().attr('value',response);
                            //$('.'+id+'-preview').attr('src',path);
                            //$('.'+id+'-preview').parent().attr('href',path);

                        }

                        //$('#zip').text('');




                        //Hide Modal
                        $('#'+id+'-Modal').modal('hide');

                    });

                    this.on("maxfilesexceeded",function(file){
                       this.removeAllFiles();
                       this.addFile(file);
                   });                 
                },
               
             });
       
       }
    })(jQuery);
});