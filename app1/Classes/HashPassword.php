<?php
namespace Classes;

class HashPassword{

    protected $_user = '';
    protected $_password = '';

    public function set($user, $password){
        $this->_user = md5($user);
        $this->_password = md5($password);

        $userpassword = $this->_user . $this->_password;
        return $userpassword;
    }
}