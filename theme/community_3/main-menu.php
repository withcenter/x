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
	<?
		if ( ms::meta('menu_'.$i) ) {
			$menu_name = ms::meta("menu_name_$i");
			if ( empty($menu_name) ) {
				$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
				if ( empty($row['bo_subject']) ) $menu_name = ln("No Subject", "제목없음");
				else $menu_name = $row['bo_subject'];
			}
		
	?>
		<li class="comm3_menu <?=$no_margin?>"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu_name?></a></li>
	<?}}?>

	<?
		if ( ms::admin() ) {
	?>
	
			<li class="comm3_menu" page = "admin-menu">
				<a href="<?=ms::url_config()?>">사이트 관리</a>
			</li>
	<? } ?>
	
	
</ul>
<!-- This css does not work on IE 7 and 8 when there is no "$bo_table" present (it highlights all menus)...-->
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
