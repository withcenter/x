<div class='main-menu-wrapper' style="background: url('<?=x::url_theme()?>/img/main-menu-bg.png')">
<div class='main-menu'>
<ul>
	<li class='first-item'><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
	<?php
		for ( $i=1; $i <=7; $i++ ) {
			if ( $board_id = ms::meta('menu_'.$i) ) {
				$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='$board_id'");
				if($i==7 && !ms::admin()) $last_item = "class='last-item'";
				else $last_item ='';
				echo "<li $last_item><div class='inner'><a href='".G5_BBS_URL."/board.php?bo_table=".$board_id."'>".$row['bo_subject']."</a></div></li>";
			}
		}
	?>
	<?if ( ms::admin() ) { ?><li class='last-item'><div class='inner'><a  href='<?=ms::url_config()?>'>사이트 관리</a></div></li><?}?>
</ul>
</div>
<div style='clear:left;'></div>
</div>
	