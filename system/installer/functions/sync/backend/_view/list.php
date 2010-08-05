<?php
function _makeSyncBackendViewList($appName, $controllerName, $fields, $specialFields){
	$code = '<tr>';
	 foreach ($fields as $key => $value){
	 	if (!isset($value["not_list"])){
			switch ($value['type']){
				default:
					$code .= '<td><?=$'.$controllerName.'List["'.$key.'"]?></td>
	 				';
					break;
				case 'list':
					$code .= '<td><? switch ($'.$controllerName.'List["'.$key.'"]){';
					foreach ($value['values'] as $valueName => $valueCode){
						$code .='	case "'.$valueCode.'":
						 				echo "'.$valueName.'";
						 				break;
						 				';
					}
					$code .= '} ?></td>';	 		
					break;
				case 'date':
					$code .= '<td><?=date("g:i, j F  Y", $'.$controllerName.'List["'.$key.'"])?></td>';	 		
					break;
			}
	 		
		}
	} 
	$code .= '<td class="actions">
	<a class="icon page" href="<?=$this->url("'.$appName.'/'.$controllerName.'/show/'.$specialFields['id'].'/".$'.$controllerName.'List["'.$specialFields['id'].'"])?>" ></a>
	<a class="icon pencil" href="<?=$this->url("'.$appName.'/'.$controllerName.'/update/'.$specialFields['id'].'/".$'.$controllerName.'List["'.$specialFields['id'].'"])?>"></a> 
	<a class="icon delete" href="<?=$this->url("'.$appName.'/'.$controllerName.'/delete/'.$specialFields['id'].'/".$'.$controllerName.'List["'.$specialFields['id'].'"])?>"></a>
	</td>';
	$code .= '</tr>';
	return $code;
}
