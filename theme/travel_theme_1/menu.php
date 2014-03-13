<div class='main-menu-wrapper'>
<div class='main-menu'>
<ul>
	<li class='first-item home'><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
	<?php
		$menus = get_site_menu();
		foreach ( $menus as $menu ) {
			echo "	<li><span class='menu-divider'></span></li><li page=".$menu['bo_table']."><a href='".url_forum_list($menu['bo_table'])."'>$menu[name]</a></li>";
		}
	?>
</ul>
</div>
<div style='clear:left;'></div>
</div>



<script>
	$(function(){				
		if( '<?=$in['bo_table']?>' != '' ) $(".main-menu li[page='<?=$in['bo_table']?>']").addClass("selected");
		else if( '<?=$in['module']?>' ) $(".main-menu li[page='admin-menu']").addClass("selected");
		else $(".main-menu .home").addClass("selected");
	});
</script>