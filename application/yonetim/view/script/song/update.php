
		<?$this->modul("sidebars/song")?>
		<DIV class="col w8 last">
		<DIV class="content">
		
		<DIV class="box header">
		<DIV class="head">
		<DIV></DIV>
		</DIV>
		<H2>Update song</H2>
		<DIV class="desc">
		
		<form id="sampleform" method="post" >
	<p><label for="simple_input">id:</label><br /><input type="text"  value="<?=$song["id"]?>" class="text" name="id" />
				<p><label for="simple_input">name:</label><br /><input type="text"  value="<?=$song["name"]?>" class="text " name="name" />
				<p><label for="simple_input">status:</label><br /><select class="medium" name="status" >
				<option    <? if( $song["status"] == "1" ) { echo "selected";}?>   value="1" >Onaylı</option>
					<option    <? if( $song["status"] == "2" ) { echo "selected";}?>   value="2" >Onay Bekliyor</option>
					</select> </ br><p><label for="simple_input">lyric:</label><br /><textarea   class="text" name="lyric" /><?=$song["lyric"]?></textarea>
				<p><label for="simple_input">user_id:</label><br /><select name="user_id" >
						<option           <? if( empty($song["user_id"])) { echo "selected";}?> value=" " >Empty</option>
				
				<? foreach ($users as $user):?>
					<option           <? if( $song["user_id"] == $user["id"] ) { echo "selected";}?>                value="<?=$user["id"]?>" ><?=$user["name"]?></option>
				<? endforeach;?></select> </ br><p><label for="simple_input">album_id:</label><br /><select name="album_id" >
						<option           <? if( empty($song["album_id"])) { echo "selected";}?> value=" " >Empty</option>
				
				<? foreach ($albums as $album):?>
					<option           <? if( $song["album_id"] == $album["id"] ) { echo "selected";}?>                value="<?=$album["id"]?>" ><?=$album["name"]?></option>
				<? endforeach;?></select> </ br><p><label for="simple_input">artist_id:</label><br /><select name="artist_id" >
						<option           <? if( empty($song["artist_id"])) { echo "selected";}?> value=" " >Empty</option>
				
				<? foreach ($artists as $artist):?>
					<option           <? if( $song["artist_id"] == $artist["id"] ) { echo "selected";}?>                value="<?=$artist["id"]?>" ><?=$artist["name"]?></option>
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
