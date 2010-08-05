<tr><td><?=$albumList["id"]?></td>
	 				<td><?=$albumList["name"]?></td>
	 				<td><?=$albumList["artist_id"]?></td>
	 				<td class="actions">
	<a class="icon page" href="<?=$this->url("yonetim/album/show/id/".$albumList["id"])?>" ></a>
	<a class="icon pencil" href="<?=$this->url("yonetim/album/update/id/".$albumList["id"])?>"></a> 
	<a class="icon delete" href="<?=$this->url("yonetim/album/delete/id/".$albumList["id"])?>"></a>
	</td></tr>