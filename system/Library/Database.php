<?php
require_once 'Database/Mysql.php';
class Core_Library_Database extends Core_Library 
{
	//postDetectApp
	public static $_baseConnectionSettings;
	
	public static $_baseConnection;
	public static $_baseConnectedDb;
	public static $_connectionNumber = '0';
	public static $_connections = array();
	
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
    	if($this->config->getDatabaseStatus())
    	{
    		self::$_baseConnectionSettings = $this->config->getDatabaseParams();
    		$this->_startBaseConnection();
		}
	}
	
    function _startBaseConnection()
    {
    	$this->_setAdapter();
    	$this->_openBaseConnection();
    	$this->_selectBaseConnectionDb();
    }
    
    function _setAdapter()
    {
    	switch (self::$_baseConnectionSettings['type']){
    		case 'mysql':
    			$this->_adapter = Core_Library_Database_Mysql::getInstance();
    			break;
    		case 'sqlite':
    			$this->_adapter = new Core_Library_Database_Sqlite();
    			break;
       	}
    }
    
    function _openBaseConnection()
    {
    	$this->_adapter->openBaseConnection();
	}
	
	function _selectBaseConnectionDb()
	{
	   	$this->_adapter->selectBaseConnectionDb();
	}
    
    function newConnection($table)
    {
    	return $this->_adapter->newConnection($table);
    }
    
    function newQuery($connectionId)
    {
    	$this->_adapter->newQuery($connectionId);
    }

    function addQuery($query, $connectionId)
    {
		$this->_adapter->addQuery($query, $connectionId);
    }
    
    function runQuery($connectionId)
    {
    	$this->_adapter->runQuery($connectionId);
    }
    
    function getResultAsArray($connectionId)
    {
		return $this->_adapter->getResultAsArray($connectionId);
    }
    
    function getDatabaseName()
    {
    	return self::$_baseConnectionSettings['name'];
    }
    
    function getDatabaseType()
    {
    	return self::$_baseConnectionSettings['type'];
    }
}
