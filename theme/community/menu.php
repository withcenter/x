<?php

	$main = array();
	
	

?>

   <nav id="menu-container">
	<div  id="menu-top">
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	<? if ( ms::meta('menu_'.$i) ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
	?>
		<span <?if($i==1) echo "class='first-menu'"?>><a   href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></span>
	<?}}?>
	
	<? if ( ms::admin() ) { ?>
	
		<span><a href="<?=ms::url_config()?>"><?=ln('Admin Page')?></a></span>

	<? } ?>

</div>
</nav>
	