<?php
namespace App\Company\Controllers;
use Mai\Controller;

class AboutController extends Controller{

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
    }

    public function index(){
        echo $this->twig->render('Company/Views/About.html');
    }

}