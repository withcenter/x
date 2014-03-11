<ul id="comm3_main_menu">		
	<?
		include x::dir() . '/etc/share/get_menu.php';
		foreach ( $menus as $bo_id => $bo_name ) {
			echo "<li class='comm3_menu'><a href='".url_forum_list($bo_id)."'>$bo_name</a></li>";
		}
		if ( admin() ) {
	?>
			<li class="comm3_menu" page = "admin-menu">
				<a href="<?=url_site_config()?>">사이트 관리</a>
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
