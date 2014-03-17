<ul>
<?
$count = 0;
$menus = get_site_menu();
foreach ( $menus as $menu ) {
	if( $count+1 == count($menus) ) $no_margin = "class = 'no-margin'";
	else $no_margin = null;
?>
	<li <?=$no_margin?> page='<?=x::meta('menu'.$i.'bo_table')?>'>		
		<a href='<?=url_forum_list($menu['bo_table'])?>'>
			<?=$menu['name']?>
			<div class='border_left'></div>
		</a>
	</li>
	<?
	$count++;
	}
?>
</ul>
<div class='close-dropdown'><span class='close-dropdown-button'>Close menu</span></div>
