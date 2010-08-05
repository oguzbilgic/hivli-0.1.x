<?$this->modul("sidebars/song")?> 

	<DIV class="col w8 last">
	<DIV class="content">
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>song</H2>
			<DIV class="desc">
	
	<p><span class="strong">id</span><br />
		<?=$song["id"]?></p><br />
				<p><span class="strong">name</span><br />
		<?=$song["name"]?></p><br />
				<p><span class="strong">status</span><br />
		<? switch ($song["status"]){	case "1":
					 				echo "Onaylı";
					 				break;
					 					case "2":
					 				echo "Onay Bekliyor";
					 				break;
					 				} ?></p><br /><p><span class="strong">lyric</span><br />
		<?=$song["lyric"]?></p><br />
				<p><span class="strong">user_id</span><br />
		<a href="<?=$this->url("yonetim/user/show/id/".$song["user_id"]["id"])?>" ><?=$song["user_id"]["name"]?></a></p><br />
				<p><span class="strong">album_id</span><br />
		<a href="<?=$this->url("yonetim/album/show/id/".$song["album_id"]["id"])?>" ><?=$song["album_id"]["name"]?></a></p><br />
				<p><span class="strong">artist_id</span><br />
		<a href="<?=$this->url("yonetim/artist/show/id/".$song["artist_id"]["id"])?>" ><?=$song["artist_id"]["name"]?></a></p><br />
				</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>
	</DIV>
	</DIV>