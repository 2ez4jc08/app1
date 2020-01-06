<?php
namespace Mai;
require_once('AutoLoad.php');


new \Mai\AutoLoad(); 

class Load {

    protected $_config = [];

    public function __construct($config)
    {
        $this->_config = $config;
    }

    public function run()
    {
        $this->setDbConfig();
        $this->route();
    }

    public function setDbConfig()
    {
        if(isset($this->_config['db'])){
            Model::setDbConfig($this->_config['db']);
        }
    }

    public function route()
    {
        $moduleName = $this->_config['defaultModule'];
        $controllerName = $this->_config['defaultController'];
        $actionName = $this->_config['defaultAction'];
        $param = array();

        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $position = strpos($url, '?');
        $url = $position === false ? $url : substr($url, 0, $position);

        if($url){
            $urlArr = explode('/',$url);
            if($urlArr){
                $moduleName = $urlArr[0];
            }
            array_shift($urlArr);
            if($urlArr){
                 $controllerName = $urlArr[0];
            }
            array_shift($urlArr);
            if($urlArr){
                 $actionName = $urlArr[0];
            }
        }
        
        $controller = "\\App\\".ucfirst($moduleName)."\\Controllers\\".ucfirst($controllerName)."Controller";
        $resources_files = ["css", "js", "img", "imgs","image", "images", "node_modules"];
        $modulelower = strtolower($moduleName);
        
        if(in_array($modulelower, $resources_files)){
            $controller = "\\Mai\\ResourcesRoute";
            if(!class_exists($controller)){
                $this->sendError();
            }
            $dispatch = new $controller($moduleName, $controllerName, $actionName);
            call_user_func_array(array($dispatch, $actionName), $param);
        }else{
            if (!class_exists($controller)) {
                echo $controller;
                $this->sendError();
            }else{
                if (!method_exists($controller, $actionName)) {
                    $this->sendError();
                }else{
                    $dispatch = new $controller($moduleName, $controllerName, $actionName);
                    call_user_func_array(array($dispatch, $actionName), $param);
                }
            }
        }
        
       
    }

    public function sendError()
    {
        include('404.html');
    }

}