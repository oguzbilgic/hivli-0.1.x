<?php
class Core_Library_Plugin extends Core_Library 
{	
	//postDetectApp
	var $_pluginPath;
	var $_commonPluginPath;
	var $_plugins;
	
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
    	$this->_pluginPath = $this->config->getAppPath().$this->config->getAppFolderPath('plugin');
    	$this->_commonPluginPath = $this->config->getAppPath().$this->config->getCommonAppFolderPath('plugin');
    	$this->_plugins  = new object;
    }

    function registerPlugins($isCommon = False)
	{
		$pluginPath = ($isCommon) ? $this->_commonPluginPath : $this->_pluginPath;
		foreach ( glob ( $pluginPath.'*.php' ) as $plugin_filename ) {
			
			require_once $plugin_filename;
			$pluginName = str_replace('.php', '', substr($plugin_filename, strlen($pluginPath)));
			
			$plugin = new $pluginName;
			$orderNumber = $plugin->getOrderNumber();
			$this->_plugins->$orderNumber = new $pluginName;
		}
		if ($this->checkPluginNumber()){
			$this->_plugins->ksort();
		}
	}
	
	function checkPluginNumber()
	{
		$plugins = $this->_plugins->get(); 
		if(empty($plugins)){
			return FALSE;
		}
		return TRUE;
	}
	
	function initStart()
	{
		if ($this->checkPluginNumber())
		{
			foreach($this->_plugins->get() as $pluginName => $object)
			{
				$this->_plugins->$pluginName->initStart();
			}	
		}
	}
	
	function initStop()
	{
		if ($this->checkPluginNumber())
		{
			foreach($this->_plugins->get() as $pluginName => $object)
			{
				$this->_plugins->$pluginName->initStop();
			}	
		}
	}
	
	function preRender()
	{
		if ($this->checkPluginNumber())
		{
			foreach($this->_plugins->get() as $pluginName => $object)
			{
				$this->_plugins->$pluginName->preRender();
			}	
		}
	}
	
		
	function postRender()
	{
		if ($this->checkPluginNumber())
		{
			foreach($this->_plugins->get() as $pluginName => $object)
			{
				$this->_plugins->$pluginName->postRender();
			}	
		}
	}
	
	function preRoute()
	{
		if ($this->checkPluginNumber())
		{
			foreach($this->_plugins->get() as $pluginName => $object)
			{
				$this->_plugins->$pluginName->preRoute();
			}	
		}
	}
	
		
	function postRoute()
	{
		if ($this->checkPluginNumber())
		{
			foreach($this->_plugins->get() as $pluginName => $object)
			{
				$this->_plugins->$pluginName->postRoute();
			}	
		}
	}
	
	
}
