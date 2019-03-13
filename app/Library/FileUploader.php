<?php
namespace App\Library;
use Illuminate\Support\Facades\File;
use Image;

class FileUploader
{
    private $data = [];

    private $newfilename = '';

    private $file = '';

    /*
    *  Set Variables
    */
    public function __set($name, $value)
    {       
        $this->data[$name] = $value;
    }
    /*
    *  Get Variables
    */
    public function __get($name)
    {
       
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }
    /*
    *  Get New File Name
    */
    public function getNewName()
    {
        return $this->newfilename;

    }
    /*
    *  Generate New File Name
    *  encrypt original name and current time using md5 
    */
    public function genereateNewName ()
    {
         $this->newfilename = md5($this->data["originalName"] .'_'. time()).'.'.$this->data["extension"];
         
    }
    /*
    *  Upload File
    */
    public function uploadFile()
    {
        try {

            $this->data["file"]->move($this->data["path"], $this->getNewName());

        } catch (Exception $e) {
            
        }     
    }
    /*
    *  Resize image using intervention and save thumbnail to defined folder
    */
    public function generateThumbnail()
    {
        try {
            Image::make($this->data["file"]->getRealPath())->resize($this->data["width"], $this->data["height"],function ($c) {
                $c->aspectRatio();
            })->save($this->data["thumb_path"].'/'.'thumb_'.$this->getNewName()); 

         } catch (Exception $e) {
            
        }        
    }
}