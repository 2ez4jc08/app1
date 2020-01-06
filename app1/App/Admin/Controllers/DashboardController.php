<?php
namespace App\Admin\Controllers;
use Mai\Controller;
use classes\Session;

class DashboardController extends Controller{
    
    public $_session = '';

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
        $this->_session = new Session();
        // $this->_session->checkSession(1,"admin");
    }

    public function index(){
        // $curuser = $_SESSION['myhradminuserid'];

        // echo $this->twig->render('/Admin/Views/Dashboard.html',["loginuser"=> $curuser]);
        echo $this->twig->render('/Admin/Views/Dashboard.html');
    }
    
}