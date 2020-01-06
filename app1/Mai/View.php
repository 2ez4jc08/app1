<?php
namespace Mai;

class View {

    protected $_module;
    protected $_controller;
    protected $_action;
    protected $variables = array();

    function __construct($module, $controller, $action)
    {
        $this->_module = strtolower($module);
        $this->_controller = strtolower($controller);
        $this->_action = strtolower($action);
        $this->variables['action'] = $action;
    }

    public function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function render()
    {
        extract($this->variables);
        $controllerview = APP_PATH . 'App/'. $this->_module .'/' . 'Views/' . $this->_controller . '/' . $this->_action . '.html';
        if(file_exists($controllerview)){
            include ($controllerview);
        }else{
            exit($controllerview . 'NOT EXIST');
        }
    }

}