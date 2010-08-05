<?php
class Core_Library_Model extends Core_Library
{	
	//postDetectApp
	var $_modelPath;
	var $_CommonModelPath;
	
	var $_models;
	
	private static $_instance;
	private function __construcut()
	{
		self::getInstance();
	}
	public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	function postDetectApp()
	{
		$this->_modelPath = $this->config->getAppPath().$this->config->getAppFolderPath('model');
		$this->_commonModelPath = $this->config->getAppPath().$this->config->getCommonAppFolderPath('model');
	}
	
	function includeModels()
	{
		$this->_includeModels($this->_modelPath);
		$this->_includeModels($this->_commonModelPath);
	}
	
	function _includeModels($path)
	{
		foreach (glob ($path.'*.php') as $class_filename ) 
		{
			require_once ($class_filename);
		}
	}
}