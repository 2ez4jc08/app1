<?php
namespace App\Home\Controllers;
use Mai\Controller;
use Classes\HashPassword;
use App\Home\Models\client;
use classes\Session;

class LoginController extends Controller{
    
    public $_client = '';
    public $_session = '';

    public function __construct()
    {
        parent::__construct($this->_module, $this->_controller, $this->_action);
        $this->_client = new client();
        $this->_session = new Session();
    }

    public function index(){
        echo $this->twig->render('/Home/Views/Login.html');
    }

    public function verifyLogin(){
        $hashpassword = new HashPassword();
        $username = $_POST['username'];
        $password = $hashpassword->set('client',$_POST['password']);
        $check = $this->_client->fields(" UserName, HashPass ")
                                ->join(" JOIN paid_client ON paid_client.UserId = client.UserId ")
                                ->where(" UserName = '$username' and HashPass = '$password' and Verification = 1 ")->select();
        if($check){
            $this->_session->setSession("client",$username, 300);
            $data['status'] = 1;
            $data['msg'] = "SUCCESSFUL!";
            echo json_encode($data);
        }else{
            $data['status'] = 0;
            $data['msg'] = "INCORRET USERNAME OR PASSWORD!";
            echo json_encode($data);
        }
    }
    
    
}