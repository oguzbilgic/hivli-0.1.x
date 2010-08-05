<?php
function _makeSyncBackendViewShow($appName, $controllerName, $fields, $specialFields, $hasManyObject, $hasManymodelFields, $hasManyspecialFields)
{
    $showCode = '<?$this->modul("sidebars/' . $controllerName . '")?> 

	<DIV class="col w8 last">
	<DIV class="content">
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>' . $controllerName . '</H2>
			<DIV class="desc">
	
	';
    
    foreach ($fields as $field => $fieldOptions) {
        $showCode .= '<p><span class="strong">' . $field . '</span><br />
		';
        
        switch ($fieldOptions['type'] ){
        	case 'object':
        		$showCode .= '<a href="<?=$this->url("' . $appName . '/' . $fieldOptions['object_name'] . '/show/' . $fieldOptions['object_id'] . '/".$' . $controllerName . '["' . $field . '"]["'.$fieldOptions['object_id'].'"])?>" ><?=$' . $controllerName . '["' . $field . '"]["'.$fieldOptions['object_string'].'"]?></a></p><br />
				';
        		break;
			case 'list':
				$showCode .= '<? switch ($'.$controllerName.'["'.$field.'"]){';
				foreach ($fieldOptions['values'] as $valueName => $valueCode){
					$showCode .='	case "'.$valueCode.'":
					 				echo "'.$valueName.'";
					 				break;
					 				';
				}
				$showCode .= '} ?></p><br />';	 		
				break;
			case 'date':
				$showCode .= '<?=date("g:i, j F  Y", $'.$controllerName.'["'.$field.'"])?></p><br />';	 		
				break;			
			default:
        		$showCode .= '<?=$' . $controllerName . '["' . $field . '"]?></p><br />
				';
        		break;
       }
        

    }
    
    $showCode .= '</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>';
    
    if (isset($hasManyObject)) {
        $showCode .= _makeSyncBackendViewIndex($hasManyObject['name'], $hasManymodelFields, TRUE, $hasManyObject['name'].'s of '. $controllerName);
    }
    
    $showCode .= '
	</DIV>
	</DIV>';
    
    return $showCode;
}

