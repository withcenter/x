<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/menu.css' />
<script src='<?=x::url_theme()?>/website.com-menu.js'></script>
<?php

	$main = array();

?>	
<ul id="website-com-menu">
	<li class="menu-list"><a class='home' href='/' class="menu-list"><?=ln('Home')?></a></li>

<? /*
	<li class="gnb_1dli">
		<a href="<?=g::url_board(ms::board_id(etc::domain()))?>" class="menu-list"><?=ln('Forum')?></a>
	</li>
*/?>	
	<?php
		$i = 0;
		foreach ( $main as $row ) {
			
	 ?>
	<li class="menu-list">
		<a href="<?php echo G5_BBS_URL ?>/group.php?gr_id=<?php echo $row['gr_id'] ?>" class="menu-list"><?php echo $row['gr_subject'] ?></a>
		<ul class="menu-list-wrapper">
			<?php
				$sub = $subs[$i++];
				
					foreach ( $sub as $row2 ) {
			 ?>
				<li class="menu-list"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $row2['bo_table'] ?>" class="gnb_2da"><?php echo $row2['bo_subject'] ?></a></li>
			<?php
					}
			?>
		</ul>
		
	</li>
	<?php } 
		if ( ms::admin() || $is_admin == 'super' ){
	?>
	<li class="menu-list">
		<a href="<?=x::url()?>/?module=admin&action=index" class="admin"><?=ln('Admin Page')?></a>
	</li>
	<?}?>
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	
	<? if ( $extra['menu_'.$i] != '' ) {
		$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '".$extra['menu_'.$i]."'");
	
		if ( $extra['submenu_'.$i] ) $menu_id = "menu=$i";
		else $menu_id = null;		
	?>
		<li class="menu-list" <?=$menu_id?>><a class='<?php echo $extra['menu_'.$i]?>' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="menu-list" <?// if ($extra['menu'.$i.'_target'] == 'Y') echo "target='_blank'"?>><?=$option['bo_subject']?></a></li>				
	<?}}?>
	
	<li class="menu-list">
		<a href="<?=ms::url_main_site()?>" class="main-site"><?=ln('Main Site')?></a>
	</li>
</ul>
<script>

	$(function(){			
		if( ("<?php echo $in['bo_table'];?>")){
			$(".menu-list .<?php echo $in['bo_table'];?>").addClass('selected');
		}
		else if ( "<?php echo $in['module']?>" == "admin" || "<?php echo $in['module']?>" == "multisite" || "<?php echo $in['module']?>" == "multidomain" ){
			$(".menu-list .admin").addClass('selected');
		}
		else{
			$('.menu-list .home').addClass('selected');			
		}
	});

</script>