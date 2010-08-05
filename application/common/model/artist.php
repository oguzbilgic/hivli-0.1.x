<?php
class artist extends Core_Model_Database 
{
	var $_tableName = 'artist';
	var $_tableFields = array(	'id' 			=> array('type' => 'int'),
								'name'			=> array('type' => 'varchar'));
	var $_specialFields = array('id'			=> 'id');
	var $_searchBy = 	  array(array('field' 	=> 'name'));
	var $_hasManyObject = array('name'			=> 'album', 'object_field' => 'artist_id');
}
