<?php
namespace App\Controllers\Admin;

use Mai\Controller;
use App\Models\Admin\admin;

class LoginController extends Controller {

    public $adminDB = '';

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
        $this->adminDB = new admin();
    }

    public function index() 
    {
        echo $this->twig->render('admin/login.html');
    }

    public function validate()
    {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);

        $check = $this->adminDB->fields(" * ")->where(" Username = '$user' and Password = '$pass' ")->select();
        
        if(!empty($check)){
            $check = 1;
            echo json_encode($check);
        }else{
            $check = 0;
            echo json_encode($check);
        }
    }
}