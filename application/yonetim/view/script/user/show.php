<?$this->modul("sidebars/user")?> 

	<DIV class="col w8 last">
	<DIV class="content">
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>user</H2>
			<DIV class="desc">
	
	<p><span class="strong">id</span><br />
		<?=$user["id"]?></p><br />
				<p><span class="strong">username</span><br />
		<?=$user["username"]?></p><br />
				<p><span class="strong">password</span><br />
		<?=$user["password"]?></p><br />
				<p><span class="strong">name</span><br />
		<?=$user["name"]?></p><br />
				<p><span class="strong">date_added</span><br />
		<?=date("g:i, j F  Y", $user["date_added"])?></p><br /><p><span class="strong">email</span><br />
		<?=$user["email"]?></p><br />
				<p><span class="strong">role</span><br />
		<? switch ($user["role"]){	case "user":
					 				echo "Uye";
					 				break;
					 					case "admin":
					 				echo "Yonetici";
					 				break;
					 				} ?></p><br /></DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>
	</DIV>
	</DIV>