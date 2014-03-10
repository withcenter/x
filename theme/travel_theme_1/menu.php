<div class='main-menu-wrapper'>
<div class='main-menu'>
<ul>
	<li class='first-item home'><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
	<?php
		for ( $i=1; $i <=6; $i++ ) {
			
			/*
			if ( $board_id = ms::meta('menu_'.$i) ) {
				
				$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='$board_id'");
				if($i==6 && !ms::admin()) $last_item = "last-item";
				else $last_item ='';
				*/
				
			if ( $board_id = ms::meta('menu_'.$i) ) {	
				
				$menu_name = ms::meta("menu_name_$i");
				if ( empty($menu_name) ) {
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
					if ( empty($row['bo_subject']) ) $menu_name = ln("No Subject", "제목없음");
					else $menu_name = $row['bo_subject'];
				}
				
				if($i==6 && !ms::admin()) $last_item = "last-item";
				else $last_item ='';
				
				echo "<li><span class='menu-divider'></span></li>";
				echo "<li class='$last_item' page='".ms::meta('menu_'.$i)."'><div class='inner'><a  href='".G5_BBS_URL."/board.php?bo_table=".$board_id."'>".$menu_name."</a></div></li>";
			}
		}
	?>
	<?if ( ms::admin() ) { ?><li><span class='menu-divider'></span></li><li class='last-item' page='admin-menu'><div class='inner'><a  href='<?=ms::url_config()?>'>사이트 관리</a></div></li><?}?>
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