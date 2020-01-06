<?php
namespace App\Chat\Controllers;
use Mai\Controller;

class IndexController extends Controller{

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
    }

    public function index()
    {
        echo $this->twig->render('Chat/Views/Index.html');
    }
}