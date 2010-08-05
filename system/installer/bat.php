<?php
 if (!isset($argv[1]) || !in_array($argv[1], array('create-app', 
 													'create-controller', 
 													'create-view', 
 													'create-full-app', 
 													'create-full-controller', 
 													'create-backend-app', 
 													
 													'delete-app', 
 													
 													'sync-backend-controller', 
 													'sync-backend-view',
 													'sync-backend-full-controller',
 													'sync-backend-full-app'))) {
?>
Commands:


..create-					
....full-
......app:			create-full-app $appName $controllerName $actionName
......controller:			create-full-controller $appName $controllerName $actionName
....backend-
......app:			create-backend-app $appName 
....app:				create-app $appName
....controller:			create-controller $appName $controllerName $actionName
....view:				create-view $appName $controllerName $actionName
..delete-
....app:			delete-app $appName
..sync-
....backend-
......full-
........controller:
........app:
......controller:  	sync-backend-controller $appName $controllerName
......view:		sync-backend-view $appName $controllerName
<?php
} else {
	
	$command = $argv[1];
    $file = str_replace('-', '/', $command);
    $file .= '.php';
    $file = 'commands/'.$file;
    include 'functions.php';
    require_once  'system/Library/Spyc.php';
	include $file;
	
}

?>