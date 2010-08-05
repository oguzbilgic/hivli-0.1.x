<?php
class User extends Core_Model_Database 
{
	var $_tableName = 'user';
	var $_tableFields = array(	'id' 			=> array('type' => 'int'),
								'username'		=> array('type' => 'varchar'),
								'password'		=> array('type' => 'varchar'),
								'name'			=> array('type' => 'varchar'),
								'date_added'	=> array('type' => 'date'),
								'email'			=> array('type' => 'varchar'),
								'role'			=> array('type' => 'list', 'values' => array('Uye' => 'user', 'Yonetici' => 'admin')));
	var $_specialFields = array('id'			=> 'id');
}
