<div class="grid_12" id="search-box">
	<form  method="post" action="<?=$this->url('search/searchPost')?>" >
		<h2><?=$lang['searchMp3']?></h2>
		<input type="text" name="string" id="string"  />
			<br />
		<select  name="type">
			<option value="1">Mp3</option>
			<option value="2"><?=$lang['lyric']?></option>
		</select>
		<input type="submit"  value="<?=$lang['search']?>" id="button"/>
	</form>
</div>
