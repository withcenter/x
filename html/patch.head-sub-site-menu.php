 <link rel='stylesheet' type='text/css' href='<?=x::url()?>/html/head-sub-site-menu.css' />
<script src='<?=x::url()?>/html/head-sub-site-menu.js'></script>
<?php

	$main = array();
	//$extra = ms::get_extra();

?>

   <nav id="gnb">


<script>$('#gnb').addClass('gnb_js');</script>
<h2>메인메뉴</h2>
	
<ul id="gnb_1dul">
	<li class="gnb_1dli"><a href='/' class="gnb_1da"><?=ln('Home')?></a></li>
	
<? /*
	<li class="gnb_1dli">
		<a href="<?=g::url_board(ms::board_id(etc::domain()))?>" class="gnb_1da"><?=ln('Forum')?></a>
	</li>
*/?>	
	<?php
		$i = 0;
		foreach ( $main as $row ) {
			
	 ?>
	<li class="gnb_1dli">
		<a href="<?php echo G5_BBS_URL ?>/group.php?gr_id=<?php echo $row['gr_id'] ?>" class="gnb_1da"><?php echo $row['gr_subject'] ?></a>
		<ul class="gnb_2dul">
			<?php
				$sub = $subs[$i++];
				
					foreach ( $sub as $row2 ) {
			 ?>
				<li class="gnb_2dli"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $row2['bo_table'] ?>" class="gnb_2da"><?php echo $row2['bo_subject'] ?></a></li>
			<?php
					}
			?>
		</ul>
		
	</li>
	<?php } ?>
	
	
	<li class="gnb_1dli">
		<a href="<?=ms::url_config()?>" class="gnb_1da"><?=ln('Admin Page')?></a>
	</li>
	
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	<? if ( $extra['menu_'.$i] != '' ) {
	$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".$extra['menu_'.$i]."'");

		if ( $extra['submenu_'.$i] ) $menu_id = "menu=$i";
		else $menu_id = null;
	?>
		<li class="gnb_1dli" <?=$menu_id?>><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="gnb_1da" <?// if ($extra['menu'.$i.'_target'] == 'Y') echo "target='_blank'"?>><?=$option['bo_subject']?></a></li>
	<?}}?>
	
	<li class="gnb_1dli">
		<a href="<?=ms::url_main_site()?>" class="gnb_1da"><?=ln('Main Site')?></a>
	</li>
</ul>
<?php
	// sub menu
	for ( $i = 1; $i <=10; $i++ ) {
		if ( $extra['submenu_'.$i] ) {
			echo "<div class='gnb_submenu' submenu=$i>";
				$submenus = explode('|', $extra['submenu_'.$i]);
				foreach ( $submenus as $sm ) {
					$url = g::url()."/bbs/board.php?bo_table=".$extra['menu_'.$i]."&sca=".urlencode($sm);
					echo "<div><a href='$url'>$sm</a></div>";
				}
			echo "</div>";
		}
	}
 
?>		
    </nav>
	