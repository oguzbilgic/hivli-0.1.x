<?php
function createBackendPlugin($appName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	$appConfig = $applicationConfig[$appName];
	
	$controllerFolder = $appConfig['folder'].'controller/';
	$appFolder = $coreConfig['application_path'];
	
	
	$pluginrCode = '<?php
class Error extends Core_Plugin_Base {
	var $_orderNumber = 99;
	
	function postRoute(){
		$view = $this->get("View");
		$Router = $this->get("Router");
		

		$param["message"] = "";
		$param["message_type"] = "success";
		
		
		if($Router->isParam("notice")){
			$notice = $Router->getParam("notice");
			switch ($notice){
				case "111":
					$param["message"] = "<span>Congratulations</span> order is successfully deleted";
					$param["message_type"] = "success";
					break;
				case "222":
					$param["message"] = "<span>Error</span> There is no such a order";
					$param["message_type"] = "error";
					break;
				case "333":
					$param["message"] = "<span>Congratulations</span> order is successfully added";
					$param["message_type"] = "success";
					break;
				case "444":
					$param["message"] = "<span>Congratulations</span> order is successfully updated";
					$param["message_type"] = "success";
					break;
			}
		}
			$view->setViewParamFromArray($param);
	}
}';
	
	createEditFile($appFolder.$controllerFolder.'/plugin/Error.php', $pluginrCode);
}

