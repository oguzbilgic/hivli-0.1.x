<?php
class Song extends Core_Model_Database 
{
	var $_tableName = 'song';
	var $_tableFields = array(	'id' 			=> array('type' => 'int'),
								'name'			=> array('type' => 'varchar'),
								'status'		=> array('type' => 'list', 'values' => array('Onaylı' => '1', 'Onay Bekliyor' => '2')),
								'lyric'			=> array('type' => 'text', 'not_list' => TRUE),
								'user_id'		=> array('type' => 'object', 'object_name' => 'user', 
														 'object_id' => 'id', 'object_string' => 'name'),
								'album_id'		=> array('type' => 'object', 'object_name' => 'album', 
														 'object_id' => 'id', 'object_string' => 'name'),
								'artist_id'		=> array('type' => 'object', 'object_name' => 'artist', 
														 'object_id' => 'id', 'object_string' => 'name')
	);
	var $_specialFields = array('id'			=> 'id');
	var $_searchBy = 	  array(array('field' 	=> 'name'));
	var $_filterBy = 	  array(array('field' 	=> 'status', 'values' => array('Onaylı' => '1', 'Onay Bekliyor' => '2')));
}
