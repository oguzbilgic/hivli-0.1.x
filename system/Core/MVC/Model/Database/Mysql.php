<?php
class Core_Model_Database_Mysql extends Core_Model
{
	var $_connectionId;
	var $_tableName;
	
	var $_baseLoader = array('Database');
	
	function __construct()
	{	
		parent::__construct();
		$this->_connectionId = $this->Database->newConnection($this->_tableName);
	}
	
	function setConnection($tableName)
	{
		$this->_connectionId = $this->Database->newConnection($this->_tableName);
		$this->_tableName = $tableName;
	}

	function fetchAll()
	{
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery('SELECT * FROM  `'.$this->_tableName, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
		return $this->Database->getResultAsArray($this->_connectionId);
	}
	
	function select($attributes = NULL, $limit = NULL, $orderBy = NULL)
	{
		
		$query = 'SELECT * FROM  `'.$this->_tableName.'` ';
		$attributeNumber = 0;
		if (isset($attributes))
		{
			$query .= 'WHERE';
			foreach ($attributes as $field => $value)
			{
				if ($attributeNumber == 0)
				{
					$query.= "`".$field."` LIKE '".$value."'";
				} else {
					$query.= "AND `".$field."` LIKE '".$value."'";
				}
				$attributeNumber++;
			}
		}
		
		if (isset($orderBy))
		{
			$query = $query.' ORDER BY  `'.$this->_tableName.'`.`'.$orderBy['0'].'` '.$orderBy['1'];
		}
		
		if (isset($limit))
		{
			$query = $query.' LIMIT 0,'.$limit;
		}
		
		
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
		return $this->Database->getResultAsArray($this->_connectionId);
	}	
	
	function selectLike($attributes = NULL, $limit = NULL)
	{
		
		$query = 'SELECT * FROM  `'.$this->_tableName.'` ';
		$attributeNumber = 0;
		if (isset($attributes))
		{
			$query .= 'WHERE';
			foreach ($attributes as $field => $value)
			{
				if ($attributeNumber == 0)
				{
					$query.= "`".$field."` LIKE '%".$value."%'";
				} else {
					$query.= "AND `".$field."` LIKE '%".$value."%'";
				}
				$attributeNumber++;
			}
		}

		if (isset($limit))
		{
			$query = $query.' LIMIT 0,'.$limit;
		}
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
		return $this->Database->getResultAsArray($this->_connectionId);
	}
	
	function selectOne($attributes = NULL)
	{
		$result = $this->select($attributes, '1');
		return $result[1];
	}
	
	function add($attributes)
	{
		$attributeNumber = 0;
		$fields = NULL;
		$values = NULL;
		foreach ($attributes as $attribute => $value)
		{
			if ($attributeNumber == 0)
			{
				$fields .= ' `'.$attribute.'`';
				$values .= " '".$value."'";
			} else {
				$fields .= ', `'.$attribute.'`';
				$values .= ", '".$value."'";
			}
			$attributeNumber++;
		}
		
		$query = 'INSERT INTO `'.$this->Database->getDatabaseName().'`.`'.$this->_tableName.'` ';
		$query = $query.' ( '.$fields.' ) VALUES ( '.$values.' ) ';
		
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
	}
	
	function addRepeat($attributes, $number)
	{
		$attributeNumber = 0;
		$fields = NULL;
		$values = NULL;
		foreach ($attributes as $attribute => $value)
		{
			if ($attributeNumber == 0)
			{
				$fields .= ' `'.$attribute.'`';
				$values .= " '".$value."'";
			} else {
				$fields .= ', `'.$attribute.'`';
				$values .= ", '".$value."'";
			}
			$attributeNumber++;
		}
		
		$query = 'INSERT INTO `'.$this->Database->getDatabaseName().'`.`'.$this->_tableName.'` ';
		$query = $query.' ( '.$fields.' ) VALUES ';
		
		$i = 1;
		while ($i <= $number) {
			if ($i == 1)
			{
				$query .= ' ( '.$values.' ) ';
			} else {
				$query .= ', ( '.$values.' ) ';
			}
			$i++;
		}
		
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
	}
	
	function update($newAttributes, $oldAttributes)
	{
		$query = 'UPDATE `'.$this->Database->getDatabaseName().'`.`'.$this->_tableName.'` SET ';
		
		$newAttributeNum = '0';
		$oldAttributeNum = '0';
		foreach ($newAttributes as $field => $value)
		{
			if($newAttributeNum == '0')
			{
				$query.= "`".$field."` = '".$value."' ";
			} else {
				$query.= " , `".$field."` = '".$value."'";
			}
			$newAttributeNum++;
		}
		$query .= ' WHERE `'.$this->_tableName.'` . ';
		foreach ($oldAttributes as $field => $value)
		{
			if($oldAttributeNum == '0')
			{
				$query.= "`".$field."` = '".$value."' ";
			} else {
				$query.= " AND `".$field."` = '".$value."'";
			}
			$oldAttributeNum++;
		}
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
	}
	
	function delete($itemAttributes)
	{
		$query = "DELETE FROM `".$this->Database->getDatabaseName()."` . `".$this->_tableName."` WHERE ";
		
		$attributeNum = 0;
		foreach ($itemAttributes as $field => $value)
		{
			if($attributeNum == '0')
			{
				$query.= "`".$field."` = '".$value."' ";
			} else {
				$query.= " AND `".$field."` = '".$value."'";
			}
			$attributeNum++;
		}
		
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
	}
	
	function describe()
	{
		$query = "DESCRIBE ".$this->_tableName;
		$this->Database->newQuery($this->_connectionId);
		$this->Database->addQuery($query, $this->_connectionId);
		$this->Database->runQuery($this->_connectionId);
		return $this->Database->getResultAsArray($this->_connectionId);
	}
}