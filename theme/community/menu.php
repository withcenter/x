<?php

	$main = array();

?>
		<div  id="menu-top"><div class='inner'>
			<ul>
				<? for ( $i = 1; $i <= 10; $i++ ) { ?>
				<? if ( ms::meta('menu_'.$i) ) { 
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
					if ( !$menu = $row['bo_subject'] ) $menu = null;
				?>
					<li class='comm1-menu' <?if($i==1) echo "class='first-menu'"?>><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><div class='inner'><?=$menu?></div></a><img src='<?=x::url_theme()?>/img/bar.gif' /></li>
				<?}}?>
				
				
				
				<? if ( ms::admin() ) { ?>
				<li class='comm1-menu' page = 'admin-menu'>
					<a href="<?=ms::url_config()?>"><div class='inner'>사이트 관리</div></a>
				</li>
				<? } ?>
			</ul>
			<div style='clear:left;'></div>
		</div></div>
		
<style>
.comm1-menu a[href*="<?=$bo_table?>"] {
	background: #6b6b6b;
	border:1px solid #464646!important;
}
</style>
<script>
	$(function(){
		if( '<?=$in['module']?>' ) $(".comm1-menu[page='admin-menu'] a").addClass("comm1-menu-selected");		
	});
</script>