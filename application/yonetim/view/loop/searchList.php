<tr><td><?=$searchList["id"]?></td>
	 				<td><?=$searchList["string"]?></td>
	 				<td><?=date("g:i, j F  Y", $searchList["date_added"])?></td><td><?=$searchList["ip"]?></td>
	 				<td><? switch ($searchList["type"]){	case "1":
						 				echo "Mp3";
						 				break;
						 					case "2":
						 				echo "Lyric";
						 				break;
						 				} ?></td><td class="actions">
	<a class="icon page" href="<?=$this->url("yonetim/search/show/id/".$searchList["id"])?>" ></a>
	<a class="icon pencil" href="<?=$this->url("yonetim/search/update/id/".$searchList["id"])?>"></a> 
	<a class="icon delete" href="<?=$this->url("yonetim/search/delete/id/".$searchList["id"])?>"></a>
	</td></tr>