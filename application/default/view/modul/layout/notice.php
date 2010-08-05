<? if (isset($noticeCode)):?>
	<div class="grid_12" id="box">
		<div class="notice<?=$noticeType?>" >
			<p><?=$lang['notice_'.$noticeCode]?></p>
		</div>
	</div>
<?php endif;?>