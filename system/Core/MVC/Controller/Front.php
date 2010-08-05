<?php
class Core_Controller_Front extends Core_Controller
{
	var $_loader = array('Auth', 'Database', 'I18n');
	
	function run()
	{
		$this->_setConfig();
		$this->_preRoute();
		$this->_route();
		$this->_postRoute();
		$this->_initStart();
		$this->_action();
		$this->_initStop();
		$this->_preRender();
		$this->_render();
		$this->_postRender();
	}
	
	function _setConfig()
	{
		$this->Config->readConfig();
		
		$this->Router->preDetectApp();
		$this->Router->detectApp();
		
		$this->Config->readAppConfig($this->Router->getApplicationName());
				
		$this->View->postDetectApp();
		$this->Router->postDetectApp();
		$this->Plugin->postDetectApp();
		$this->Auth->postDetectApp();	
		$this->I18n->postDetectApp();	
		$this->Database->postDetectApp();	
		$this->Controller->postDetectApp();	
		$this->Model->postDetectApp();	
	}
	
	function _preRoute()
	{
		$this->Plugin->registerPlugins();
		$this->Plugin->registerPlugins(TRUE);
		$this->Plugin->preRoute();
	}
	
	function _route()
	{
		$this->Router->route();
				
		$this->Controller->setControllerName($this->Router->getControllerName());
		$this->Controller->setActionName($this->Router->getActionName());

		$this->View->setViewFile($this->Router->getControllerName().'/'.$this->Router->getActionName());
	}
	
	function _postRoute()
	{
		$this->Model->includeModels();
		$this->Plugin->postRoute();
	}
	
	function _initStart()
	{
		$this->Controller->initStart();
		$this->Plugin->initStart();
	}
	
	function _action()
	{
		$this->Controller->action();
	}
	
	function _initStop()
	{
		$this->Controller->initStop();
		$this->Plugin->initStop();	
	}
	
	function _preRender()
	{
		$this->Plugin->preRender();
	}
	
	function _render()
	{
		$this->View->render();
	}
	
	function _postRender()
	{
		$this->Plugin->postRender();
	}

}