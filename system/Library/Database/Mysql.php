<?php
class Core_Library_Database_Mysql extends Core_Library_Database 
{
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
    
    function openBaseConnection()
	{
    	$host = self::$_baseConnectionSettings['host'];
    	$username = self::$_baseConnectionSettings['username'];
    	$password = self::$_baseConnectionSettings['password'];

    	self::$_baseConnection = mysql_connect($host, $username, $password);
	}
	
	function selectBaseConnectionDb()
	{
    	$databaseName = self::$_baseConnectionSettings['name'];
    	$baseConnection = self::$_baseConnection;
    	self::$_baseConnectedDb = mysql_select_db($databaseName, $baseConnection);
	}
	
	function newConnection($table)
    {
    	$connectionId = self::$_connectionNumber+1;
    	self::$_connectionNumber++;
    	self::$_connections[$connectionId] = array(	'tableName' 	=> $table,
    												'queryNumber'	=> '0',
    												'queries'		=> array( array('query'		=> Null, 'result'	=> Null	)));
    	return $connectionId;
    }
    
    function newQuery($connectionId)
    {
    	$queryNumber = self::$_connections[$connectionId]['queryNumber'];
    	$queryNumber++;
    	self::$_connections[$connectionId]['queryNumber'] = $queryNumber;
    	$tableName = self::$_connections[$connectionId]['tableName'];
    }

    function addQuery($query, $connectionId)
    {
       	$queryNumber = self::$_connections[$connectionId]['queryNumber'];
       	self::$_connections[$connectionId]['queries'][$queryNumber]['query'] = $query;
    }
    
    function runQuery($connectionId)
    {
    	$queryNumber = self::$_connections[$connectionId]['queryNumber'];
    	$query = self::$_connections[$connectionId]['queries'][$queryNumber]['query'];
    	$result = mysql_query($query, self::$_baseConnection);
    	self::$_connections[$connectionId]['queries'][$queryNumber]['result'] = $result;
    }
    
    function getResultAsArray($connectionId)
    {
		$queryNumber = self::$_connections[$connectionId]['queryNumber'];
		$result = self::$_connections[$connectionId]['queries'][$queryNumber]['result'];
		$rowNumber = mysql_num_rows($result);
		$i = '1';
		while($i <= $rowNumber)
		{
			$resultArray[$i] = mysql_fetch_assoc($result);
			$i++;
		}
		
		if (isset($resultArray))
		{
			return $resultArray;
		} else {
			return FALSE;
		}
    }
}