<div class='main-menu'>
	<div class='inner' style="background:url('<?=x::url_theme()?>/img/bar.png') repeat-x">
<?php
		$menus = x::menu_links();
		
		for ( $i = 0; $i < count ( $menus ); $i++ ) {
			echo $menus[$i];
			
			if ( ($i + 1 ) != count ( $menus ) ) echo "<img src='".x::url_theme()."/img/bar2.png' />";
		}
?>
	</div>
</div>
