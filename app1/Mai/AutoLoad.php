<?php
namespace Mai;

class AutoLoad{

    public function __construct()
    {
        spl_autoload_register(__NAMESPACE__.'\AutoLoad::LoadMai');
    }
    
    public static function LoadMai( $classname )
    {
        $filename = realpath(APP_PATH) . DIRECTORY_SEPARATOR . str_replace('\\','/', $classname) . ".php";
        
        if(file_exists($filename)){
            require_once $filename;
        }
    }
}