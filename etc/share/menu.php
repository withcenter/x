<?
	$menus = x::menus();
	foreach ( $menus as $menu ) {
		$url		= x::menu_url($menu['bo_table']);
		$target	= x::menu_target_attr($menu['target']);
		echo "<li><a href='$url'$target>$menu[name]</a></li>";
	}
	