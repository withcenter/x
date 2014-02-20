<?php

	$main = array();
	
	

?>

   <nav id="menu-container">
	<div  id="menu-top">
<ul>
	<?php
		$i = 0;
		foreach ( $main as $row ) {
			
	 ?>
	<li>
		<a href="<?php echo G5_BBS_URL ?>/group.php?gr_id=<?php echo $row['gr_id'] ?>"><?php echo $row['gr_subject'] ?></a>
		<ul>
			<?php
				$sub = $subs[$i++];
				
					foreach ( $sub as $row2 ) {
			 ?>
				<li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $row2['bo_table'] ?>" class="gnb_2da"><?php echo $row2['bo_subject'] ?></a></li>
			<?php
					}
			?>
		</ul>
		
	</li>
	<?php } ?>
	
	
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	<? if ( ms::meta('menu_'.$i) ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
	?>
		<li  <?if($i==1) echo "class='first-menu'"?>><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></li>
	<?}}?>
	
	
	
	
	<li>
		<a href="<?=ms::url_config()?>"><?=ln('Admin Page')?></a>
	</li>
	
	
</ul>
</div>
</nav>
	