<?php
class Search extends Core_Model_Database 
{
	var $_tableName = 'tags';
	var $_tableFields = array(	'id' 			=> array('type' => 'int'),
								'string'		=> array('type' => 'varchar'),
								'date_added'	=> array('type' => 'date'),
								'ip'			=> array('type' => 'varchar'),
								'type'			=> array('type' => 'list', 'values' => array('Mp3' => '1', 'Lyric' => '2'))
	);
	var $_specialFields = array('id'			=> 'id');
	var $_filterBy = array(array('field'		=> 'type', 'values' => array('Mp3' => '1', 'Lyric' => '2')));
	var $_searchBy = 	  array(array('field' 	=> 'name'));
}
