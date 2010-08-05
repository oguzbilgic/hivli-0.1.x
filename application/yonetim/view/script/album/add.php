
		<?$this->modul("sidebars/album")?>
		<DIV class="col w8 last">
		<DIV class="content">
		
		<DIV class="box header">
		<DIV class="head">
		<DIV></DIV>
		</DIV>
		<H2>Create New album</H2>
		<DIV class="desc">
		
		<form id="sampleform" method="post" >
	<p><label for="simple_input">id:</label><br /><input type="text"  class="text" name="id" /><p><label for="simple_input">name:</label><br /><input type="text"  class="text" name="name" /><p><label for="simple_input">artist_id:</label><br /><select name="artist_id" >
				<? foreach ($artists as $artist):?>
					<option value="<?=$artist["id"]?>"><?=$artist["name"]?></option>
				<? endforeach;?></select> </ br>

<p><br /><br /><input type="submit" value="Submit" class="button form_submit" /><br /></p>



</form>

</DIV>
<DIV class="bottom">
<DIV></DIV>
</DIV>
</DIV>
</DIV>
</DIV>
