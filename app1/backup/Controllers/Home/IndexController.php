<?php 
namespace App\Controllers\Home;

use Mai\Controller;

class IndexController extends Controller{

    public function Index()
    {
        $host = $_SERVER['HTTP_HOST'];
        $filename = APP_PATH . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $host . DIRECTORY_SEPARATOR . "index.php";
        if(!file_exists($filename)){
            exit("wala");
        }
        
        readfile($filename);
    }
    
    
}