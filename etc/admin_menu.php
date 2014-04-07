<?php
if ( ! admin() ) {
	echo "<p style='padding: 3em; font-size:2em; color: red;'>You are not admin</p>";
	dlog("You are not admin");
	exit;
}
?>
<link rel="stylesheet" href="module/admin/menu.css">
<script src="module/admin/menu.js"></script>
<div class='admin-menu'>
<?
$files = file::getFiles( x::dir() . '/module', true, "/admin_menu\.php/");
foreach ( $files as $file ) {
	$menu = array();
	include $file;
	$admin_menu[$menu['name']] = $menu;
}
ksort($admin_menu);
admin_menu_display();
function admin_menu_display()
{
	global $admin_menu, $in;
	echo "<ul class='main-menu'>\n";
	foreach( $admin_menu as $menu ) {
		$name = $menu['name'];
		$name = preg_replace("/^[0-9] /", '', $name);
		$u = parse_url( $menu['default_url'] );
		parse_str( $u['query'], $str );
		if ( $str['module'] == $in['module'] ) $class= "class='selected'";
		else $class = null;
		
		echo "<li>\n";
			echo "<a $class href='$menu[default_url]'>$name</a>\n";
			unset($menu['name'], $menu['default_url']);
			echo "<ul class='sub-menu'>\n";
				foreach ( $menu as $name => $url ) {
					echo "<li><a href='$url'>$name</a></li>\n";
				}
			echo "</ul>\n";
		echo "</li>\n";
	}
	echo "</ul>	\n";
}
?>
<div style='clear:left;'></div>
</div>
