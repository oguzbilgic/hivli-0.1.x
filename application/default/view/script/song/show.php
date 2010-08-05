<div class="grid_5 aplha" id="box">
	<h2><?=$song['name']?> <?=$lang['lyric']?></h2>
	<p><strong><?=$lang['artist']?> : </strong><a href="<?=$this->url('artist/show/id/'.$song['artist_id']['id'].'/'.$song['artist_id']['name'], true)?>"><?=$song['artist_id']['name']?></a></p>
	<p><strong><?=$lang['album']?> : </strong><a href="<?=$this->url('album/show/id/'.$song['album_id']['id'].'/'.$song['album_id']['name'], true)?>"><?=$song['album_id']['name']?></a></p>
	<? if (empty($song['lyric'])):?>
		<? if (isset($user)):?>
			<form method="post" action="<?=$this->url('song/updatePost/id/'.$song['id'])?>">
				<label><?=$lang['lyric']?> : </label>
				<textarea type="text"  name="lyric" cols="40" rows="15"></textarea>
				<input  type="submit" value="Yolla" class="button">
			</form>	
		<? else:?>
			<p>Bu şarkıya şarkı sözü eklemek için üye olmanız gerekmektedir</p>
		<? endif;?>
	<? elseif ($song['status'] == '1'):?>
		<p><strong>Şarkı Sözünü Yollayan : </strong><a href="<?=$this->url('user/show/id/'.$song['user_id']['id'])?>"><?=$song['user_id']['username']?></a></p>
		<p><strong><?=$lang['lyric']?> : </strong></p>
		<p><?=$song['lyric']?></p>
	<? else:?>
		<p>Bu şarkı için yollanan şarkı sözü onay bekliyor</p>
	<? endif;?>
</div>

<div class="grid_3" id="box">
	<?=$this->modul('ads/ad_160_600')?>
</div>

<div class="grid_4 omega" id="box">
	<h2><?=$song['name']?></h2>
	<div class="desc">
	    <p><?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?>, <?=$song['album_id']['name']?> 
	<?=$song['artist_id']['name']?>  <?=$song['name']?> mp3, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  
	<?=$song['name']?> mp3 indir, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> m&uuml;zik, 
	<?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?>   m&uuml;zik indir, <?=$song['album_id']['name']?>
	<?=$song['artist_id']['name']?>  <?=$song['name']?> m&uuml;zi&#287;i,  <?=$song['name']?> mp3&uuml;, <?=$song['album_id']['name']?>
	<?=$song['artist_id']['name']?>  <?=$song['name']?> muzik indir, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?> 
	<?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>    <?=$song['name']?> m&uuml;zigini indir, <?=$song['album_id']['name']?>
	<?=$song['artist_id']['name']?>  <?=$song['name']?> &#351;ark&#305;s&#305;, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>
	<?=$song['name']?> &#351;ark&#305;s&#305;n&#305; indir, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> 
	&#351;ark&#305; s&ouml;zleri, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> 
	&#351;ark&#305;s&#305;n&#305;n s&ouml;zleri, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?>
	alb&uuml;m&uuml;, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> yeni   alb&uuml;m
	&#351;ark&#305;s&#305;, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> klibi, 
	<?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> klibini indir, <?=$song['album_id']['name']?> 
	<?=$song['artist_id']['name']?>  <?=$song['name']?> klibini   izle, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>
	<?=$song['name']?> yeni klibi, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> yeni 
	&#351;ark&#305;s&#305;, <?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>  <?=$song['name']?> yeni mp3, 
	<?=$song['album_id']['name']?> <?=$song['artist_id']['name']?>    <?=$song['name']?> son mp3, bedava mp3, mp3 indir, mp3 y&uuml;kle,
	mp3 yukle, mp3 download, &#351;ark&#305;   s&ouml;zleri, muzik indir, m&uuml;zik indir, m&uuml;zikleri, 2007, 2006, son 
	&ccedil;&#305;kan alb&uuml;mler,   bele&#351; mp3, direk mp3 indir, no rapidsiz mp3, mp3 indirt, mp3ler, dizi m&uuml;zikleri,  
	 film m&uuml;zikleri, dizi m&uuml;zigi, film m&uuml;zigi, video klip</p>
	</div>
</div>