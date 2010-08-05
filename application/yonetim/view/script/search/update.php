
		<?$this->modul("sidebars/search")?>
		<DIV class="col w8 last">
		<DIV class="content">
		
		<DIV class="box header">
		<DIV class="head">
		<DIV></DIV>
		</DIV>
		<H2>Update search</H2>
		<DIV class="desc">
		
		<form id="sampleform" method="post" >
	<p><label for="simple_input">id:</label><br /><input type="text"  value="<?=$search["id"]?>" class="text" name="id" />
				<p><label for="simple_input">string:</label><br /><input type="text"  value="<?=$search["string"]?>" class="text " name="string" />
				<p><label for="simple_input">date_added:</label><br />
				<input type="text" value="<?=date("H",$search["date_added"])?>" class="" name="date_added_Ho" size="1" maxlength="2" />:
				<input type="text" value="<?=date("i",$search["date_added"])?>" class="" name="date_added_Mi" size="1" maxlength="2" />--
				<input type="text" value="<?=date("d",$search["date_added"])?>" class="" name="date_added_Da" size="1" maxlength="2" />:
				<input type="text" value="<?=date("m",$search["date_added"])?>" class="" name="date_added_Mo" size="1" maxlength="2" />:
				<input type="text" value="<?=date("Y",$search["date_added"])?>" class="" name="date_added_Ye" size="1" maxlength="4" /><p><label for="simple_input">ip:</label><br /><input type="text"  value="<?=$search["ip"]?>" class="text " name="ip" />
				<p><label for="simple_input">type:</label><br /><select class="medium" name="type" >
				<option    <? if( $search["type"] == "1" ) { echo "selected";}?>   value="1" >Mp3</option>
					<option    <? if( $search["type"] == "2" ) { echo "selected";}?>   value="2" >Lyric</option>
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
