<?php
namespace Classes;

class AutoId{

    protected $_username = '';
    protected $_user = '';

    public function set($user, $username){
        $this->_user = md5($user);
        $this->_username = md5($username);
        $userid = $this->_user . $this->_username;
        return $userid;
    }
}