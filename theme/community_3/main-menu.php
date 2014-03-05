<ul id="comm3_main_menu">		
	
	<?
		if( ms::admin() ) {
			$max_menus = 6;
		}
		else $max_menus = 7;
	?>
	
	<? for ( $i = 1; $i <= $max_menus; $i++ ) { 
		if( $i == $max_menus )$no_margin = 'no-margin';
		else $no_margin = null;
	?>
	<? if ( ms::meta('menu_'.$i) ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
	?>
		<li class="comm3_menu <?=$no_margin?>"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></li>
	<?}}?>

	<?
		if ( ms::admin() ) {
	?>
	
			<li class="comm3_menu" page = "admin-menu">
				<a href="<?=ms::url_config()?>">사이트 관리</a>
			</li>
	<? } ?>
	
	
</ul>
<style>
#comm3_main_menu a[href*="<?=$bo_table?>"] {
	background-color: black;
}
</style>
<script>
	$(function(){
		if( '<?=$in['module']?>' ) $(".comm3_menu[page='admin-menu']").addClass("comm3-menu-selected");
	});
</script>




<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
