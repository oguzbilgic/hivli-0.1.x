<?php
class Core
{
	var $_coreClasses = array();
	var $_loadedClasses;
	var $_coreConfig;
	var $_baseLoader;
	var $_loader;
	var $_library = array('Auth' => 'Core_Library_Auth',
						  'Config' => 'Core_Library_Config',	
						  'Controller' => 'Core_Library_Controller',	
						  'Database' => 'Core_Library_Database',	
						  'Error' => 'Core_Library_Error',	
						  'Model' => 'Core_Library_Model',	
						  'Plugin' => 'Core_Library_Plugin',	
						  'Router' => 'Core_Library_Router',	
						  'View' => 'Core_Library_View',	
						  'I18n' => 'Core_Library_I18n',	
						  'Yaml' => 'SPYC');
	/**
	 * It loads necessary classes
	 *
	 * @return void
	 */
	function __construct()
	{
		$this->_coreConfig = Core_Library_Config::getInstance();
		self::loadFromArray($this->_loader, TRUE);
		self::loadFromArray($this->_baseLoader, TRUE);
	}
		
	/**
	 * It loads classes from array variable
	 *
	 * @param array $coreClasses
	 * @param boolean $isCore
	 */	
	function loadFromArray($classes, $isCore)
	{
		if (!is_array($classes))
		{
			return FALSE;
		}
		foreach ($classes as $classNick)
		{
			$this->load($classNick, $this->_library[$classNick], $isCore);
		}
	}
	
	/**
	 * It loads classes
	 *
	 * @param string $classNick
	 * @param string $className
	 * @param boolean $isCoreClass
	 * @return void
	 */
	function load($classNick, $className, $isCoreClass = False)
	{	
		eval("\$class = " . $className . "::getInstance();");
		$class->setBaseConfig($this->_coreConfig);
		$this->$classNick = $class;
	
		if (TRUE)
		{
			$this->_loadedClasses[$classNick] = $className;
		} else {
			$this->_coreClasses[$classNick] = $className;
		}
	}
	function get($classNick)
	{	
		eval("\$class = " . $this->_library[$classNick] . "::getInstance();");
		$loadedClass = $class;
	
		return $loadedClass;
	}	
}
