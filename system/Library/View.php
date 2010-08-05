<?php

class Core_Library_View extends Core_Library
{
	//postDetectApp
 	var $_viewPath;
   	var $_paths;
  	var $_suffix;
   	var $_sitePath;
  	var $_defaultLayoutFile;
  	var $_hasLayout;
	
	var $_viewParam = array(); 
	var $_viewFile;
	
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
    	$this->_viewPath = $this->config->getAppPath().$this->config->getAppFolderPath('view');
    	$this->_publicViewPath = $this->config->getAppFolder();
    	
    	$config = $this->config->getAppViewConfig();
       	$this->_paths = $this->config->getAppViewFoldersPath();
       	$this->_suffix = $this->config->getAppViewSuffixes();
       	$this->sitePath = $this->config->getSitePath();
       	$this->_defaultLayoutFile = $this->config->getAppViewDefaultLayoutFile();
       	$this->_hasLayout = $this->config->getAppViewLayoutStatus();
    }
    
    function render()
    {
    	if($this->_hasLayout)
    	{
    		$this->layout();
    	} else {
    		$this->content();
    	}
    }
    
    function setViewFile($viewFile)
    {
    	$this->_viewFile = $viewFile;
    }
    
    function setLayoutFile($layoutFile)
    {
    	$this->_layoutFile = $layoutFile;
    }
    
    function setViewParamFromArray($viewParamFromArray)
    {
    	foreach ($viewParamFromArray as $key => $value)
    	{
    		$this->_viewParam[$key] = $value;
    	}
    }
    
    function getParam($key){
    	return $this->_viewParam[$key];
    }
    
    function layout()
    {
    	foreach ($this->_viewParam as $key => $value)
    	{
    		$$key = $value ;
    	}
    	
    	include $this->_viewPath.$this->_paths['layout'].$this->_defaultLayoutFile.$this->_suffix['layout'];
    }
    
    /*
     * Functions to use in view Files
     */
    
    function fill($params, $string){
    	foreach ($params as $key => $value){
    		$string = str_replace('{'.$key.'}', $value, $string);
    	}
    	return $string;
    }
    
    function css($cssFileName)
    {
    	echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER["SERVER_NAME"].'/'.$this->sitePath.'public/'.$this->_publicViewPath.$this->_paths['css'].$cssFileName.$this->_suffix['css'].'" media="screen" />';
    }
    
    function js($jsFileName)
    {
    	echo '<script type="text/javascript" src="http://'.$_SERVER["SERVER_NAME"].'/'.$this->sitePath.'public/'.$this->_publicViewPath.$this->_paths['js'].$jsFileName.$this->_suffix['js'].'"></script>';
    }
    
    function content()
    {
    	foreach ($this->_viewParam as $key => $value){
    		$$key = $value ;
    	}
    	
    	include $this->_viewPath.$this->_paths['view'].$this->_viewFile.$this->_suffix['view'];
    }
    
    function modul($modulName, $modulParams = NULL)
    {
    	foreach ($this->_viewParam as $key => $value){
    		$$key = $value ;
    	}
    	
    	$$modulName = $modulParams;
    	
    	include $this->_viewPath.$this->_paths['modul'].$modulName.$this->_suffix['modul'];
    }
    
    function loop($modulLoopName, $modulLoopParams)
    {
    	$modulLoopParamsName = $modulLoopName ;
    	
    	foreach ($modulLoopParams as $value => $key)
    	{
    		$keyName = $modulLoopName.'0';
    		$valueName = $modulLoopName;
    		
    		$$keyName = $value;
    		$$valueName = $key;
    	
    		include $this->_viewPath.$this->_paths['loop'].$modulLoopName.$this->_suffix['loop'];
    	}
    }
    
    function url($url, $isFilter = FALSE)
    {
    	if($isFilter)
    	{
    		$url = $this->filterUrl($url);
       	}
    	return 'http://'.$_SERVER['SERVER_NAME'].'/'.$this->sitePath.$url;
    }
    
    function imageUrl($url)
    {
    	return 'http://'.$_SERVER['SERVER_NAME'].'/'.$this->sitePath.'public/'.$this->_publicViewPath.'images/'.$url;
    }
    
    function filterUrl($string)
    {
    	$string = str_replace(' ', '-', $string);
    	return $string;
    }
    	
}