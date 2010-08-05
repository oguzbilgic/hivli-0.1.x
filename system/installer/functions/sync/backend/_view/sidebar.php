<?php
function _makeSyncBackendViewSidebar($appName, $controllerName, $fields, $specialFields, $filterBys = NULL, $searchBys = NULL){
	$code = '	
	<DIV class="col w2">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Tools</H2>
			<DIV class="desc">
				<P><a href="<?=$this->url("'.$appName.'/'.$controllerName.'/add")?>" class="icon add modal" >Create New '.$controllerName.'</a></P>';
				
	$code .= '<? if (isset($'.$controllerName.')): ?> 
	
	<P><a class="icon pencil" href="<?=$this->url("'.$appName.'/'.$controllerName.'/update/'.$specialFields['id'].'/".$'.$controllerName.'["'.$specialFields['id'].'"])?>">Edit</a></P> 
	<P><a class="icon delete" href="<?=$this->url("'.$appName.'/'.$controllerName.'/delete/'.$specialFields['id'].'/".$'.$controllerName.'["'.$specialFields['id'].'"])?>">Delete</a></P>
		
	<? endif; ?>
	';
	
	
	
	$code .= '</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>';
	
	
	
		if (isset($filterBys)){
			foreach ($filterBys as $filterBy){
				$code .='		
				<DIV class="box header">
				<DIV class="head">
					<DIV></DIV>
				</DIV>
				<H2>Filter by '.$filterBy['field'].'</H2>
				<DIV class="desc">';
				$code .= '<P><a class="icon tag_red" href="<?=$this->url("'.$appName.'/'.$controllerName.'")?>">All</a></P>';
				foreach ($filterBy['values'] as $value => $key){
					$code .= '<P><a class="icon tag_orange" href="<?=$this->url("'.$appName.'/'.$controllerName.'/index/filter/'.$filterBy['field'].'/'.$filterBy['field'].'/'.$key.'")?>">'.$value.'</a></P>';
				}
					
					
				$code .= '</DIV>
				<DIV class="bottom">
					<DIV></DIV>
				</DIV>
			</DIV>
				';
			}
		}		
		
		if (isset($searchBys)){
			foreach ($searchBys as $searchBy){
				$code .='		
				<DIV class="box header">
				<DIV class="head">
					<DIV></DIV>
				</DIV>
				<H2>Search by '.$searchBy['field'].'</H2>
				<DIV class="desc">
					<form method ="post" action="<?=$this->url("'.$appName.'/'.$controllerName.'/index/search/'.$searchBy['field'].'")?>">
					<p><label for="simple_input">'.$searchBy['field'].':</label></p>
					<p><input type="text"  class="text" name="'.$searchBy['field'].'" /></p><br />
					<p><input type="submit" value="Submit" class="button form_submit" /></p>
					</form>
				</DIV>
				<DIV class="bottom">
					<DIV></DIV>
				</DIV>
			</DIV>
				';
			}
		}
		
		
		
		
$code .= '
<?if (isset($'.$controllerName.'s)) : ?>
<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Statics</H2>
			<DIV class="desc">
				<P><span  class="icon add chart_bar" > Number: <?=count($'.$controllerName.'s)?></span></P>
				</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<? endif;?>
		';		
		
$code .= '		
	</DIV>
</DIV>	';
	return $code;
}
