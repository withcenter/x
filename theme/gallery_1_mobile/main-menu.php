<ul id="gallery_1_main_menu_mobile">
	<?
		$menus = x::menu_links();		
		for( $i=0; $i<5; $i++ ){
			$menu_list[] = str_replace("</a>","<span class='highlight'></span></a>", $menus[$i]);
		}		
	?>
	<?="<li>" . implode( "</li><li>", $menu_list ) . "</li>"?>
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
#gallery_1_main_menu_mobile a[href*="<?=$_bo_table?>"] {
	border-top:5px solid #2ca3b4;
	border-bottom:4px solid #2ca3b4;	
}

#gallery_1_main_menu_mobile a[href*="<?=$_bo_table?>"] .highlight{
	display:block;
}
</style>
<script>
$(function(){
	var triangle_left;
	var selected_menu = "#gallery_1_main_menu_mobile a[href*='<?=$_bo_table?>']";
	
	if( $(selected_menu).length ){				
		triangle_left = $(selected_menu).width()/2-2;
		console.log(triangle_left);
		$(selected_menu).find('.highlight').css('left',triangle_left);
	}
});
</script>
<script>
	$(function(){
		if( '<?=$in['module']?>' ) $("#gallery_1_main_menu_mobile li[page='admin-menu']").addClass("selected");		
	});
</script>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
