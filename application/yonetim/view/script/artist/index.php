<?$this->modul("sidebars/artist")?> 
		
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
				<th scope="col">id</th><th scope="col">name</th><th scope="col">Actions</th>
			</tr>
			<? if (!empty($artists)): ?>
			<?$this->loop("artistList", $artists)?> 
			<? endif; ?>
		</TBODY>
	</TABLE>
	</DIV>
	
	</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV></DIV>
	</DIV>
		