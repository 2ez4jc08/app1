<?php
namespace App\Admin\Controllers;
use Mai\Controller;
use Classes\AutoId;
use Classes\HashPassword;
use App\Admin\Models\admin;
use classes\Session;

class LoginController extends Controller{
    
    public $_admin = '';
    public $_session = '';
    public $_autoid = '';
    public $_hashpassword = '';

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
        $this->_admin = new admin();
        $this->_session = new Session();
        $this->_autoid = new AutoId();
        $this->_hashpassword = new HashPassword();
    }

    public function index(){
        echo $this->twig->render('/Admin/Views/Login.html');
    }

    public function verifyLogin(){

        $username = $_POST['username'];
        $password = $this->_hashpassword->set('admin',$_POST['password']);
        $check = $this->_admin->fields(" EmployeeId, HashPass ")
                                ->where(" EmployeeId = '$username' and HashPass = '$password' and Active = 1 ")->select();
        if($check){
            $this->_session->setSession("admin", $username, 300);
            $data['status'] = 1;
            $data['msg'] = "SUCCESSFUL!";
            exit(json_encode($data));
        }else{
            $data['status'] = 0;
            $data['msg'] = "INCORRET USERNAME OR PASSWORD!";
            exit(json_encode($data));
        }

    }
    
        // $userid = $this->_autoid->set("admin","admin");
        // $password = $this->_hashpassword->set("admin", "qwe123");

        // $set['UserId'] = $userid;
        // $set['UserName'] = "admin";
        // $set['UserPassword'] = "qwe123";
        // $set['HashPass'] = $password;
        // $insert = $this->_admin->insert($set);
    
    
}