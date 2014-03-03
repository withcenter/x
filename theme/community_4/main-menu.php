<ul id="comm3_main_menu">		
	
	<?
		for( $count = 1; $count <=7; $count++ ){
			if( ms::meta('menu_'.$count) ) $total_menus++;
		}
		
		if( ms::admin() ) {
			$max_menus = 6;			
		}
		else $max_menus = 7;		
	?>
	
	<? for ( $i = 1; $i <= $total_menus; $i++ ) {
		if( !ms::admin() ){
			if( $i == $total_menus)$no_margin = 'no-margin';
			else $no_margin = null;
		}
	?>
	<? if ( ms::meta('menu_'.$i) ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
	?>
		<li class="comm3_menu <?=$no_margin?>" page = "<?=ms::meta('menu_'.$i)?>"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></li>
	<?}}?>

	<?
		if ( ms::admin() ) {
	?>
	
			<li class="comm3_menu" page = "admin-menu">
				<a href="<?=ms::url_config()?>">사이트 관리</a>
			</li>
	<? } ?>
	
	
</ul>



<script>
	$(function(){				
		if( '<?=$in['bo_table']?>' != '' ){
			$(".comm3_menu[page='<?=$in['bo_table']?>']").addClass("selected");
			$(".top .inner .left a[page='<?=$in['bo_table']?>']").addClass("selected");
		}
		else if( '<?=$in['module']?>' ) $(".comm3_menu[page='admin-menu']").addClass("selected");		
	});
</script>
