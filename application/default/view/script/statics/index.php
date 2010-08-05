<div class="grid_12" id="box">
	<h2>Search Volume</h2>
		<img src="http://chart.apis.google.com/chart?
		chs=940x200
		&amp;cht=lc
		&amp;chds=0,<?=max($searchStats)?>
		&amp;chg=<?=100/31?>,25
		
		&amp;chxt=x,y
		&amp;chxr=0,0,31|1,0,<?=max($searchStats)?>,<?=max($searchStats)/4?>

		&amp;chd=t:0
		<?php foreach($searchStats as $searchStats):?>
			<?=','.$searchStats?>
		<?php endforeach;?>
		
		"alt="Sample chart" />
</div>

<div class="grid_12" id="box">
	<h2>User Volume</h2>
		<img src="http://chart.apis.google.com/chart?
		chs=940x200
		&amp;cht=lc
		&amp;chds=0,<?=max($userStats)?>
		&amp;chg=<?=100/31?>,25
		
		&amp;chxt=x,y
		&amp;chxr=0,0,31|1,0,<?=max($userStats)?>,<?=max($userStats)/4?>
		
		&amp;chd=t:0
		<?php foreach($userStats as $userStats):?>
			<?=','.$userStats?>
		<?php endforeach;?>
		
		"alt="Sample chart" />
</div>
