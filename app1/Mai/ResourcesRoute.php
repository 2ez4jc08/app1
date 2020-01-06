<?php

namespace Mai;
use Mai\Controller;

class ResourcesRoute extends Controller{
    
    public function index()
    {
        parent::__construct($this->_module,$this->_controller,$this->_action);
        list($path) = explode('?',$_SERVER['REQUEST_URI']);

        $pathinfo = pathinfo($path);

        $filename = APP_PATH . DIRECTORY_SEPARATOR .'Public'. DIRECTORY_SEPARATOR ."$path";
        $img_files = ["jpg", "gif","png", "jpeg"];
        
        if(!file_exists($filename))
        {
            echo $filename;
            exit("404 Not Found");
        }
        else if(strtolower($pathinfo['extension'])=="css")
		{
			header('Content-Type:text/css;charset=utf-8');
        }
        else if(strtolower($pathinfo['extension'])=="js")
		{
			header('Content-Type:text/javascript;charset=utf-8');
        }
        else if(in_array(strtolower($pathinfo['extension']), $img_files))
        {
			header('Content-Type:image/png;');
        }

        $max = time();
		$interval = 60 * 60 * 6; // 6 hours
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Pragma: public");
		header("Last-Modified: " . gmdate ('r', $max));
        header("Expires: " . gmdate ("r", ($max + $interval)));
         
        readfile($filename);
    }

}

