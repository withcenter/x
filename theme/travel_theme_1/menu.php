<?php
	$main = array();
?>

<nav id="gnb">

<script>$('#gnb').addClass('gnb_js');</script>
<h2>메인메뉴</h2>
	
<ul id="gnb_1dul">	
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
	
	
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	<? if ( ms::meta('menu_'.$i) ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
	?>
		<li class="gnb_1dli <?=ms::meta('menu_'.$i)?>"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>' class="gnb_1da" <?// if ($extra['menu'.$i.'_target'] == 'Y') echo "target='_blank'"?>><?=$menu?></a></li>
	<?}}?>
	
	
	
	<?if( ms::admin() ) {?>
	<li class="gnb_1dli admin-menu">
		<a href="<?=ms::url_config()?>" class="gnb_1da">사이트 관리</a>
	</li>
	<?}?>
	
</ul>
</nav>


<script>
	$(function(){			
		if( '<?=$in['bo_table']?>' != '' ) $(".gnb_1dli.<?=$in['bo_table']?>").addClass("selected");
		else if( '<?=$in['module']?>' ) $(".gnb_1dli.admin-menu").addClass("selected");		
	});
</script>