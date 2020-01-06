<?php
namespace App\Home\Controllers;
use Mai\Controller;

class IndexController extends Controller{

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
    }

    public function index(){
        echo $this->twig->render('Home/Views/index.html');
    }

}