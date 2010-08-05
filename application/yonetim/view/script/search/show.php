<?$this->modul("sidebars/search")?> 

	<DIV class="col w8 last">
	<DIV class="content">
			<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>search</H2>
			<DIV class="desc">
	
	<p><span class="strong">id</span><br />
		<?=$search["id"]?></p><br />
				<p><span class="strong">string</span><br />
		<?=$search["string"]?></p><br />
				<p><span class="strong">date_added</span><br />
		<?=date("g:i, j F  Y", $search["date_added"])?></p><br /><p><span class="strong">ip</span><br />
		<?=$search["ip"]?></p><br />
				<p><span class="strong">type</span><br />
		<? switch ($search["type"]){	case "1":
					 				echo "Mp3";
					 				break;
					 					case "2":
					 				echo "Lyric";
					 				break;
					 				} ?></p><br /></DIV></DIV>
			<DIV class="bottom">
				<DIV></DIV>
	</DIV>
	</DIV>