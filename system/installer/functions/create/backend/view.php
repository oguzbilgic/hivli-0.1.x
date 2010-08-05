<?php

function createBackendView($appName, $controllerName, $actionName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	$appConfig = $applicationConfig[$appName];
	$viewFolder = $appConfig['folder'].'view/';
	$appFolder = $coreConfig['application_path'];
	
	createDir($appFolder.$viewFolder.'script/'.$controllerName);
	createDir($appFolder.$viewFolder.'modul/sidebars');
	
	
	
	$viewCode =
'<DIV class="col w5">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>This is the title</H2>
			<DIV class="desc">
				<P>Edit This File</P>
			</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
	</DIV>
</DIV><DIV class="col w5 last">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>This is the title</H2>
			<DIV class="desc">
				<P>Edit This File</P>
			</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
	</DIV>
</DIV>';
	
	createEditFile($appFolder.$viewFolder.'script/'.$controllerName.'/'.$actionName.'.php', $viewCode);
	
	
}

