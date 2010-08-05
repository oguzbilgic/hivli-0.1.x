
		<?$this->modul("sidebars/user")?>
		<DIV class="col w8 last">
		<DIV class="content">
		
		<DIV class="box header">
		<DIV class="head">
		<DIV></DIV>
		</DIV>
		<H2>Update user</H2>
		<DIV class="desc">
		
		<form id="sampleform" method="post" >
	<p><label for="simple_input">id:</label><br /><input type="text"  value="<?=$user["id"]?>" class="text" name="id" />
				<p><label for="simple_input">username:</label><br /><input type="text"  value="<?=$user["username"]?>" class="text " name="username" />
				<p><label for="simple_input">password:</label><br /><input type="text"  value="<?=$user["password"]?>" class="text " name="password" />
				<p><label for="simple_input">name:</label><br /><input type="text"  value="<?=$user["name"]?>" class="text " name="name" />
				<p><label for="simple_input">date_added:</label><br />
				<input type="text" value="<?=date("H",$user["date_added"])?>" class="" name="date_added_Ho" size="1" maxlength="2" />:
				<input type="text" value="<?=date("i",$user["date_added"])?>" class="" name="date_added_Mi" size="1" maxlength="2" />--
				<input type="text" value="<?=date("d",$user["date_added"])?>" class="" name="date_added_Da" size="1" maxlength="2" />:
				<input type="text" value="<?=date("m",$user["date_added"])?>" class="" name="date_added_Mo" size="1" maxlength="2" />:
				<input type="text" value="<?=date("Y",$user["date_added"])?>" class="" name="date_added_Ye" size="1" maxlength="4" /><p><label for="simple_input">email:</label><br /><input type="text"  value="<?=$user["email"]?>" class="text " name="email" />
				<p><label for="simple_input">role:</label><br /><select class="medium" name="role" >
				<option    <? if( $user["role"] == "user" ) { echo "selected";}?>   value="user" >Uye</option>
					<option    <? if( $user["role"] == "admin" ) { echo "selected";}?>   value="admin" >Yonetici</option>
					</select> </ br>

<p><br /><br /><input type="submit" value="Submit" class="button form_submit" /><br /></p>



</form>

</DIV>
<DIV class="bottom">
<DIV></DIV>
</DIV>
</DIV>
</DIV>
</DIV>
