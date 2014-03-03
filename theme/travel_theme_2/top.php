<div class='travel-theme-top-wrapper'><div class='inner'>
	<div  id="menu-top-left"><div class='inner'>
		<ul>
			<? for ( $i = 1; $i <= 3; $i++ ) { ?>
			<? if ( ms::meta('menu_'.$i) ) { 
				$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
				if ( !$menu = $row['bo_subject'] ) $menu = null;
			?>
				<li  <?if($i==1) echo "class='first-item'"?>><div class='inner'><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></div></li>
			<?}}?>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div  id="menu-top-right"><div class='inner'>
		<ul>
			<? for ( $i = 4; $i <= 7; $i++ ) { ?>
			<? if ( ms::meta('menu_'.$i) ) { 
				$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
				if ( !$menu = $row['bo_subject'] ) $menu = null;
			?>
				<li  <?if($i==4) echo "class='first-item'"?>><div class='inner'><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></div></li>
			<?}}?>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div style='clear: both'></div>
</div></div>