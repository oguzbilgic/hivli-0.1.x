<?$this->modul("sidebars/user")?> 
		
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
				<th scope="col">id</th><th scope="col">username</th><th scope="col">password</th><th scope="col">name</th><th scope="col">date_added</th><th scope="col">email</th><th scope="col">role</th><th scope="col">Actions</th>
			</tr>
			<? if (!empty($users)): ?>
			<?$this->loop("userList", $users)?> 
			<? endif; ?>
		</TBODY>
	</TABLE>
	</DIV>
	
	</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV></DIV>
	</DIV>
		