<?php
namespace Mai;
require_once './lib/Twig/vendor/autoload.php';

    
class Controller{
    
    protected $_module;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $loader;
    protected $twig;
    
    public function __construct($module, $controller, $action)
    {
        $this->_module = strtolower($module);
        $this->_controller = strtolower($controller);
        $this->_action = strtolower($action);
        $this->_view = new View($module, $controller, $action);
        $this->loader = new \Twig\Loader\FilesystemLoader('./App');
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function checkSession($status){
        if($status === 1){
            $curtime = time();
            if($curtime > $_SESSION['expire']){
                header("Location: admin");
                session_destroy();
            }else{
                header("Location: index");
            }
        }
    }

    public function setSession($sessioname, $expirationtime){
        $_SESSION['userid'] = $sessioname;
        $_SESSION['expire'] = time() + $expirationtime;
    }
    

}