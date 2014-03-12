<ul id="comm3_main_menu">		
	<?
		$menus = get_site_menu();
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

<?
/**
	This css does not work on IE 7 and 8 when there is no "$bo_table" present (it highlights all menus)
	
	fixed on 6pm 2014-03-12.
	need to be tested.
*/
	if ( empty($bo_table) ) $_bo_table = 'empty_bo_table';
	else $_bo_table = $bo_table;
?>
<style>
#comm3_main_menu a[href*="<?=$_bo_table?>"] {
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
