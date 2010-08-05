<?php
require_once 'Database/Mysql.php';
class Core_Model_Database extends Core_Model 
{
	var $_tableName;
	
	var $_baseLoader = array('Database');
	
	function __construct()
	{	
		parent::__construct();		
		switch ($this->Database->getDatabaseType()){
    		case 'mysql':
    			$this->_adapter = new Core_Model_Database_Mysql();
    			$this->_adapter->setConnection($this->_tableName);
    			break;
    		case 'sqlite':
    			$this->_adapter = new Core_Library_Database_Sqlite();
    			break;
       	}
	}

	function fetchAll()
	{
		return $this->_adapter->fetchAll();
	}
	
	function select($attributes = NULL, $limit = NULL, $childObjects = FALSE, $orderBy = NULL)
	{
		$objects = $this->_adapter->select($attributes, $limit, $orderBy);
		if (true && !empty($childObjects) && $this->_hasObjectField() && !empty($objects)){
			return $this->_matchObjects($objects, $childObjects);
		}
		return $objects;
	}
	
	function selectLike($attributes = NULL, $limit = NULL)
	{
		return $this->_adapter->selectLike($attributes, $limit);
	}
	
	function selectOne($attributes = NULL, $childObjects = FALSE)
	{
		$result = $this->select($attributes, '1', $childObjects);
		if (isset ($result[0]))
		{
			return $result[0];
		}
		return $result[1];
	}
	
	function add($attributes)
	{
		$this->_adapter->add($attributes);
	}
	
	function addRepeat($attributes, $number)
	{
		$this->_adapter->addRepeat($attributes, $number);
	}
	
	function update($newAttributes, $oldAttributes)
	{
		$this->_adapter->update($newAttributes, $oldAttributes);
	}
	
	function delete($itemAttributes)
	{
		$this->_adapter->delete($itemAttributes);
	}
	
	function describe()
	{
		return $this->_adapter->describe();
	}
	
	function _matchObjects($parentObjects, $childObjects)
	{
		$objectFields = $this->_getObjectFields();
		foreach ($objectFields as $field => $objectField)
		{
			if ($childObjects ||in_array($field, $childObjects)){
				$childObjectName = $objectField['object_name'];
				$childObject = new $childObjectName;
				$childObjectResult = $childObject->select(NULL, NULL, FALSE);
				
				$parentObjects = matchObjects($parentObjects, $childObjectResult,$field, $field, $objectField['object_id']);
			}
		}
		return $parentObjects;
	}
	
	function _hasObjectField()
	{
		if (isset($this->_tableFields))
		{
			foreach ($this->_tableFields as $_tableField)
			{
				if ($_tableField['type'] == 'object'){
					return TRUE;	
				}
			}
		}
	}
	
	function _getObjectFields()
	{
		if (isset($this->_tableFields))
		{
			foreach ($this->_tableFields as $name => $_tableField)
			{
				if ($_tableField['type'] == 'object'){
					$objectFileds[$name] = $_tableField;
				}
			}
			return $objectFileds;
		}
	}
	
}