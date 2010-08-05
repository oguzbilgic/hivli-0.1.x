<?php
class album extends Core_Model_Database 
{
	var $_tableName = 'album';
	var $_tableFields = array(	'id' 			=> array('type' => 'int'),
								'name'			=> array('type' => 'varchar'),
								'artist_id'		=> array('type' => 'object', 'object_name' => 'artist', 
														 'object_id' => 'id', 'object_string' => 'name'));
	var $_specialFields = array('id'			=> 'id');
	var $_searchBy = 	  array(array('field' 	=> 'name'));
	var $_hasManyObject = array('name'			=> 'song', 'object_field' => 'album_id');
}
