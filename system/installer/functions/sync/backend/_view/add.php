<?php
function _makeSyncBackendViewAdd($appName, $controllerName, $fields){
	$code = '
		<?$this->modul("sidebars/'.$controllerName.'")?>
		<DIV class="col w8 last">
		<DIV class="content">
		
		<DIV class="box header">
		<DIV class="head">
		<DIV></DIV>
		</DIV>
		<H2>Create New '.$controllerName.'</H2>
		<DIV class="desc">
		
		<form id="sampleform" method="post" >
	';
	
	
	
	
	foreach ($fields as $key => $value){
		$code .= '<p><label for="simple_input">'.$key.':</label><br />';
		switch ($value['type']){
			case 'varchar':
				$code .= '<input type="text"  class="text" name="'.$key.'" />';
				break;
			case 'date':
				$code .= '
				<input type="text"  class="" name="'.$key.'_Ho" size="1" maxlength="2" />:
				<input type="text"  class="" name="'.$key.'_Mi" size="1" maxlength="2" />--
				<input type="text"  class="" name="'.$key.'_Da" size="1" maxlength="2" />:
				<input type="text"  class="" name="'.$key.'_Mo" size="1" maxlength="2" />:
				<input type="text"  class="" name="'.$key.'_Ye" size="1" maxlength="4" />';
				break;
			case 'int':
				$code .= '<input type="text"  class="text" name="'.$key.'" />';
				break;
			case 'text':
				$code .= '<textarea   class="text" name="'.$key.'" /></textarea>';
				break;
			case 'list':
				$code .= '<select class="medium" name="'.$key.'" >';
				foreach ($value['values'] as $optionName => $optionCode){
					$code .= '<option value="'.$optionCode.'" >'.$optionName.'</option>';
				}
				$code .= '</select> </ br>';
				break;
			case 'object':
				$code .= '<select name="'.$key.'" >';
				
				$code .= '
				<? foreach ($'.$value['object_name'].'s as $'.$value['object_name'].'):?>
					<option value="<?=$'.$value['object_name'].'["'.$value['object_id'].'"]?>"><?=$'.$value['object_name'].'["'.$value['object_string'].'"]?></option>
				<? endforeach;?>';
				
				$code .= '</select> </ br>';
				break;
		}
		
	}

	

	
	
	
	
	
	
	
	
	$code .='

<p><br /><br /><input type="submit" value="Submit" class="button form_submit" /><br /></p>



</form>

</DIV>
<DIV class="bottom">
<DIV></DIV>
</DIV>
</DIV>
</DIV>
</DIV>
';
	return $code;
}
