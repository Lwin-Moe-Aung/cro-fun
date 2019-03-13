<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Library\FileUploader;

class FileController extends Controller
{
    /*
    *  Upload file and generate thumbnail if option is on
    *  @params $file
    *  @return filename
    */
    public function uploadFile(Request $request)
    {        
        try {
            $file = $request->file('file'); 

            // build obj 
            $obj = new FileUploader;

            // set variables
            $obj->file = $file;
            $obj->mimetype = $file->getClientMimeType();
            $obj->extension = $file->getClientOriginalExtension();
            $obj->originalName = $file->getClientOriginalName();        
            
            $explode_mime = explode('/', $obj->mimetype);  

            //define path (image or pdf ) based on mimetype
            $obj->path = $explode_mime[0] == 'image' ?  config('fileupload.file.image_path') :  config('fileupload.file.pdf_path');

            // generate new filename
            $obj->genereateNewName();
           
            // generate thumbnail
            if(env('GENERATE_THUMBNAIL') == 1 && $explode_mime[0] == config('fileupload.file.default_image_text')){

                $obj->thumb_path = config('fileupload.file.thumb_path');
                $obj->width = config('fileupload.file.thumb_width');
                $obj->height = config('fileupload.file.thumb_height');
                $obj->generateThumbnail();

             }

             // upload file
             $obj->uploadFile();  

             return $obj->getNewName();

        } catch (Exception $e) {

             return false;
        }       
    }
}
