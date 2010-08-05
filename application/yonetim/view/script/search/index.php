<?$this->modul("sidebars/search")?> 
		
		<DIV class="col w8 last">
		<DIV class="content">
		
	
	
	
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
	<h2><?=$listHeader?></h2>
		<DIV class="desc">
	
	
	<TABLE>
		<TBODY>
			<tr class="table_header">
				<th scope="col">id</th><th scope="col">string</th><th scope="col">date_added</th><th scope="col">ip</th><th scope="col">type</th><th scope="col">Actions</th>
			</tr>
			<? if (!empty($searchs)): ?>
			<?$this->loop("searchList", $searchs)?> 
			<? endif; ?>
		</TBODY>
	</TABLE>
	</DIV>
	
	</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV></DIV>
	</DIV>
		