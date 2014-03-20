<ul id="gallery_1_main_menu">
	<?="<li>" . implode( "</li><li>", x::menu_links() ) . "</li>"?>
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
#gallery_1_main_menu a[href*="<?=$_bo_table?>"] {
	background-color: black;
}
</style>
<script>
	$(function(){
		if( '<?=$in['module']?>' ) $("#gallery_1_main_menu li[page='admin-menu']").addClass("comm3-menu-selected");		
	});
</script>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
