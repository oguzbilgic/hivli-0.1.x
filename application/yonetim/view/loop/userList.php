<tr><td><?=$userList["id"]?></td>
	 				<td><?=$userList["username"]?></td>
	 				<td><?=$userList["password"]?></td>
	 				<td><?=$userList["name"]?></td>
	 				<td><?=date("g:i, j F  Y", $userList["date_added"])?></td><td><?=$userList["email"]?></td>
	 				<td><? switch ($userList["role"]){	case "user":
						 				echo "Uye";
						 				break;
						 					case "admin":
						 				echo "Yonetici";
						 				break;
						 				} ?></td><td class="actions">
	<a class="icon page" href="<?=$this->url("yonetim/user/show/id/".$userList["id"])?>" ></a>
	<a class="icon pencil" href="<?=$this->url("yonetim/user/update/id/".$userList["id"])?>"></a> 
	<a class="icon delete" href="<?=$this->url("yonetim/user/delete/id/".$userList["id"])?>"></a>
	</td></tr>