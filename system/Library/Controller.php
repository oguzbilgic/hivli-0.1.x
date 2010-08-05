<?php 
class Core_Library_Controller extends Core_Library 
{
	//postDetectApp
	var $_controllerPath;
	
	var $_controllerName;
	var $_controllerClassName;
	var $_controller;
	var $_actionName;
	var $_actionMethodName;
	
	private static $_instance;
	private function __construcut(){
		self::getInstance();
	}
	
	public static function getInstance(){
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function postDetectApp(){
    	$this->_controllerPath = $this->config->getAppPath().$this->config->getAppFolderPath('controller');
    }
    
    function initStart(){
    	$this->_includeController();
    	$this->_controller = new $this->_controllerClassName;
    	$this->_controller->initBase();
    	$this->_controller->initStart();
    }
    
    function action(){
    	$method = $this->_actionMethodName;
    	$this->_controller->$method();
    }
    
    function initStop(){
    	$this->_controller->initStop();
    }
    
    function setControllerName($controllerName){
    	$this->_controllerName = $controllerName;
    	$this->_controllerClassName = $controllerName.'Controller';
    }
    
    function setActionName($actionName){
    	$this->_actionName = $actionName;
    	$this->_actionMethodName = $actionName.'Action';
    }
    
	function _includeController(){
		$controllerFileName = $this->_controllerPath.$this->_controllerClassName.'.php';
		include $controllerFileName;
	}
	
	function hasController(){
		$controllerFileName = $this->_controllerPath.$this->_controllerClassName.'.php';
		if(is_file($controllerFileName)){
			return TRUE;
		}
		return FALSE;
	}
}