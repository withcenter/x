<div class='main-menu-wrapper'>
<div class='main-menu'>
<ul>
	<li class='first-item home'><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
	<?php
		for ( $i=1; $i <=7; $i++ ) {
			if ( $board_id = ms::meta('menu_'.$i) ) {
				$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='$board_id'");
				if($i==7 && !ms::admin()) $last_item = "last-item";
				else $last_item ='';
				echo "<li><span class='menu-divider'></span></li>";
				echo "<li class='$last_item' page='".ms::meta('menu_'.$i)."'><div class='inner'><a  href='".G5_BBS_URL."/board.php?bo_table=".$board_id."'>".$row['bo_subject']."</a></div></li>";
			}
		}
	?>
	<?if ( ms::admin() ) { ?><li><span class='menu-divider'></span></li>";<li class='last-item' page='admin-menu'><div class='inner'><a  href='<?=ms::url_config()?>'>사이트 관리</a></div></li><?}?>
</ul>
</div>
<div style='clear:left;'></div>
</div>



<script>
	$(function(){				
		if( '<?=$in['bo_table']?>' != '' ) $(".main-menu li[page='<?=$in['bo_table']?>']").addClass("selected");
		else if( '<?=$in['module']?>' ) $(".main-menu li[page='admin-menu']").addClass("selected");
		else $(".main-menu .home").addClass("selected");
	});
</script>