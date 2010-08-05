<?$this->modul("sidebars/album")?> 

	<DIV class="col w8 last">
	<DIV class="content">
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>album</H2>
			<DIV class="desc">
	
	<p><span class="strong">id</span><br />
		<?=$album["id"]?></p><br />
				<p><span class="strong">name</span><br />
		<?=$album["name"]?></p><br />
				<p><span class="strong">artist_id</span><br />
		<a href="<?=$this->url("yonetim/artist/show/id/".$album["artist_id"]["id"])?>" ><?=$album["artist_id"]["name"]?></a></p><br />
				</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>
	
	
	
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
	<h2>songs of album</h2>
		<DIV class="desc">
	
	
	<TABLE>
		<TBODY>
			<tr class="table_header">
				<th scope="col">id</th><th scope="col">name</th><th scope="col">status</th><th scope="col">user_id</th><th scope="col">album_id</th><th scope="col">artist_id</th><th scope="col">Actions</th>
			</tr>
			<? if (!empty($songs)): ?>
			<?$this->loop("songList", $songs)?> 
			<? endif; ?>
		</TBODY>
	</TABLE>
	</DIV>
	
	</DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>
	</DIV>
	</DIV>