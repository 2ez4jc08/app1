<?php
namespace App\Hosting\Controllers;
use Mai\Controller;

class CloudServerController extends Controller{

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
    }

    public function index()
    {
        echo $this->twig->render('Hosting/Views/CloudServer.html');
    }
}