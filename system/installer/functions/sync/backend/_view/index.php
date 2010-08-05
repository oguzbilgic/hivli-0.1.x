<?php
function _makeSyncBackendViewIndex($controllerName, $fields, $isModul = False, $header = FALSE){
$indexCode = NULL;
	if (!$isModul){
		$indexCode =
		'<?$this->modul("sidebars/'.$controllerName.'")?> 
		
		<DIV class="col w8 last">
		<DIV class="content">
		';
	}
	
$indexCode .=
	'
	
	
	
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
	<h2>';
	if ($header){
		$indexCode .= $header;
	} else {
		$indexCode .= '<?=$listHeader?>';
	}
	$indexCode .= '</h2>
		<DIV class="desc">
	
	
	<TABLE>
		<TBODY>
			<tr class="table_header">
				'.__makeTable($fields).'
			</tr>
			<? if (!empty($'.$controllerName.'s)): ?>
			<?$this->loop("'.$controllerName.'List", $'.$controllerName.'s)?> 
			<? endif; ?>
		</TBODY>
	</TABLE>
	</DIV>
	
	</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>';
	
		if (!$isModul){
		$indexCode .=
		'</DIV>
	</DIV>
		';
	}
	
	
	
	
	
		
		return $indexCode;
}



function __makeTable($fields){
	$q = "";
	$i = 1;
	foreach ($fields as $key => $value){
		if (!isset($value["not_list"])){
			$q .= '<th scope="col">'.$key.'</th>';
		}
	}
	$q .= '<th scope="col">Actions</th>';
	return $q;
}