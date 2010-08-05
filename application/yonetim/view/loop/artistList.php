<tr><td><?=$artistList["id"]?></td>
	 				<td><?=$artistList["name"]?></td>
	 				<td class="actions">
	<a class="icon page" href="<?=$this->url("yonetim/artist/show/id/".$artistList["id"])?>" ></a>
	<a class="icon pencil" href="<?=$this->url("yonetim/artist/update/id/".$artistList["id"])?>"></a> 
	<a class="icon delete" href="<?=$this->url("yonetim/artist/delete/id/".$artistList["id"])?>"></a>
	</td></tr>