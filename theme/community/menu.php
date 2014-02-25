<?php

	$main = array();
	
	

?>

	<nav id="menu-container">
		<div  id="menu-top">
			<ul>
				<? for ( $i = 1; $i <= 10; $i++ ) { ?>
				<? if ( ms::meta('menu_'.$i) ) { 
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
					if ( !$menu = $row['bo_subject'] ) $menu = null;
				?>
					<li  <?if($i==1) echo "class='first-menu'"?>><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><div class='inner'><?=$menu?></div></a></li>
				<?}}?>
				
				
				
				<? if ( ms::admin() ) { ?>
				<li>
					<a href="<?=ms::url_config()?>"><div class='inner'>사이트 관리</div></a>
				</li>
				<? } ?>
			</ul>
			<div style='clear:left;'></div>
		</div>
	</nav>
	