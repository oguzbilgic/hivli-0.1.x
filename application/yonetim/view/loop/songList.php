<tr><td><?=$songList["id"]?></td>
	 				<td><?=$songList["name"]?></td>
	 				<td><? switch ($songList["status"]){	case "1":
						 				echo "Onaylı";
						 				break;
						 					case "2":
						 				echo "Onay Bekliyor";
						 				break;
						 				} ?></td><td><?=$songList["user_id"]?></td>
	 				<td><?=$songList["album_id"]?></td>
	 				<td><?=$songList["artist_id"]?></td>
	 				<td class="actions">
	<a class="icon page" href="<?=$this->url("yonetim/song/show/id/".$songList["id"])?>" ></a>
	<a class="icon pencil" href="<?=$this->url("yonetim/song/update/id/".$songList["id"])?>"></a> 
	<a class="icon delete" href="<?=$this->url("yonetim/song/delete/id/".$songList["id"])?>"></a>
	</td></tr>