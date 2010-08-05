<?php
include 'system/installer/functions/create/app.php';

function createBackendApp($appName)
{
	
	createApp($appName, 'on');
	
	//copy Backend Images
	copyFolder('system/installer/files/create/backend/app/images', 'public/'.$appName.'/images/');
	
	//copy Backend Css
	copyFolder('system/installer/files/create/backend/app/css', 'public/'.$appName.'/css/');
	
	//copy Backend js
	copyFolder('system/installer/files/create/backend/app/js', 'public/'.$appName.'/js/');
	
}