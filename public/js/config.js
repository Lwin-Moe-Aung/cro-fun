$(document).ready(function() {       
   
    $("div#real-dropzone1").fileuploader_load({                                              
                                                acceptedFiles : '.pdf',                                                

                                                dictDefaultMessage : 'Drap and Drop Project File'
                                            });

    $("div#real-dropzone2").fileuploader_load({                                               
                                                acceptedFiles : '.jpg, .png, .svc,.jpeg',
                                                createImageThumbnails : true,
                                                dictDefaultMessage : 'Drap and Drop Image',
                                                maxFilesize: 10,
                                                dictFileTooBig : "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB."


    });

                                                


    $("div#real-dropzone3").fileuploader_load({
                                                acceptedFiles : '.zip,.jpg,.png,.jpeg',
                                                createImageThumbnails : true,
                                                dictDefaultMessage : 'Drag and Drop Image',
                                                maxFilesize: 10,
                                                dictFileTooBig : "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB."

    });
    $("div#real-dropzone4").fileuploader_load({
                                                acceptedFiles : '.zip',
                                                createImageThumbnails : true,
                                                dictDefaultMessage : 'Drag and Drop Zip',
                                                maxFilesize: 10,
                                                dictFileTooBig : "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB."

    });

   
 
    $("div#real-dropzone5").fileuploader_load({
                                                acceptedFiles : '.jpg, .png, .jpeg',
                                                createImageThumbnails : true,
                                                dictDefaultMessage : 'Drag and Drop Image',
                                                maxFilesize: 2,
                                                dictFileTooBig : "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB."

                                            });


});