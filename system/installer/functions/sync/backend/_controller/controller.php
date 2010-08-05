<?php
function _makeSyncBackendController($appName, $controllerName, $fields, $specialFields, $filterBy, $hasManyObject = Null){
	$controllerCode = '<?php
class '.$controllerName.'Controller extends Core_Controller_Base
{
	function indexAction(){

		$'.$controllerName.'s = new '.$controllerName.';		
		
		if ($this->Router->isParam("filter")){
			$filterField = $this->Router->getParam("filter");
			$select[$filterField] = $this->Router->getParam($filterField);
			$this->view->'.$controllerName.'s = $'.$controllerName.'s->select($select);
			$this->view->listHeader = "Filtered By ".$filterField." : ".$this->Router->getParam($filterField);
		} elseif ($this->Router->isParam("search")) {
			$searchField = $this->Router->getParam("search");
			$select[$searchField] = $this->Router->getPost($searchField);
			$this->view->'.$controllerName.'s = $'.$controllerName.'s->selectLike($select);
			$this->view->listHeader = "Searched By ".$searchField." : ".$this->Router->getPost($searchField);
		} else {
			$this->view->'.$controllerName.'s = $'.$controllerName.'s->select();
			$this->view->listHeader = "List of '.$controllerName.'s";
		}
	}

	function showAction(){
		$'.$controllerName.' = new '.$controllerName.';
		$'.$controllerName.' = $'.$controllerName.'->selectOne(array("'.$specialFields['id'].'" => $this->Router->getParam("'.$specialFields['id'].'")), array(';

	foreach ($fields as $field => $fieldOptions){
			if ($fieldOptions['type'] == 'object'){
				$controllerCode .= '"'.$field.'" , ';
			}
		}
		$controllerCode .= 'null )); ';
		
		if (isset($hasManyObject)){
			$controllerCode .= '		
				$'.$hasManyObject['name'].'s = new '.$hasManyObject['name'].';
				$this->view->'.$hasManyObject['name'].'s = $'.$hasManyObject['name'].'s->select(array("'.$hasManyObject['object_field'].'" => $'.$controllerName.'["'.$specialFields['id'].'"]));';
		}
	
	$controllerCode .= '	
		
		$this->view->'.$controllerName.' = $'.$controllerName.';						
	}
	
	function updateAction(){';
	
	foreach ($fields as $field){
		if ($field['type'] == 'object'){
			$controllerCode .= '		
			$'.$field['object_name'].' = new '.$field['object_name'].';
			$this->view->'.$field['object_name'].'s = $'.$field['object_name'].'->select();';
		}
	}
	
	$controllerCode .= '
		$'.$controllerName.' = new '.$controllerName.';
		$this->view->'.$controllerName.' = $'.$controllerName.'->selectOne(array("'.$specialFields['id'].'" => $this->Router->getParam("'.$specialFields['id'].'")));
		
		if($this->Router->hasPost()){
			$'.$controllerName.'->update(array(
			'.__makeArray($fields).'),
			array("'.$specialFields['id'].'" => $this->Router->getParam("'.$specialFields['id'].'")));
			$this->Router->redirect(array("app" => "'.$appName.'", "controller" => "'.$controllerName.'", "action" => "index", "notice" => "444"));
		}
	}

	function deleteAction(){
		$'.$controllerName.' = new '.$controllerName.';
		$control = $'.$controllerName.'->selectOne(array("'.$specialFields['id'].'" => $this->Router->getParam("'.$specialFields['id'].'")));
		if(isset($control))
		{
			$'.$controllerName.'->delete(array("'.$specialFields['id'].'" => $this->Router->getParam("'.$specialFields['id'].'")));
			$this->Router->redirect(array("app" => "'.$appName.'", "controller" => "'.$controllerName.'", "action" => "index", "notice" => "111"));
		} else {
			$this->Router->redirect(array("app" => "'.$appName.'", "controller" => "'.$controllerName.'", "action" => "index", "notice" => "222"));
		}
	}	

		
	function addAction(){';
	
	foreach ($fields as $field){
		if ($field['type'] == 'object'){
			$controllerCode .= '		
			$'.$field['object_name'].' = new '.$field['object_name'].';
			$this->view->'.$field['object_name'].'s = $'.$field['object_name'].'->select();';
		}
	}
	
	
	$controllerCode .= '
		if($this->Router->hasPost()){
			$'.$controllerName.' = new '.$controllerName.';
			$'.$controllerName.'->add(array('.__makeArray($fields).'));
			$this->Router->redirect(array("app" => "'.$appName.'", "controller" => "'.$controllerName.'", "action" => "index", "notice" => "333"));
		}
	}
	
}';
	return $controllerCode;
}




function __makeArray($fields){
	$q = "";
	$i = 1;
	foreach ($fields as $key => $value){
		switch ($value['type']){
			case 'date':
				$q .= ' "'.$key.'" => mktime(
											$this->Router->getPost("'.$key.'_Ho"),
											$this->Router->getPost("'.$key.'_Mi"),
											"00",
											$this->Router->getPost("'.$key.'_Mo"),
											$this->Router->getPost("'.$key.'_Da"),
											$this->Router->getPost("'.$key.'_Ye")
											
				)
					    ';
				if ($i < count($fields)){
					$q .= "," ;
				}
				$i++;
				break;
			default:
				$q .= ' "'.$key.'" => $this->Router->getPost("'.$key.'")
					    ';
				if ($i < count($fields)){
					$q .= "," ;
				}
				$i++;
		}
		
	}
	return $q;
}
