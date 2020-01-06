<?php
namespace App\Admin\Controllers;

use Mai\Controller;

class PageController extends Controller{

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
    }
    
    public function index()
    {
        echo $this->twig->render('/Admin/Views/Page.html');
    }
}